@extends('admin.layouts.master')

@section('title', 'User')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">User List</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.create') }}">Create</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
            @endif

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->middle_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary"><span data-feather="edit"></span></a>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-dark"><span data-feather="eye"></span></a>
                    <a href="{{ route('user.destroy', $user->id) }}"
                       onclick="event.preventDefault();
                           document.getElementById('delete-user-{{ $user->id }}').submit();"
                       class="btn btn-danger"><span data-feather="trash-2"></span></a>


                    <form id="delete-user-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method">
                    </form>
                </td>

                </tr>
              @empty
                  <tr>
                      <td colspan="7">No User Added !</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
              {{ $users->links() }}
          </div>
        </main>
@endsection

@extends('admin.layouts.master')

@section('title', 'Category')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Category List</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('category.create') }}">Create</a>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->user->first_name . ' ' . $category->user->middle_name}}</td>
                        <td>
                            <span class="badge badge-{{ $category->status ? 'primary' : 'danger' }}">
                                {{ $category->status ? 'Active' : 'InActive' }}
{{--                                Ternary Operator--}}
                            </span>
                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary"><span data-feather="edit"></span></a>
                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-dark"><span data-feather="eye"></span></a>
                            <a href="{{ route('category.destroy', $category->id) }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('delete-category-{{ $category->id }}').submit();"
                               class="btn btn-danger"><span data-feather="trash-2"></span></a>


                            <form id="delete-category-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No Category Added !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection

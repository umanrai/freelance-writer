@extends('admin.layouts.master')

@section('title', 'Feature')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('feature.create') }}"> Create New Feature</a>
            </div>

            <div class="card-body">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($features as $feature)
                        <tr>
                            <td>{{$feature->icon}}</td>
                            <td>{{$feature->title}}</td>
                            <td>{{Str::limit($feature->summary, 20) }}</td>
                            <td>{{Str::limit($feature->description, 40) }}</td>

                            <td><a href="{{ route('feature.edit',$feature->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                            <td><a class="btn btn-dark" href="{{ route('feature.show',$feature->id) }}"><span data-feather="eye"></span></a></td>
                            <td>
                                <form action="{{ route('feature.destroy', $feature->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Features Added !</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $features->links() }}
            </div>
        </div>
    </main>
@endsection

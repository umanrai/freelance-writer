@extends('admin.layouts.master')

@section('title', 'Tag')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="card uper">

        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('tag.create') }}"> Create New Tag</a>
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
                    <td>ID</td>
                    <td>Title</td>
                    <td>Body</td>
                    <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->title}}</td>
                        <td>{{$tag->body}}</td>
                        <td><a href="{{ route('tag.edit',$tag->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                        <td><a class="btn btn-dark" href="{{ route('tag.show',$tag->id) }}"><span data-feather="eye"></span></a></td>
                        <td>
                            <form action="{{ route('tag.destroy', $tag->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </main>
@endsection

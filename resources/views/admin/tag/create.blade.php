@extends('admin.layouts.master')

@section('title', 'Create a tag')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">



    <div class="card uper">
        <div class="card-header">
            <h1>Create a post</h1>
            <p class=" pull-right">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('tag.index') }}">List</a>
            </p>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('tag.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="form-group">
                    <label for="price">Body:</label>
                    <textarea name="body" id="body" class="form-control"></textarea>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </main>
@endsection

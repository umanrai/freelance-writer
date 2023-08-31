@extends('admin.layouts.master')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="card uper">
        <div class="card-header">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('tag.index') }}"> List</a>
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
            <form method="POST" action="{{ route('tag.update', $tag->id) }}">
                @csrf

                @method('PUT')

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="tag_title" value={{ $tag->title }} />
                </div>
                <div class="form-group">
                    <label for="price">Body:</label>
                    <textarea name="body" id="tag_body" class="form-control">{{ $tag->body }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    </main>
@endsection

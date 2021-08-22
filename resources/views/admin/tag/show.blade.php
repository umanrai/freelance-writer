@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="card uper">

        <div class="card-header">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('tag.index') }}"> List</a>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Title:</strong>

                        {{ $tag->title }}

                    </div>

                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Body:</strong>

                        {{ $tag->body }}

                    </div>

                </div>

            </div>

        </div>
    </div>
    </main>
@endsection

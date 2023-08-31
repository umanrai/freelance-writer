@extends('admin.layouts.master')

@section('title', 'Create a service')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <div class="card uper">
            <div class="card-header">
                <h1>Create a service</h1>
                <p class=" pull-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('service.index') }}">List</a>
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
                    </div><br/>
                @endif
                <form method="post" action="{{ route('service.store') }}" enctype="multipart/form-data" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-check-label" for="icon">Icon:</label>
                        <textarea name="icon" id="icon" class="form-control" required>{{ old('icon') }}</textarea>

                        <div class="valid-feedback"></div>
                        @if($errors->has('icon'))
                            <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="title">title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="summary">Summary:</label>
                        <input type="text" class="form-control" name="summary" id="summary" value="{{ old('summary') }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('summary'))
                            <div class="invalid-feedback">{{ $errors->first('summary') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>

                        <div class="valid-feedback"></div>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

{{--
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="radio" name="is_completed_by_user" value="1" {{ (old('is_completed_by_user') ?? $service->is_completed_by_user ?? null) == 1 ? 'checked' : '' }}> Publish
                        <input type="radio" name="is_completed_by_user" value="0" {{ (old('is_completed_by_user') ?? $service->is_completed_by_user ?? null) == 0 ? 'checked' : '' }}> Draft
                        @if($errors->has('is_completed_by_user'))
                            <div class="error">{{ $errors->first('is_completed_by_user') }}</div>
                        @endif
                    </div>
--}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection

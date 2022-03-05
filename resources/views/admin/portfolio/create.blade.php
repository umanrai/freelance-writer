@extends('admin.layouts.master')

@section('title', 'Create a portfolio')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <div class="card uper">
            <div class="card-header">
                <h1>Create a portfolio</h1>
                <p class=" pull-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('portfolio.index') }}">List</a>
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
                <form method="post" action="{{ route('portfolio.store') }}" enctype="multipart/form-data" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-check-label" for="title">Category Type</label>
                        <select name="type" class="form-control" required>
                            <option disabled selected>Select Type</option>
                            @foreach(\App\Misc\PortfolioType::types() as $index => $type)
                                <option value="{{ $index }}" {{ (!is_null(old('type')) && old('type') == $index) ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>

                        <div class="valid-feedback"></div>
                        @if($errors->has('type'))
                            <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="image_holder">Image</label>
                        <input type="file" class="form-control" name="image_holder" id="image_holder" value="{{ old('image_holder') }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('image_holder'))
                            <div class="invalid-feedback">{{ $errors->first('image_holder') }}</div>
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

                    <div class="form-group">
                        <label class="form-check-label" for="url">URL</label>
                        <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}" required />
                        <div class="valid-feedback"></div>
                        @if($errors->has('url'))
                            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="url">Published Date</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" required />
                        <div class="valid-feedback"></div>
                        @if($errors->has('date'))
                            <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection

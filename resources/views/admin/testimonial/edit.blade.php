@extends('admin.layouts.master')

@section('title', 'Edit a Testimonial')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <div class="card uper">
            <div class="card-header">
                <h1>Edit a testimonial</h1>
                <p class=" pull-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('testimonial.index') }}">List</a>
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

                <form method="POST" action="{{ route('testimonial.update', $testimonial->id) }}" enctype="multipart/form-data" class="needs-validation @if($errors->any()) was-validated @endif" novalidate>
                    @csrf

                    @method('PUT')


                    <div class="form-group">
                        <label class="form-check-label" for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $testimonial->name }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label class="form-check-label" for="image_holder">Image</label> <br><br>
                        <img src="{{ $testimonial->getImage() }}" alt="{{ $testimonial->name }}" style="height: 100px;width: 100px;">
                        <br> <br>
                        <input type="file" class="form-control" name="image_holder" id="image_holder" value="{{ old('image_holder') }}" required />

                        <div class="valid-feedback"></div>
                        @if($errors->has('image_holder'))
                            <div class="invalid-feedback">{{ $errors->first('image_holder') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="designation">Designation:</label>
                        <textarea name="designation" id="designation" class="form-control" required>{{ old('designation') ?? $testimonial->designation }}</textarea>
                        <div class="valid-feedback"></div>
                        @if($errors->has('designation'))
                            <div class="invalid-feedback">{{ $errors->first('designation') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-check-label" for="statement">Statement:</label>
                        <textarea name="statement" id="statement" class="form-control" required>{{ old('statement') ?? $testimonial->statement }}</textarea>
                        <div class="valid-feedback"></div>
                        @if($errors->has('statement'))
                            <div class="invalid-feedback">{{ $errors->first('statement') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection

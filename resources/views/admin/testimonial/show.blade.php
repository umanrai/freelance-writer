@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">

            <div class="card-header">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('testimonial.index') }}"> List</a>
            </div>


            <div class="card-body">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Name:</strong>

                            {{ $testimonial->name }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Image</strong> <br>

                            <img src="{{ $testimonial->getImage() }}" style="width: 200px;">

                        </div>

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Designation:</strong>

                            {{ $testimonial->designation }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Statement:</strong>

                            {{ $testimonial->statement }}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection

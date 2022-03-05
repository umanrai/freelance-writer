@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">

            <div class="card-header">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('faq.index') }}"> List</a>
            </div>


            <div class="card-body">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Title:</strong>

                            {{ $faq->title }}

                        </div>

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Description:</strong>

                            {{ $faq->description }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Slug:</strong>

                            {{$faq->slug}}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection

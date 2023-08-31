@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">

            <div class="card-header">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('portfolio.index') }}"> List</a>
            </div>


            <div class="card-body">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Title:</strong>

                            {{ $portfolio->title }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Image</strong> <br>

                            <img src="{{ $portfolio->getImage() }}" style="width: 200px;">

                        </div>

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Description:</strong>

                            {{ $portfolio->description }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Catgory Type:</strong>

                            {{ \App\Misc\PortfolioType::types()[$portfolio->type] ?? 'N/A' }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Slug:</strong>

                            {{$portfolio->slug}}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Url:</strong>

                            {{ $portfolio->url }}

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Date:</strong>

                            {{ $portfolio->date }}

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
@endsection

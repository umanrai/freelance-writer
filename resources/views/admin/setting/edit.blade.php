@extends('admin.layouts.master')

@section('title', 'Setting')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">
            <div class="card-header">
                <h5><i data-feather="settings"></i> <span>Configuration</span></h5>
            </div>

            <div class="card-body">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    <br/>
                @endif

                @include('admin.setting.partials.form')
            </div>
        </div>
    </main>
@endsection

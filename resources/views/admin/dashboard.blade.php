@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


     @guest <p> Please <a href="{{ route('login') }}">login</a>  </p>@else <h1>Hello From dashboard</h1>  @endguest

     </main>
@endsection

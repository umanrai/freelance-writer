@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

     <h1>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</h1>
    <p class=" pull-right">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.index') }}">List</a>
    </p>

    <ul>
        <li>
            <b>Status</b> : <span class="badge badge-{{ $user->status ? 'primary' : 'danger' }}">
                                {{ $user->status ? 'Active' : 'InActive' }}
                {{--                                Ternary Operator--}}
                            </span>
        </li>
        <li><b>Email : </b> {{ $user->email }}</li>
        <li><b>Phone : </b> {{ $user->phone }}</li>

    </ul>
     </main>
@endsection

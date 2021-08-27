@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

     <h1>{{ $category->name }}</h1>
    <p class=" pull-right">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('category.index') }}">List</a>
    </p>



    <ul>
        <li>
            <b>slug</b> : <a href="{{ url('category/'. $category->slug) }}" target="_blank">{{ url('category/'. $category->slug) }}</a>
        </li>
        <li>
            <b>Status</b> : <span class="badge badge-{{ $category->status ? 'primary' : 'danger' }}">
                                {{ $category->status ? 'Active' : 'InActive' }}
                {{--                                Ternary Operator--}}
                            </span>
        </li>
    </ul>
     </main>
@endsection

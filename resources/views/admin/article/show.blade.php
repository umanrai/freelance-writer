@extends('admin.layouts.master')

@section('title', 'Show')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h1>{{ $article->name }}</h1>
        <p class=" pull-right">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('article.index') }}">List</a>
        </p>



        <ul>
            <li>
                <b>title</b> : {{ $article->title }}
            </li>
            <li>
                <b>body</b> : {{ $article->body }}
            </li>
            <li>
                <b>slug</b> : <a href="{{ url('article/'. $article->slug) }}" target="_blank">{{ url('article/'. $article->slug) }}</a>
            </li>
            <li>
                <b>Wage</b> : Rs.{{ $article->wages }}
            </li>
            <li>
                <b>Description</b> : {{ $article->description }}
            </li>
            <li>
                <b>Status</b> : <span class="badge badge-{{ $article->status ? 'primary' : 'danger' }}">
                                {{ $article->status ? 'Active' : 'InActive' }}
                    {{--                                Ternary Operator--}}
                            </span>
            </li>
        </ul>
    </main>
@endsection

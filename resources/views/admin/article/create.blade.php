@extends('admin.layouts.master')

@section('title', 'Create a article')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h1>Create a Article</h1>

        <p class=" pull-right">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('article.index') }}">List</a>
        </p>
        @if($errors->any())
            {!!  implode('', $errors->all('<div style="color:red">:message</div> <br/>'))  !!}
        @endif

        <form action="{{ route('article.store') }}" method="POST">
            @csrf
            @include('admin.article.partials.form')
        </form>
    </main>
@endsection

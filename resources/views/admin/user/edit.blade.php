@extends('admin.layouts.master')

@section('title', 'Create a user')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

     <h1>Edit a user</h1>

    <p class=" pull-right">
     <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.index') }}">List</a>
</p>
     @if($errors->any())
        {!!  implode('', $errors->all('<div style="color:red">:message</div> <br/>'))  !!}
    @endif

     <form action="{{ route('user.update', $user->id) }}" method="POST">
     @csrf
        <input type="hidden" name="_id" value="{{ $user->id }}">
        @include('admin.user.partials.form')
       </form>
     </main>
@endsection

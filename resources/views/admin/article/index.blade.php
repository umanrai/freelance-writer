@extends('admin.layouts.master')

@section('title', 'Article')

@push('css')
    <style>
        #is_completed_by_writer {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <form method="GET">
            <p class="pull-right">
                <span data-feather="filter"></span> <b>Filter</b>

                <select name="is_completed_by_writer" id="is_completed_by_writer" class="form-control">
                    <option disabled selected> Select Article Publish Status</option>

                    @php

                        $selectedRole = old('is_completed_by_writer') ?? request('is_completed_by_writer') ?? 0;

                    @endphp

                    @foreach([ '0' => 'Draft', 1 => 'Completed'] as $id => $role)
                        <option value="{{ $id }}" {{ $selectedRole == $id ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach

                </select>

                <button type="submit" class="btn btn-primary">Submit</button>

            </p>
        </form>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

            @if (auth()->user()->isClient())

            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('article.create') }}">Create Article</a>
                </div>
            </div>

            @endif
        </div>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Slug</th>

                    @if (auth()->user()->isAdmin())
                    <th>Created By</th>
                    @endif

                    @if (auth()->user()->isClient() || auth()->user()->isAdmin())
                        <th>Writer</th>
                    @endif
                    <th>Article Completed</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($article->body, 25) }}</td>
                        <td>{{ $article->slug }}</td>
                        @if (auth()->user()->isAdmin())
                        <td>{{ optional($article->client)->first_name . ' ' . optional($article->client)->middle_name  . ' ' . optional($article->client)->last_name }}</td>
                        @endif

                        @if (auth()->user()->isClient() || auth()->user()->isAdmin())
                            <td>{{ optional($article->writer)->first_name . ' ' . optional($article->writer)->middle_name  . ' ' . optional($article->writer)->last_name }}
                                <br> <b>{{ optional($article->writer)->email }}</b>
                            </td>
                        @endif

                        <td>
                            <span class="badge badge-{{ $article->is_completed_by_writer ? 'primary' : 'danger' }}">
                                {{ $article->is_completed_by_writer ? 'Completed' : 'Draft' }}
                            </span>
                        </td>

                        <td>
                            <span class="badge badge-{{ $article->status ? 'primary' : 'danger' }}">
                                {{ $article->status ? 'Active' : 'InActive' }}
                                {{--                                Ternary Operator--}}
                            </span>
                        </td>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary"><span data-feather="edit"></span></a>
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-dark"><span data-feather="eye"></span></a>
                            <a href="{{ route('article.destroy', $article->id) }}"
                               onclick="event.preventDefault();
                                   document.getElementById('delete-article-{{ $article->id }}').submit();"
                               class="btn btn-danger"><span data-feather="trash-2"></span></a>


                            <form id="delete-article-{{ $article->id }}" action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">No Article Added !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $articles->links() }}
        </div>
    </main>
@endsection

@push('js')

@endpush

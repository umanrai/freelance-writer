@extends('admin.layouts.master')

@section('title', 'Article')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('article.create') }}">Create Article</a>
                </div>
            </div>
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
                    <th>Created By</th>
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
                        <td>{{ optional($article->user)->first_name . ' ' . optional($article->user)->middle_name}}</td>
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
                        <td colspan="7">No Category Added !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $articles->links() }}
        </div>
    </main>
@endsection

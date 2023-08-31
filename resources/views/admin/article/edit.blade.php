@extends('admin.layouts.master')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 mb-2">

        <h1>Edit a article</h1>

        <p class=" pull-right">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('article.index') }}">List</a>
        </p>
        <form action="{{ route('article.update', $article->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_id" value="{{ $article->id }}">
            @include('admin.article.partials.form')
        </form>
    </main>
@endsection

@push('js')
    <script>
        $(function () {
            $(document).on('click', '.generate-using-ai', function (e) {
                e.preventDefault()

                $.ajax({
                    type: 'POST',
                    url: '{{ route('generate-content') }}',
                    data: {
                        title: $('input[name=prompt_title]').val(),
                        desc: $('input[name=prompt_desc]').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        $('textarea[name=description]').val(data);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message, 'AI Error')
                    }
                });
            })
        })
    </script>
@endpush

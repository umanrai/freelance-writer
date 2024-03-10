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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <script>
        $(function () {
            $(document).on('click', '.generate-using-ai', function (e) {
                e.preventDefault()

                var $this = $(this);

                $this.prop('disabled', true)
                    .html( ' Generating using AI ... <i class="fa fa-spin fa-spinner"></i>' );

                $.ajax({
                    type: 'POST',
                    url: '{{ route('generate-content') }}',
                    data: {
                        title: $('input[name=prompt_title]').val(),
                        desc: $('input[name=prompt_desc]').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('textarea[name=description]').val(data);
                        $this.prop('disabled', false)
                            .html( ' Generate using AI' );
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message, 'AI Error')

                        $this.prop('disabled', false)
                            .html( ' Generate using AI' );
                    }
                });
            })
        })
    </script>
@endpush

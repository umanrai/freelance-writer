
@extends('admin.layouts.master')

@section('title', 'Faq')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="card uper">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('faq.create')}}"> Create New FAQ</a>
        </div>

        <div class="card-body">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
            @endif
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>

                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>

                @forelse($faqs as $faq)
                <tr>
                    <td>{{$faq->title}}</td>
                    <td>{{ Str::limit($faq->description, 25)  }}</td>

                    <td><a href="{{ route('faq.edit',$faq->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                    <td><a class="btn btn-dark" href="{{ route('faq.show',$faq->id) }}"><span data-feather="eye"></span></a></td>
                    <td>
                        <form action="{{ route('faq.destroy', $faq->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No FAQ Added !</td>
                </tr>
                @endforelse


                </tbody>
            </table>
            {{ $faqs->links() }}
        </div>
    </div>
</main>
@endsection

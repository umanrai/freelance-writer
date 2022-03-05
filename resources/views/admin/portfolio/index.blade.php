@extends('admin.layouts.master')

@section('title', 'Portfolio')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('portfolio.create') }}"> Create New Portfolio</a>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Url</th>
                        <td>Date</td>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($portfolios as $portfolio)
                        <tr>
                            <td>
                                <img src="{{ $portfolio->getImage() }}" alt="{{ $portfolio->title }}" style="height: 50px;width: 50px;">
                            </td>
                            <td>{{$portfolio->title}}</td>
                            <td>{{ Str::limit($portfolio->description, 25)  }}</td>
                            <td>{{$portfolio->url}}</td>
                            <td>{{$portfolio->date}}</td>

                            <td><a href="{{ route('portfolio.edit',$portfolio->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                            <td><a class="btn btn-dark" href="{{ route('portfolio.show',$portfolio->id) }}"><span data-feather="eye"></span></a></td>
                            <td>
                                <form action="{{ route('portfolio.destroy', $portfolio->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Portfolio Added !</td>
                        </tr>
                    @endforelse


                    </tbody>
                </table>
                {{ $portfolios->links() }}
            </div>
        </div>
    </main>
@endsection

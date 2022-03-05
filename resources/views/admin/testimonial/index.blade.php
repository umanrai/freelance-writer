@extends('admin.layouts.master')

@section('title', 'Testimonial')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('testimonial.create') }}"> Create New Testimonial</a>
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
                        <th>name</th>
                        <th>designation</th>
                        <th>statement</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>
                                <img src="{{ $testimonial->getImage() }}" alt="{{ $testimonial->title }}" style="height: 50px;width: 50px;">
                            </td>
                            <td>{{$testimonial->name}}</td>
                            <td>{{Str::limit($testimonial->designation, 25) }}</td>
                            <td>{{ Str::limit($testimonial->statement, 50) }}</td>

                            <td><a href="{{ route('testimonial.edit',$testimonial->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                            <td><a class="btn btn-dark" href="{{ route('testimonial.show',$testimonial->id) }}"><span data-feather="eye"></span></a></td>
                            <td>
                                <form action="{{ route('testimonial.destroy', $testimonial->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Testimonial Added !</td>
                        </tr>
                    @endforelse


                    </tbody>
                </table>
                {{ $testimonials->links() }}
            </div>
        </div>
    </main>
@endsection

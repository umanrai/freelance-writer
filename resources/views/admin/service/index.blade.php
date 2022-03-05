@extends('admin.layouts.master')

@section('title', 'Service')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="card uper">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('service.create') }}"> Create New Service</a>
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
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($services as $service)
                        <tr>
                             <td>{{$service->icon}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{Str::limit($service->summary, 20) }}</td>
                            <td>{{Str::limit($service->description, 40) }}</td>
                            <td>
                                <span class="badge badge-{{ $service->status ? 'primary' : 'danger' }}">
                                    {{ $service->status ? 'Active' : 'InActive' }}
                                </span>
                            </td>
                            <td><a href="{{ route('service.edit',$service->id)}}" class="btn btn-primary"><span data-feather="edit"></span></a></td>

                            <td><a class="btn btn-dark" href="{{ route('service.show',$service->id) }}"><span data-feather="eye"></span></a></td>
                            <td>
                                <form action="{{ route('service.destroy', $service->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><span data-feather="trash-2"></span></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Service Added !</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $services->links() }}
            </div>
        </div>
    </main>


@endsection


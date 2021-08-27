@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

     @guest
        <p> Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>. </p>
    @else
         <div class="row">
             <div class="col-md-4 order-md-2 mb-4">
                 <h4 class="d-flex justify-content-between align-items-center mb-3">
                     <span class="text-muted">Total @if (auth()->user()->role_id === \App\Misc\Role::ROLE_ADMIN) Entity @endif</span>
                     <span class="badge badge-secondary badge-pill">ALL</span>
                 </h4>
                 <ul class="list-group mb-3">
                     @if (auth()->user()->isAdmin())
                     <li class="list-group-item d-flex justify-content-between lh-condensed">
                         <div>
                             <h6 class="my-0">Total User</h6>
                             <small class="text-muted">All users including writers/clients/admins.</small>
                         </div>
                         <span class="text-muted">{{ $data['total-users'] }}</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between lh-condensed">
                         <div>
                             <h6 class="my-0">Total Writer</h6>
                         </div>
                         <span class="text-muted">{{ $data['total-writers'] }}</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between lh-condensed">
                         <div>
                             <h6 class="my-0">Total Client</h6>
                         </div>
                         <span class="text-muted">{{ $data['total-clients'] }}</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between">
                         <div>
                             <h6 class="my-0">Total Article</h6>
                         </div>
                         <span class="text-muted">{{ $data['total-articles'] }}</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between">
                         <div>
                             <h6 class="my-0">Total Tag</h6>
                         </div>
                         <span class="text-muted">{{ $data['total-tags'] }}</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between">
                         <div>
                             <h6 class="my-0">Total Category</h6>
                         </div>
                         <span class="text-muted">{{ $data['total-categories'] }}</span>
                     </li>
                     @elseif (auth()->user()->isClient())
                         <li class="list-group-item d-flex justify-content-between">
                             <div>
                                 <h6 class="my-0">Total Article Title</h6>
                             </div>
                             <span class="text-muted">{{ $data['total-articles-given-by-me'] }}</span>
                         </li>
                     @else
                         <li class="list-group-item d-flex justify-content-between">
                             <div>
                                 <h6 class="my-0">Total Article On Draft</h6>
                             </div>
                             <span class="text-muted">{{ $data['total-articles-draft'] }}</span>
                         </li>

                         <li class="list-group-item d-flex justify-content-between">
                             <div>
                                 <h6 class="my-0">Total Article Completed</h6>
                             </div>
                             <span class="text-muted">{{ $data['total-articles-publised'] }}</span>
                         </li>

                         <li class="list-group-item d-flex justify-content-between">
                             <div>
                                 <h6 class="my-0">Total Earned</h6>
                             </div>
                             <span class="text-muted">$ {{ $data['total-earned'] }}</span>
                         </li>
                     @endif
                 </ul>

             </div>
         </div>
    @endguest

</main>
@endsection

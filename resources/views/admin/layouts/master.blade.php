@include('admin.layouts.partials.header')
 <body>
   @include('admin.layouts.partials.nav')

    <div class="container-fluid">
      <div class="row">

      @auth

        @include('admin.layouts.partials.sidebar')
        @endauth

        @yield('content')

      </div>
    </div>


    @include('admin.layouts.partials.footer')




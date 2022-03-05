@include('frontend.layout.partials.header')

<body>

@include('frontend.layout.partials.nav')

@include('frontend.layout.partials.slider')

<main id="main">
    @yield('content')
</main>

@include('frontend.layout.partials.footer')




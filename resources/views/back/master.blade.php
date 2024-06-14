<!DOCTYPE HTML>
<html lang="en">
@include('back.partials.head')
<body>
<div class="screen-overlay"></div>
@include('back.partials.side-bar')
<main class="main-wrap">
    @include('back.partials.header')

    @yield('content')

    @include('back.partials.footer')
</main>
@include('back.partials.scripts')
</body>
</html>

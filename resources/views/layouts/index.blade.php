<!DOCTYPE html>
<html lang="en">

@include('layouts.component.head')

<body>

    @include('layouts.component.header')

    @include('layouts.component.sidebar')
    @include('sweetalert::alert')

    <main id="main" class="main">

        @yield('main-content')

    </main><!-- End #main -->

    {{-- @include('layouts.component.footer') --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('layouts.component.js')

</body>

</html>

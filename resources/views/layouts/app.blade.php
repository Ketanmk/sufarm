<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunder Farm - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}"/>
    @yield('styles')

</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
@include('layouts.navigation')

<!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Page wrapper -->
    @include('layouts.topnavbar')

    <!-- Main view  -->
    @yield('content')

    <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->
<script src="https://unpkg.com/vue"></script>

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

@section('scripts')
@show

</body>
</html>

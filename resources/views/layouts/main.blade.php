<html lang="en">
<head>
    @include('layouts.partials.headers')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.partials.navbar')
    @include('layouts.partials.sidemenu')
    @yield('content')
    @include('layouts.partials.footer')
</div>
@include('layouts.partials.scripts')
@yield('scripts')
</body>
</html>

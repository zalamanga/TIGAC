<!DOCTYPE html>
@include('includes.admin.head')
@include('sweetalert::alert')
<html lang='en'></html>
<body>
    <script src="{{ asset('static/js/initTheme.js') }}"></script>
    <div id="auth">
        @yield('content')
    </div>
</body>

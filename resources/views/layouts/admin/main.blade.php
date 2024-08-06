<!DOCTYPE html>
<html lang="en">
@include('includes.admin.head')

<body>
    <script src="{{ asset('static/js/initTheme.js') }}"></script>
    <div id="app">
        @include('components.admin.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @include('components.admin.dashboard-page-heading')
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('includes.admin.foot')
    @stack('scripts')
</body>

</html>

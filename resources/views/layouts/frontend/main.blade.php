@include('includes.head')

<body>
    @include('components.frontend.navbar.index')
    <main>
        @yield('content')
    </main>
    @include('components.frontend.footer.index')

</body>
@include('includes.foot')


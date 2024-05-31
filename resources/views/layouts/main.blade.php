@include('includes.head')

<body>
    @include('components.navbar.index')
    <main>
        @yield('content')
    </main>
    @include('components.footer.index')

</body>
@include('includes.foot')


@include('includes.head')

<body class="bg-dark">
    @include('components.navbar.index')
    <main>
        @yield('content')
    </main>
    @include('components.footer.index')

</body>
@include('includes.foot')

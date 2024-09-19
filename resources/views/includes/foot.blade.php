{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init();
</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
{{-- <script src="{{asset('js/index.js')}}"></script> --}}
<script src="{{asset('js/sweetalert.min.js')}}"></script>

@yield('scripts')
@include('sweetalert::alert')

</html>

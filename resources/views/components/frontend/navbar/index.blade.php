@php
    $menus = array(
        array(
            'title' => 'product',
            'url' => route('pages.frontend.product')
        ),
        array(
            'title' => 'program',
            'url' => route('pages.frontend.program')
        ),
        array(
            'title' => 'discover',
            'url' => route('pages.frontend.discover')
        ),
        array(
            'title' => 'vaporistar',
            'url' => route('pages.frontend.vaporistar')
        ),
        array(
            'title' => 'newsletter',
            'url' => route('pages.frontend.newsletter')
        ),
        array(
            'title' => 'partnership',
            'url' => route('pages.frontend.partnership')
        ),
    );
    $cartCount = app(\App\Services\CartService::class)->count();
@endphp

<header class="sticky-top bg-white">
    <div class="w-full py-3 bg-black text-white lh-0 text-center">
        <h3 class="m-0" style="font-size: .8em">
            <b>PERINGATAN:</b>
            <span>Produk ini mengandung nikotin. Nikotin dapat menyebabkan ketergantungan</span>
        </h3>
    </div>
    <nav class="navbar navbar-expand-lg py-lg-2 py-xl-3 border-bottom">
        <div class="container">
            <a class="navbar-brand" href="{{Route('pages.frontend.index')}}">
                <img src="{{ asset('images/logo-2.png') }}" alt="Logo" style="width: 100px"/>
            </a>
            <button class="navbar-toggler text-primary position-absolute top-0 end-0 me-3 mt-3" style="z-index: 9999" type="button" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                    </path>
                </svg>
            </button>

            <ul id="navMenu" class="navbar-nav ms-auto gap-3 ps-2 ps-md-0 bg-white pe-3 pe-lg-0">
                @foreach ($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-7 text-nowrap fw-semibold text-uppercase {{Route::is('pages.frontend.'.$menu['title']) ? 'active' : ''}}" aria-current="page" href="{{$menu['url']}}">{{ $menu['title'] }}</a>
                </li>
                @endforeach
                <li class="nav-item">
                    <a href="{{ route('pages.frontend.order-lookup.show') }}"
                       class="nav-link text-secondary fs-7 text-nowrap fw-semibold text-uppercase">
                        Cek Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pages.frontend.cart.show') }}"
                       class="nav-link position-relative text-secondary fs-7 text-nowrap fw-semibold text-uppercase d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        Cart
                        @if ($cartCount > 0)
                            <span class="badge bg-danger rounded-pill">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        const navMenu = document.getElementById('navMenu');
        const btnToggle = document.querySelector('.navbar-toggler');
        let active = false;

        const closeElSVG = '<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 24 24"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>'
        const hamburgerElSVG = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 256 256"> <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"> </path></svg>'

        btnToggle.addEventListener('click', (e) => {
            navMenu.classList.toggle('show');
            active = !active;
            if(active) {
                btnToggle.innerHTML = closeElSVG;
            } else {
                btnToggle.innerHTML = hamburgerElSVG;
            }
        })
    </script>
</header>

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
            'title' => 'discover tigac',
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
    )
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
            
            <ul id="navMenu" class="navbar-nav ms-auto gap-3 ps-2 ps-md-0 bg-white pe-3 pe-lg-0 pt-4">
                @foreach ($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-7 fw-semibold text-uppercase {{Route::is('pages.frontend.'.$menu['title']) ? 'active' : ''}}" aria-current="page" href="{{$menu['url']}}">{{ $menu['title'] }}</a>
                </li>
                @endforeach
                <button class="btn btn-sm btn-primary border-0">Shop Now</button>
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
<header class="sticky-top bg-main">
    <nav class="navbar navbar-expand-lg py-lg-2 ">
        <div class="container">
            <a class="navbar-brand" href="{{Route('pages.index')}}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" />
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                    </path>
                </svg>
            </button>
            <div class="offcanvas offcanvas-end bg-primary" id="navbarNav"  tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="offcanvas-title" href="{{Route('pages.index')}}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="110"/>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto gap-3 ps-2 ps-md-0">
                        <li class="nav-item">
                            <a class="nav-link text-white fs-7 fw-semibold {{Route::is('pages.index') ? 'active' : ''}}" aria-current="page" href="{{route('pages.index')}}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-7 fw-semibold {{Route::is('pages.aboutUs') ? 'active' : ''}}" href="{{route('pages.aboutUs')}}">ABOUT
                                US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-7 fw-semibold {{Route::is('pages.news') ? 'active' : ''}}" href="{{route('pages.news')}}">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fs-7 fw-semibold {{Route::is('pages.products') || Route::is('pages.products.detail') ? 'active' : ''}}" href="{{route('pages.products')}}">PRODUCTS</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white fs-7 fw-semibold {{Route::is('pages.contactUs') ? 'active' : ''}}" href="{{route('pages.contactUs')}}">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
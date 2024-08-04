<footer class="bg-main">
    <div class="container pt-3 pt-md-5 pb-3">
        <div class="row pb-5 mb-4 gap-3 border-bottom">
            <div class="col-12 col-md-5 col-lg-3 mb-3 mb-lg-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="250px" class="rounded mb-3" />
                <p class="mb-4 fs-7 text-white">
                    Jl. Pesanggrahan No.54, RT.10/RW.5, Meruya Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus
                    Ibukota Jakarta 11610
                </p>
                <div class="d-flex fs-6 align-items-center gap-3">
                    <a href="#" class="text-white text-decoration-none" target="_blank" rel="noreferrer noopener">
                        <img src="{{ asset('images/new/logo-twitter.png') }}" alt="twitter">
                    </a>
                    <a href="#" class="text-white text-decoration-none" target="_blank" rel="noreferrer noopener">
                        <img src="{{ asset('images/new/logo-facebook.png') }}" alt="facebook">
                    </a>
                    <a href="#" class="text-white text-decoration-none" target="_blank" rel="noreferrer noopener">
                        <img src="{{ asset('images/new/logo-instagram.png') }}" alt="instagram">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2 mb-3 mb-md-0">
                <div class="d-flex flex-column h-full justify-content-center gap-3 fs-5">
                    <a href="{{ route('pages.frontend.index') }}"
                        class="text-decoration-none footer-link text-white fw-semibold">Work
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                    <a href="{{ route('pages.frontend.index') }}"
                        class="text-decoration-none footer-link text-white fw-semibold">About
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                    <a href="{{ route('pages.frontend.index') }}"
                        class="text-decoration-none footer-link text-white fw-semibold">Carrers
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2 mb-3 mb-md-0">
                <div class="d-flex flex-column h-full justify-content-center gap-3 fs-5">
                    <a href="#" class="text-decoration-none footer-link text-white fw-semibold fs-5">Services
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-decoration-none footer-link text-white fw-semibold">Blogs
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-decoration-none footer-link text-white fw-semibold">Contact Us
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-4">
                <div class="d-flex flex-column h-full justify-content-center gap-2">
                    <h4 class="fs-4 fw-semibold mb-3 text-white" style="max-width: 300px">Subscribe to our Newsletter
                    </h4>
                    <form action="#" class="d-flex align-items-center">
                        <div class="input-group">
                            <input type="text" class="form-control fs-6 p-3 rounded-" placeholder="ENTER EMAIL"
                                style="height: 66px">
                            <button type="submit" class="input-group-text btn btn-lg btn-danger text-white fs-6"
                                style="height: 66px">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p class="text-center text-white">
            Tigac Global Ventura All Rights Reserved {{ Date('Y') }}
        </p>
    </div>
</footer>

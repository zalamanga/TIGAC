<div class="container pt-3 pb-5 py-md-5">
    <div class="row flex-column-reverse flex-lg-row gap-3 gap-lg-0">
        <div class="col-12 col-lg-6">
            @if (!Route::is('pages.aboutUs'))
                <img src="{{ asset('images/logo.png') }}" alt="logo" width="150"
                    class="bg-main px-3 py-2 rounded mb-3">
            @endif
            <h2 class="display-2 fw-bolder m-0">ABOUT US</h2>
            <div style="width: 220px; height: 7px" class="bg-primary rounded-pill mb-4"></div>
            <p class="text-start text-muted mb-3 fs-6">A group of mixologists, or better known as brewers. We have been
                a producer of high-quality e-liquids since 2022. As an e-liquid manufacturer, we adhere to strict
                guidelines. Every variant of e-liquid flavour produced has undergone a quality control process and
                passed the tests, ensuring it is safe to enjoy.
            </p>
            <p class="text-start text-muted mb-3 fs-6">Our production department always strives to create each
                sub-product with the best results to provide a distinct taste difference in every e-liquid compared to
                other e-liquid competitors. We work around the clock with modern vape laboratories, creating new
                e-liquid recipes using advanced techniques to blend the best flavour variants.
            </p>
            <p class="text-start text-muted mb-5 fs-6"><strong>TIGAC</strong> takes pride in creating high-quality vape
                e-liquids that are well-received in the market. We will always be there for all of you with exceptional
                results.
            </p>
            @if (Route::is('pages.aboutUs'))
                <div class="mb-5">
                    <h3 class="fw-semibold fs-3">Our Vision</h3>
                    <p>
                        Our vision is to be the <strong>leading brand in the aping industry</strong>, recognized for
                        our <strong>commitment to innovation, community engagement,</strong> and <strong>promoting a
                            balanced</strong> and <strong>fulfilling lifestyle.</strong>
                    </p>
                </div>
                <div class="mb-5">
                    <h3 class="fs-3 fw-semibold">
                        Our Mission
                    </h3>
                    <div>
                        <ul class="mission row gap-3">
                            <li class="col-5">
                                To foster a vibrant and inclusive vaping community throughevents, education, and support
                                networks.
                            </li>
                            <li class="col-5">
                                To develop cutting-edge vaping products that prioritize safety, quality, and user experience.
                            </li>
                            <li class="col-5">
                                To minimize our environmental
                                impact through sustainable practices and initiatives.
                            </li>
                            <li class="col-5">
                                To develop cutting-edge vaping products that prioritize safety, quality, and user experience.
                            </li>
                            <li class="col-5">
                                To inspire individuals to embrace a lifestyle that promotes self-expression, creativity, and personal wellness.
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            <div class="row align-items-center ps-3 gap-lg-3">
                <div class="col-4 col-lg-2 d-flex flex-column align-items-center ps-0 border-end">
                    <h6 class="fw-semibold">Our Clients</h6>
                    <p class="fs-4 fw-bolder text-primary">350+</p>
                </div>
                <div class="col-4 col-lg-2 col-xl-3 p-0 pe-2 border-end d-flex flex-column align-items-center">
                    <h6 class="fw-semibold">Our Products</h6>
                    <p class="fs-4 fw-bolder text-primary">1350+</p>
                </div>
                <div class="col-3 col-lg-2 d-flex flex-column align-items-center p-0">
                    <h6 class="fw-semibold">Our Stores</h6>
                    <p class="fs-4 fw-bolder text-primary">35+</p>
                </div>
            </div>
            @if (!Route::is('pages.aboutUs'))
                <a href="{{ route('pages.aboutUs') }}" class="btn btn-primary mt-5 rounded-pill btn-lg">Read More</a>
            @else
                <div class="mt-5 px-3 px-md-0">
                    <h3 class="fw-semibold mb-5 fs-4">Our regard</h3>
                    <p>CEO TIGAC</p>
                </div>
            @endif
        </div>
        <div class="col-12 col-lg-6">
            <img src="{{ asset('images/about.png') }}" alt="about" class="img-fluid">
        </div>
    </div>
</div>

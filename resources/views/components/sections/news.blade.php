<div style="min-height: 70dvh">
    <div class="d-flex align-items-center justify-content-between border-bottom mb-5 pb-3">
        <h2 class="fw-bold text-white">Our News</h2>
        <a href="{{route('pages.news')}}" class="d-flex align-items-center gap-2 text-white text-decoration-none fs-7 link">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z">
                </path>
            </svg>
        </a>
    </div>
    <div class="row justify-content-center justify-content-lg-around gap-md-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="card col-11 col-md-5 col-lg-3 p-0 mb-4 mb-md-0 news-item">
                <img src="{{ asset('images/logo.png') }}" alt="watch" class="card-img-top img-fluid">
                <div class="card-body">
                    <a href="#" class="card-title mb-1 fs-5 text-decoration-none fw-bold link">Card title</a>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        @endfor
    </div>
</div>

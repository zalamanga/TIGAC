<div>
    <h2 class="fw-bold text-white mb-4">Our Top Categories</h2>
    <div class="d-flex align-items-center justify-content-between border-bottom pb-4 mb-5">
        <div class="d-flex gap-2 align-items-center category-filters">
            <div class="dropdown">
                <button
                    class="badge badge-light border-0 transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2"
                    data-bs-toggle="dropdown" aria-expanded="false" type="button">All
                    Category
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 256 256">
                        <path
                            d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z">
                        </path>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <button
                class="badge badge-light border-0 transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">HexOhm
            </button>
            <button
                class="badge badge-light border-0 transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">eLiquids
            </button>
            <button
                class="badge badge-light border-0 transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">Molicel
                Vape Battery
            </button>
            <button
                class="badge badge-light border-0 transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">EZDripper
            </button>
        </div>
        <button
            class="badge d-flex border-0 align-items-center rounded-pill text-bg-light py-2 px-3 gap-2 badge-light transition-all">Filters
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                    d="M40,88H73a32,32,0,0,0,62,0h81a8,8,0,0,0,0-16H135a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16Zm64-24A16,16,0,1,1,88,80,16,16,0,0,1,104,64ZM216,168H199a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16h97a32,32,0,0,0,62,0h17a8,8,0,0,0,0-16Zm-48,24a16,16,0,1,1,16-16A16,16,0,0,1,168,192Z">
                </path>
            </svg>
        </button>
    </div>
    <div class="row justify-content-evenly justify-content-md-start gap-md-4 gap-lg-3">
        @foreach ($products as $product)
            <div class="col-5 col-md-4 col-lg-3 product p-0 mb-4">
                <a href="{{ Route('pages.products.detail', $product['id']) }}" class="text-decoration-none">
                    <div class="product-header bg-secondary rounded d-flex align-items-center mb-3 position-relative">
                        <img src="{{ asset('/images/products/' . $product['image']) }}" alt="{{ $product['name'] }}"
                            class="img-fluid rounded">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <p class="product-title text-white fs-5 fw-bold m-0 p-0 text-truncate">{{ $product['name'] }}</p>
                        <p class="fs-7 text-warning m-0 p-0">Rp.{{ number_format($product['price']) }}</p>
                    </div>
                    <p class="mb-2 fs-7 text-white lh-sm">A perfect liquid ever</p>
                    <div class="d-flex align-items-center gap-1 text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <p class="text-white fs-7 m-0 p-0">(121)</p>
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

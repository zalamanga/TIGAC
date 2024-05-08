<div>
    <h2 class="fw-bold text-white mb-4">Our Top Categories</h2>
    <div class="d-flex align-items-center justify-content-between border-bottom pb-4 mb-5">
        <div class="d-flex gap-2 align-items-center category-filters">
            <div class="dropdown">
                <button
                    class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2"
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
                class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">Mens
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z">
                    </path>
                </svg>
            </button>
            <button
                class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">Womens
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z">
                    </path>
                </svg>
            </button>
            <button
                class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">Electronics
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z">
                    </path>
                </svg>
            </button>
            <button
                class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2">Beauty
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z">
                    </path>
                </svg>
            </button>
        </div>
        <button
            class="badge d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2 badge-light transition-all">Filters
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                    d="M40,88H73a32,32,0,0,0,62,0h81a8,8,0,0,0,0-16H135a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16Zm64-24A16,16,0,1,1,88,80,16,16,0,0,1,104,64ZM216,168H199a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16h97a32,32,0,0,0,62,0h17a8,8,0,0,0,0-16Zm-48,24a16,16,0,1,1,16-16A16,16,0,0,1,168,192Z">
                </path>
            </svg>
        </button>
    </div>
    <div class="row justify-content-evenly justify-content-md-start gap-md-4 gap-lg-3">
        @for ($i = 0; $i < 10; $i++)
            <div class="col-5 col-md-4 col-lg-3 product p-0 mb-4">
                <div class="product-header bg-secondary rounded d-flex align-items-center mb-3 position-relative">
                    <img src="{{ asset('/images/logo.png') }}" alt="image-default" class="img-fluid">
                    <button type="button"
                        class="btn btn-sm btn-secondary p-1 me-3 mt-3 rounded-circle position-absolute top-0 end-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <a href="#" class="link text-white fs-5 fw-bold m-0 text-decoration-none p-0">Airpods Max</a>
                    <p class="fs-7 text-warning m-0 p-0">$400.00</p>
                </div>
                <p class="mb-2 fs-7 text-white lh-sm">A perfect balance of high-fidelity audio</p>
                <div class="d-flex align-items-center mb-4 gap-1 text-warning">
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
                <button class="btn btn-sm rounded-pill px-3 btn-primary">Add to Cart</button>
            </div>
        @endfor
    </div>
</div>

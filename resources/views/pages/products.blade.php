@extends('layouts.main')
@section('content')
    <div class="container mt-md-4 mb-3 mb-md-5">
        <button type="button" class="btn btn-primary d-block d-md-none ms-auto mb-3" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                <path
                    d="M40,88H73a32,32,0,0,0,62,0h81a8,8,0,0,0,0-16H135a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16Zm64-24A16,16,0,1,1,88,80,16,16,0,0,1,104,64ZM216,168H199a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16h97a32,32,0,0,0,62,0h17a8,8,0,0,0,0-16Zm-48,24a16,16,0,1,1,16-16A16,16,0,0,1,168,192Z">
                </path>
            </svg>
        </button>

        {{-- Modal filters --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Filter</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="form">
                            <div class="mb-3">
                                <label for="category" class="form-label text-black mb-2 fs-4 fw-bold">Category</label>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="HexOhm" id="HexOhm" class="form-check-input">
                                    <label for="HexOhm" class="form-label text-black mb-2">HexOhm</label>
                                </div>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="eLiquids" id="eLiquids" class="form-check-input">
                                    <label for="eLiquids" class="form-label text-black mb-2">eLiquids</label>
                                </div>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="Vape Battery" id="Vape Battery" class="form-check-input">
                                    <label for="Vape Battery" class="form-label text-black mb-2">Vape Battery</label>
                                </div>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="EZDripper" id="EZDripper" class="form-check-input">
                                    <label for="EZDripper" class="form-label text-black mb-2">EZDripper</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label text-black mb-2 fs-4 fw-bold">Prices</label>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="cheapest" id="cheapest" class="form-check-input">
                                    <label for="cheapest" class="form-label text-black mb-2">Cheapest</label>
                                </div>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="expensive" id="expensive" class="form-check-input">
                                    <label for="expensive" class="form-label text-black mb-2">Expensive</label>
                                </div>
                                <div class="mb-1 fs-7">
                                    <input type="checkbox" name="mostexpensive" id="mostexpensive" class="form-check-input">
                                    <label for="mostexpensive" class="form-label text-black mb-2">Most expensive</label>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary w-100 d-flex align-items-center rounded justify-content-center py-2 px-3 gap-2 transition-all">Filters
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M40,88H73a32,32,0,0,0,62,0h81a8,8,0,0,0,0-16H135a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16Zm64-24A16,16,0,1,1,88,80,16,16,0,0,1,104,64ZM216,168H199a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16h97a32,32,0,0,0,62,0h17a8,8,0,0,0,0-16Zm-48,24a16,16,0,1,1,16-16A16,16,0,0,1,168,192Z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-start justify-content-between">
            <div class="col-12 d-none d-md-block col-md-3 col-lg-3 position-sticky">
                <h2 class="fw-bold text-white mb-3 fs-1">Filters</h2>
                <form action="" class="form">
                    <div class="mb-3">
                        <label for="category" class="form-label text-white mb-2 fs-4 fw-bold">Category</label>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="HexOhm" id="HexOhm" class="form-check-input">
                            <label for="HexOhm" class="form-label text-white mb-2">HexOhm</label>
                        </div>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="eLiquids" id="eLiquids" class="form-check-input">
                            <label for="eLiquids" class="form-label text-white mb-2">eLiquids</label>
                        </div>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="Vape Battery" id="Vape Battery" class="form-check-input">
                            <label for="Vape Battery" class="form-label text-white mb-2">Vape Battery</label>
                        </div>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="EZDripper" id="EZDripper" class="form-check-input">
                            <label for="EZDripper" class="form-label text-white mb-2">EZDripper</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label text-white mb-2 fs-4 fw-bold">Prices</label>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="cheapest" id="cheapest" class="form-check-input">
                            <label for="cheapest" class="form-label text-white mb-2">Cheapest</label>
                        </div>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="expensive" id="expensive" class="form-check-input">
                            <label for="expensive" class="form-label text-white mb-2">Expensive</label>
                        </div>
                        <div class="mb-1 fs-7">
                            <input type="checkbox" name="mostexpensive" id="mostexpensive" class="form-check-input">
                            <label for="mostexpensive" class="form-label text-white mb-2">Most expensive</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary w-100 d-flex align-items-center rounded justify-content-center py-2 px-3 gap-2 transition-all">Filters
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M40,88H73a32,32,0,0,0,62,0h81a8,8,0,0,0,0-16H135a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16Zm64-24A16,16,0,1,1,88,80,16,16,0,0,1,104,64ZM216,168H199a32,32,0,0,0-62,0H40a8,8,0,0,0,0,16h97a32,32,0,0,0,62,0h17a8,8,0,0,0,0-16Zm-48,24a16,16,0,1,1,16-16A16,16,0,0,1,168,192Z">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-9 col-lg-8">
                <div class="row justify-content-start ms-1 mx-auto gap-3 mx-md-0 justify-content-md-end ms-md-0 gap-md-4">
                    @foreach ($products as $product)
                        <div class="col-5 col-md-4 col-lg-3 product p-0 mb-4">
                            <div
                                class="product-header bg-secondary rounded d-flex align-items-center mb-3 position-relative">
                                <img src="{{ asset('/images/products/'. $product['image']) }}" alt="{{$product['name']}}" class="img-fluid rounded">
                                <button type="button"
                                    class="btn btn-sm btn-secondary p-1 me-3 mt-3 rounded-circle position-absolute top-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" viewBox="0 0 256 256">
                                        <path
                                            d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <a href="{{Route('pages.products.detail', $product['id'])}}"
                                    class="link text-white fs-5 fw-bold m-0 text-decoration-none p-0 text-truncate">{{$product['name']}}</a>
                                <p class="fs-7 text-warning m-0 p-0">Rp.{{number_format($product['price'])}}</p>
                            </div>
                            <p class="mb-2 fs-7 text-white lh-sm">A perfect liquid ever</p>
                            <div class="d-flex align-items-center gap-1 text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                                    </path>
                                </svg>
                                <p class="text-white fs-7 m-0 p-0">(121)</p>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

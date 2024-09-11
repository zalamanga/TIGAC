@extends('layouts.frontend.main')
@section('title','Consumer Program Page')
@section('content')
    <section class="bg-gradient-consumer py-5" style="min-height: 60vh">
        <div class="text-center container-fluid">
            <h1 class="fw-semibold tagline-xxl mx-auto mb-3" style="max-width: 900px">Let Us <span
                    class="fw-semibold text-ogg  fst-italic">Get</span> to Know You
            </h1>
            <p class="text-black fs-4 lh-base mb-4 mx-auto mb-md-5" style="max-width: 700px">We know everyone is valuable and
                has their own worth. Get even more benefits by being part of TIGAC.
            </p>
            <form id="form-consumer-program"  action="" class="pb-5">
                <div class="row justify-content-center align-items-center flex-column gap-3 mb-4 mb-lg-5">
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white"
                            style="height: 57px; border-radius: 10px;" placeholder="NAME">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" inputmode="numeric" class="form-control rounded-3 fs-7 bg-white"
                            style="height: 57px; border-radius: 10px;" placeholder="PHONE NUMBER">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="email" class="form-control rounded-3 fs-7 bg-white"
                            style="height: 57px; border-radius: 10px;" placeholder="EMAIL">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white"
                            style="height: 57px; border-radius: 10px;" placeholder="TEMPAT/TANGGAL LAHIR">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white"
                            style="height: 57px; border-radius: 10px;" placeholder="KOTA/DOMISILI">
                    </div>
                </div>
                <button type="submit"
                    class="btn btn-lg mx-auto btn-danger border-0 d-flex align-items-center justify-content-center gap-2 text-white"
                    style="min-width: 13rem; height: 3.5rem;">
                    <span class="fs-6">SUBMIT</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                        fill="currentColor">
                        <g clip-path="url(#clip0_1_30)">
                            <path
                                d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_30">
                                <rect width="34" height="34" fill="white"
                                    transform="translate(0.304688 0.803833)" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </form>
        </div>
        <div class="container d-none" id="consumer-program-success">
            <div class="card-consumer-program mx-auto p-4 text-center position-relative overflow-hidden mb-5 mb-md-4">
                <h1 class="display-3 mb-4 fw-semibold pb-lg-2">Hey, Quick Heads Up!</h1>
                <p class="fs-5 text-secondary mb-4 lh-1 pb-lg-2">Pastikan bahwa data dan nomor telepon yang kamu masukkan
                    sudah benar, karena hadiah akan langsung dikirimkan ke no telepon yang telah kamu daftarkan melalui
                    whatsapp. Ini adalah cara kami untuk menunjukkan betapa kami menghargai kamu dan berterima kasih atas
                    dukunganmu yang luar biasa. Kami sangat senang kamu menjadi bagian dari komunitas kami, dan kami tidak
                    sabar untuk berbagi lebih banyak keseruan dan manfaat denganmu!</p>
                <p class="fs-5 lh-1 mx-auto fw-semibold" style="max-width: 650px">Don't forget to follow us on social media!
                    Stay connected for the latest updates,exclusive deals, and more fun content!</p>
                <img src="{{ asset('images/new/maskot.png') }}" alt="maskot" class="position-absolute img-fluid"
                    width="260" style="bottom: -10%; right: -7.555%; rotate: 8deg">
            </div>
            <div class="text-center">
                <a href="{{ Route('pages.frontend.index') }}"
                    class="d-inline-flex align-items-center gap-2 fs-6 text-danger fw-medium text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="rotate: -180deg" fill="none" >
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.4697 5.46967C12.7626 5.17678 13.2374 5.17678 13.5303 5.46967L19.5303 11.4697C19.8232 11.7626 19.8232 12.2374 19.5303 12.5303L13.5303 18.5303C13.2374 18.8232 12.7626 18.8232 12.4697 18.5303C12.1768 18.2374 12.1768 17.7626 12.4697 17.4697L17.1893 12.75H0.75C0.33579 12.75 0 12.4142 0 12C0 11.5858 0.33579 11.25 0.75 11.25H17.1893L12.4697 6.53033C12.1768 6.23744 12.1768 5.76256 12.4697 5.46967Z"
                            fill="#EE2D38" />
                    </svg>
                    BACK TO HOME
                </a>
            </div>
        </div>
    </section>

    <script>
        const formConsumerProgram = document.querySelector('#form-consumer-program')
        const consumerProgramSuccess = document.querySelector('#consumer-program-success')


        formConsumerProgram.addEventListener(('submit'), (e) => {
            e.preventDefault();
            formConsumerProgram.parentNode.classList.add('d-none');
            consumerProgramSuccess.classList.remove('d-none')
        })
    </script>
@endsection

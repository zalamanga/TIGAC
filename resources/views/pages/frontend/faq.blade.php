@php
    $faqs = [
        [
            'question' => 'Apakah produk TIGAC aman digunakan?',
            'answer' =>
                'Ya, produk-produk kami sangat aman. e-juice TIGAC telah melalui serangkaian uji lab untuk memastikan tidak ada bahan kimia berbahaya yang tidak diperlukan untuk vaping. Semua produk kami diproduksi sendiri di ruang khusus yang telah distandarisasi, memastikan tidak ada kontaminan yang masuk ke dalam proses produksi e-juice',
        ],
        [
            'question' => 'Bagaimana cara memesan produk TIGAC?',
            'answer' =>
                'Anda dapat memesan produk TIGAC melalui toko-toko vape terdekat atau melalui platform online resmi kami.',
        ],
        [
            'question' => 'Apa saja varian rasa yang ditawarkan oleh TIGAC?',
            'answer' =>
                'TIGAC menawarkan beragam varian rasa e-liquid yang memikat, mulai dari buah-buahan segar hingga pilihan rasa manis dan gurih. Anda dapat menemukan varian seperti buah-buahan tropis, permen, dan bahkan rasa minuman atau desert yang terinspirasi dari berbagai macam pilihan produk kami.',
        ],
        [
            'question' => 'Bagaimana cara memastikan keaslian produk TIGAC?',
            'answer' =>
                'Untuk memastikan keaslian produk TIGAC, pastikan untuk membeli produk hanya dari pengecer resmi atau platform online kami yang terpercaya. Setiap produk asli TIGAC akan memiliki label keaslian.',
        ],
        [
            'question' => 'Apakah ada program loyalitas atau promosi khusus bagi pelanggan dan mitra bisnis TIGAC?',
            'answer' =>
                'Ya, kami memiliki program loyalitas dan sering menawarkan promosi khusus bagi pelanggan setia kami. Pastikan untuk bergabung dengan milis kami atau mengikuti akun media sosial dan mengecek website resmi kami untuk mendapatkan informasi terbaru tentang penawaran, diskon, dan acara khusus yang sedang berlangsung.',
        ],
        [
            'question' => 'Bagaimana caranya KLAIM hadiah yang di dapatkan ?',
            'answer' =>
                'Silakan menghubungi Customer Service TIGAC untuk claim hadiah ke nomor berikut 0811-8888-2305.',
        ],
        [
            'question' => 'Bagaimana cara mengetahui Ketersediaan Produk untuk Wholesale?',
            'answer' =>
                'Silakan menghubungi Customer Service TIGAC untuk mengetahui stock ketersedian ke nomor berikut 0811-8888-2305 dan mengisi form yang di sediakan.',
        ],
        [
            'question' => 'Apakah produk e-juice TIGAC legal?',
            'answer' =>
                'Produk e-juice TIGAC termasuk dalam kategori produk tembakau alternatif yang diatur oleh pemerintah Indonesia. Penjualan dan distribusi e-juice di Indonesia harus mematuhi regulasi yang berlaku, seperti perizinan dan ketentuan label kesehatan. TIGAC berkomitmen untuk mematuhi semua peraturan tersebut guna memastikan bahwa produk yang dijual legal dan aman bagi konsumen. ',
        ],
    ];
@endphp

@extends('layouts.frontend.main')
@section('content')
    <section class="container my-3 my-xl-5 pb-5">
        <div class="mb-3 mb-md-5 mb-lg-4 px-xl-5" style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color: #222d68 !important">
                <li class="breadcrumb-item fw-bold display-3">F.A.Q</li>
                <li class="breadcrumb-item display-3"> Frequently Asked Questions</li>
            </ol>
        </div>
        <div class="accordion accordion-flush px-xl-5 mb-5 pb-xl-3" id="accordionPanelsStayOpenExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button px-0 fw-semibold fs-2 text-uppercase bg-white text-black"
                            type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $loop->index }}"
                            aria-expanded="true" aria-controls="panelsStayOpen-{{ $loop->index }}">
                            {{ $faq['question'] }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-{{ $loop->index }}" class="accordion-collapse collapse show">
                        <div
                            class="accordion-body pt-0 px-0 text-black fs-4 {{ !$loop->last ? 'border-bottom border-2' : '' }}">
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="text-center fs-3 text-black fw-semibold mb-5">Jika kamu masih ada pertanyaan lain silakan menghubungi kami </h3>
        <div class="text-center">
            <a type="button" class="btn btn-lg btn-danger text-white mx-auto d-inline-flex align-items-center justify-content-between py-3 gap-3" href="https://wa.me/6289651147065" target="_blank">Chat on WhatsApp
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
            </a>
        </div>

    </section>
@endsection

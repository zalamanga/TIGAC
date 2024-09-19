@extends('layouts.frontend.main')
@section('title', 'Tcall Page')
@section('content')

    <style>
        @media (max-width: 1024px) {
            .bg-tcall {
                display: none;
            }

            .tcall-by-tigac {
                width: 100%;
                height: 100%;
            }

            .h-screen {
                min-height: 100vh;
            }
        }

        @media (max-width: 767px) {
            .tcall-items {
                margin-top: -20%;
            }

            .h-screen {
                min-height: 80vh;
            }
        }

        .section-1-img {
            width: 329px;
            height: 160px;
        }

        .section-1-text {
            max-width: 705px;
            height: 150px;
        }

        .section-2-title {
            color: #262F67;
            font-family: Work Sans;
            font-size: 64px;
            line-height: 56px;
            letter-spacing: -1px;
        }

        .section-2-paragraph {
            font-family: Work Sans;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
        }

        .section-3-title {
            font-family: Work Sans;
            font-size: 64px;
            font-weight: 600;
            letter-spacing: -1px;
            text-align: left;
        }

        .section-4-paragraph {
            font-family: Work Sans;
            font-size: 24px;
            line-height: 40px;
            text-align: center;
        }
    </style>

    {{-- Section 1 --}}
    <section class="bg-main h-screen d-flex align-items-center mb-3 position-relative overflow-hidden">
        <div class="container d-flex flex-column-reverse flex-lg-row gap-lg-3" data-aos="fade-down">
            <div class="d-flex flex-column justify-content-center tcall-items">
                <img src="{{ asset('images/new/tcall-by-tigac.png') }}"
                     class="tcall-by-tigac section-1-img"
                     alt="Tcall By Tigac">
                <p class="fs-6 text-white mt-5 section-1-text">
                    At TCALL, we believe in the power of collaboration to illuminate brands. Our platform is designed to be a hub where businesses come together to create a radiant presence, ensuring their brands not only shine brightly but also capture the attention of a wider audience. We are committed to fostering a collaborative environment that empowers brands to stand out and be noticed. Join us at TCALL, where brilliance meets collaboration, and let your brand shine like never before.
                </p>
            </div>
            <div>
                <img src="{{ asset('images/new/bg-tcall.png') }}"
                     alt="TCall"
                     class="bg-tcall img-fluid position-relative"
                     style="height: 724px; right: -18%;">
            </div>
        </div>
    </section>
    {{-- End Section 1 --}}

    {{-- Section 2 --}}
    <section class="bg-white d-flex align-items-center justify-content-center h-full container py-5" style="min-height: 80vh;">
        <div class="text-center" data-aos="fade-down">
            <h1 class="fw-semibold section-2-title">
                WHO ARE T-CALL?
            </h1>
            <p class="lh-lg fs-3 mb-5 section-2-paragraph">
                Selecting T-CALL isn't just a choice of a product, but an alliance that values innovation and creativity. We comprehend that each brand possesses its distinctiveness, which is why we offer fully customizable OEM and ODM services tailored to your requirements.
                <br><br>
                Collaborating with T-CALL goes beyond crafting high-quality e-liquids; it's about embarking on a shared journey toward success.
            </p>
        </div>
    </section>
    {{-- End Section 2 --}}

    {{-- Section 3 --}}
    <section class="bg-main h-full overflow-hidden" style="min-height: 80vh;">
        <div class="text-center" data-aos="fade-down">
            <div class="row p-0 m-0 gap-5 gap-lg-0">
                <div class="col-12 col-lg-6 p-0">
                    <img src="{{ asset('images/offer-tcall.png') }}" alt="TCall Offer" class="img-fluid">
                </div>
                <div class="col-12 col-lg-6 pb-5 pb-lg-0 px-lg-5">
                    <div class="d-flex flex-column justify-content-center align-items-start h-full">
                        <h1 class="text-white section-3-title">
                            What We Are <br> Offered?
                        </h1>

                        <p class="text-white font-weight-bold mt-3">OEM:</p>
                        <p class="text-white font-weight-normal">Original Equipment Manufacture</p>

                        <p class="text-white font-weight-bold mt-3">ODM:</p>
                        <p class="text-white font-weight-normal">Original Design Manufacture</p>

                        <p class="text-white font-weight-bold mt-3">Collaboration:</p>
                        <p class="text-white font-weight-normal">Product collaboration with TIGAC</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Section 3 --}}

    {{-- Section 4 --}}
    <section class="bg-white d-flex align-items-center justify-content-center h-full container py-5" style="min-height: 80vh;">
        <div class="text-center text-black" data-aos="fade-down">
            <p class="lh-lg fs-4 mb-5 section-4-paragraph">
                Find the magic with our team. Team T-CALL is not only composed of seasoned individuals in their respective fields but also a collective of experts united to foster enjoyable and productive collaborations. With solid expertise across various domains, this team is determined to open doors to a brighter future, where partnerships are not just a necessity but a journey towards better gains.
            </p>
            <button class="btn btn-lg py-3 border-0 btn-primary px-5" type="button" onclick="window.location.href='{{ route('pages.frontend.about') }}';">
                CONTACT US
            </button>
        </div>
    </section>
    {{-- End Section 4 --}}
@endsection

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W00WZJNH49"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-W00WZJNH49');
    </script>
    <title>{{ 'TIGAC QR Page' }}</title>
    <!-- Favicon -->
    <link rel="icon" href="icon/tigacid.png" type="image/x-icon" />
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <style>
      @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

:root {
    --bgColor: #222d68;
    --bgColor2: #273378;
    --accentColor: #FFF;
    --font: 'Karla', sans-serif;
    --delay: .3s;
}

body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    font-family: var(--font);
    background: radial-gradient(ellipse at bottom, var(--bgColor) 0%, var(--bgColor2) 100%);
    opacity: 0;
    animation: 1s ease-out var(--delay) 1 transitionAnimation;
    animation-fill-mode: forwards;
    background-repeat: no-repeat;
    position: relative;
}

.app {
    background-image: url("{{ asset('images/icon/Ornament.png') }}");
    background-size: cover; /* Adjust as needed */
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1; /* Make sure it's behind other content */
}

#profilePicture, #profilePicture img {
    position: relative;
    width: 266px;
    height: 168px;
    display: block;
    margin: 40px auto 20px;
    border-radius: 50%;
    -webkit-tap-highlight-color: transparent;
}

#userName {
    color: var(--accentColor);
    font-size: 1.6rem;
    font-weight: bold;
    line-height: 1.25;
    display: block;
    font-family: var(--font);
    width: 100%;
    text-align: center;
    text-decoration: none;

}

#links {
    max-width: 675px;
    width: auto;
    display: block;
    margin: 27px auto;
}

.link {
    position: relative;
    background-color: transparent;
    color: var(--accentColor);
    border: solid var(--accentColor) 2px;
    border-radius: 10px;
    font-size: 1rem;
    text-align: center;
    display: block;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
    padding: 10px; /* 17px */
    text-decoration: none;
    /* transition: all .25s cubic-bezier(.08, .59, .29, .99); */
    -webkit-tap-highlight-color: transparent;
}

@media (hover: hover) {
    .link:hover {
        background-color: var(--accentColor);
        color: var(--bgColor);
    }
}

.link:active {
    background-color: var(--accentColor);
    color: var(--bgColor);
}

#hashtag {
    position: relative;
    padding-bottom: 20px;
    color: var(--accentColor);
    font-size: 1rem;
    display: block;
    font-family: var(--font);
    width: 100%;
    text-align: center;

    /*  animation   */
    overflow: hidden;
    background: linear-gradient(90deg, var(--bgColor), var(--accentColor), var(--bgColor));
    background-repeat: no-repeat;
    background-size: 80%;
    animation: animate 3s linear var(--delay) infinite;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: rgba(255, 255, 255, 0);
}


/*-------------------------animations-----------------------*/
@keyframes transitionAnimation {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes animate {
    0% {
      background-position: -500%;
    }
    100% {
      background-position: 500%;
    }
}

@keyframes animStar {
    from {
        transform: translateY(0px);
    }
    to {
        transform: translateY(-2000px);
    }
}


/*-------------------------popup------------------------*/
/* credits: https://www.youtube.com/watch?v=lAS2glU0xlc */
.overlay {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 2;
    visibility: hidden;
    opacity: 0;
    overflow: hidden;
    transition: .5s ease-in-out;
}

.popup {
    position: relative;
    top: -43%;
    /* right: -100vh; */
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 400px;
    /* max-height: 500px; */
    width: auto;
    height: auto;
    margin: 56px;
    background-color: var(--bgColor);
    /* transform: rotate(32deg); */
    transform: scale(0);
    transition: .5s ease-in-out;
}

.popup-quote {
    font-family : Baskerville, Georgia, serif;
    font-style : italic;
    position: flex;
    color: var(--accentColor);
    padding: 20px;
    text-align: center;
    font-size: 1rem;
}

.popup-photo {
    display: flex;
    width: 100%;
    height: 100%;
}

.popup-photo img {
    width: 100%;
    height: 100%;
}

.overlay:target {
    visibility: visible;
    opacity: 1;
}

.overlay:target .popup {
    transform: scale(1);
    top: 0;
    /* right: 0; */
    /* transform: rotate(0); */
}

.popup-close {
    position: absolute;
    right: -1rem;
    top: -1rem;
    width: 3rem;
    height: 3rem;
    font-size: 1.7rem;
    font-weight: 400;
    border-radius: 100%;
    background-color: var(--bgColor);
    z-index: 4;
    color: var(--accentColor);
    line-height: 2.7rem;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
}

@media (hover: hover) {
    .popup-close:hover {
        background-color: var(--accentColor);
        color: var(--bgColor);
    }
}

.popup-close:active {
    background-color: var(--accentColor);
    color: var(--bgColor);
}

#social-icons {
    display: flex;
    justify-content: center; /* Menempatkan ikon di tengah secara horizontal */
    margin-top: 20px; /* Jarak dari elemen di atasnya */
  }
  .social-icon {
    margin: 0 10px; /* Jarak antar ikon */
  }
  .social-icon i {
    font-size: 2em; /* Ukuran ikon */
    color: #ffffff; /* Warna ikon, bisa disesuaikan */
  }
  .social-icon img {
    width: 34px; /* Ukuran ikon */
    height: auto; /* Menjaga aspek rasio gambar */
    display: inline-block; /* Menampilkan gambar dalam blok sebaris */
    vertical-align: middle; /* Menjaga keselarasan vertikal dengan ikon font */
  }
    </style>
  </head>

  <body>
    <div class="app">

    <a id="profilePicture" href="#popup">
      <img src="{{ asset('images/icon/tigacid.png') }}" alt="Profile Picture">
    </a>

    <div id="userName">
    New Vaping Experience for Better Future
    </div>

    <div id="links">
      <a class="link" href="{{ url('https://forms.gle/UsfCHJka6npbca2W8') }}" target="_blank">
        Trade Branding & Trial Support 2024
      </a>
      <a class="link" href="{{ url('https://forms.gle/58pdnmoTqecsBDLj8') }}" target="_blank">
      ExtraC : Extra Cuan, Extra Cincai, Extra Cengli
      </a>
    </div>
<div id="social-icons">
  <a class="social-icon" href="http://wa.me/62811625333?text=Saya%20tertarik%20tentang%20program%20ini%20mohon%20jelaskan%20lebih%20lanjut." target="_blank">
    <img src="{{ asset('images/icon/whatsapp.svg') }}" alt="Tiktok">
  </a>
  <a class="social-icon" href="{{url('https://www.instagram.com/tigactgv/')}}" target="_blank">
    <img src="{{ asset('images/icon/instagram-fill.svg') }}" alt="Tiktok">
  </a>
  <a class="social-icon" href="{{ url('https://www.tokopedia.com/tigacofficial') }}" target="_blank">
    <img src="{{ asset('images/icon/tokopedia.svg') }}" alt="Tokopedia">
  </a>
  {{-- <a class="social-icon" href="" target="_blank">
    <img src="{{ asset('images/icon/shoppe-removebg-preview-removebg-preview.png') }}" alt="Shopee">
  </a> --}}
  <a class="social-icon" href="{{ url('https://www.tiktok.com/@tigactgv') }}" target="_blank">
    <img src="{{ asset('images/icon/tiktok.svg') }}" alt="Tiktok">
  </a>
</div>
</div>

  </body>
</html>

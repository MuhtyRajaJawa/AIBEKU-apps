<header class="navbar">
    <div class="container navbar__container">

        <a href="/" class="navbar__logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Daurin" class="navbar__logo-image">
            <span class="navbar__logo-text">Daurin</span>
        </a>

        <nav class="navbar__menu">

            <ul class="navbar__list">
                <li><a href="#fitur" class="navbar__link">Fitur</a></li>
                <li><a href="#tentang" class="navbar__link">Tentang</a></li>
                <li><a href="#cara-kerja" class="navbar__link">Cara Kerja</a></li>
                <li><a href="#inspirasi" class="navbar__link">Inspirasi</a></li>
                <li><a href="#faq" class="navbar__link">Tanya Jawab</a></li>
            </ul>

            <div id="navbarAuth">
                <a href="{{ route('login') }}" class="navbar__button">
                    Masuk
                </a>
            </div>
        </nav>

        <button class="navbar__toggle" type="button" aria-label="Buka menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</header>
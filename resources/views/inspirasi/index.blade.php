<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inspirasi — AIBEKU</title>

    @vite([
        'resources/css/inspirasi.css',
        'resources/js/inspirasi.js'
    ])

</head>

<body>

    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <nav class="inspiration-navbar">

        <a href="/" class="inspiration-back">
            ← Kembali
        </a>

    </nav>


    <!-- =====================================================
         HERO
    ====================================================== -->

    <header class="inspiration-hero">

        <div class="inspiration-hero__content">

            <span class="inspiration-label">
                INSPIRASI KOMUNITAS
            </span>

            <h1>
                Barang lama,
                <span>ide yang baru.</span>
            </h1>

            <p>
                Temukan berbagai karya kreatif dari barang bekas
                yang berhasil mendapatkan kesempatan kedua.
            </p>

        </div>

    </header>


    <!-- =====================================================
         FILTER
    ====================================================== -->

    <main class="inspiration-main">

        <div class="inspiration-filter">

            <button
                type="button"
                class="filter-button active"
                data-filter="semua"
            >
                Semua
            </button>

            <button
                type="button"
                class="filter-button"
                data-filter="botol-plastik"
            >
                Botol Plastik
            </button>

            <button
                type="button"
                class="filter-button"
                data-filter="kardus"
            >
                Kardus
            </button>

            <button
                type="button"
                class="filter-button"
                data-filter="kain"
            >
                Kain
            </button>

            <button
                type="button"
                class="filter-button"
                data-filter="botol-kaca"
            >
                Botol Kaca
            </button>

            <button
                type="button"
                class="filter-button"
                data-filter="galon-plastik"
            >
                Galon Plastik
            </button>

        </div>


        <!-- =================================================
             GRID INSPIRASI
        ================================================== -->

        <div class="inspiration-grid">


            <!-- =================================================
                 1. BOTOL PLASTIK
            ================================================== -->

            <article
                class="inspiration-card"
                data-category="botol-plastik"
                data-slug="pot-tanaman-gantung"
            >

                <a
                    href="{{ route('inspirasi.show', 'pot-tanaman-gantung') }}"
                    class="inspiration-card__image"
                >

                    <img
                        src="{{ asset('images/inspirasi11.jpg') }}" {{-- SC: Generate AI --}}
                        alt="Pot tanaman dari botol plastik"
                    >

                    <span class="inspiration-card__category">
                        Botol Plastik
                    </span>

                    <span class="inspiration-card__arrow">
                        ↗
                    </span>

                </a>


                <div class="inspiration-card__content">

                    <h2>
                        Pot Tanaman Gantung
                    </h2>

                    <p>
                        Botol plastik bekas disulap menjadi
                        pot tanaman yang sederhana dan menarik.
                    </p>

                    <div class="inspiration-card__author">

                        <span class="author-avatar">
                            R
                        </span>

                        <span>
                            Dibuat oleh <strong>Rina</strong>
                        </span>

                    </div>

                </div>

            </article>


            <!-- =================================================
                 2. KARDUS
            ================================================== -->

            <article
                class="inspiration-card"
                data-category="kardus"
                data-slug="organizer-meja"
            >

                <a
                    href="{{ route('inspirasi.show', 'organizer-meja') }}"
                    class="inspiration-card__image"
                >

                    <img
                        src="{{ asset('images/inspirasi12.jpg') }}" {{-- SC: Generate AI --}}
                        alt="Organizer meja dari kardus"
                    >

                    <span class="inspiration-card__category">
                        Kardus
                    </span>

                    <span class="inspiration-card__arrow">
                        ↗
                    </span>

                </a>


                <div class="inspiration-card__content">

                    <h2>
                        Organizer Meja
                    </h2>

                    <p>
                        Kardus bekas diubah menjadi tempat
                        penyimpanan meja yang praktis.
                    </p>

                    <div class="inspiration-card__author">

                        <span class="author-avatar">
                            D
                        </span>

                        <span>
                            Dibuat oleh <strong>Dimas</strong>
                        </span>

                    </div>

                </div>

            </article>


            <!-- =================================================
                 3. KAIN
            ================================================== -->

            <article
                class="inspiration-card"
                data-category="kain"
                data-slug="tote-bag-kain"
            >

                <a
                    href="{{ route('inspirasi.show', 'tote-bag-kain') }}"
                    class="inspiration-card__image"
                >

                    <img
                        src="{{ asset('images/inspirasi13.jpg') }}" {{-- SC: Generate AI --}}
                        alt="Tote bag dari kain bekas"
                    >

                    <span class="inspiration-card__category">
                        Kain
                    </span>

                    <span class="inspiration-card__arrow">
                        ↗
                    </span>

                </a>


                <div class="inspiration-card__content">

                    <h2>
                        Tote Bag Sederhana
                    </h2>

                    <p>
                        Kain bekas yang tidak terpakai dapat
                        dibuat menjadi tas yang berguna.
                    </p>

                    <div class="inspiration-card__author">

                        <span class="author-avatar">
                            S
                        </span>

                        <span>
                            Dibuat oleh <strong>Sinta</strong>
                        </span>

                    </div>

                </div>

            </article>


            <!-- =================================================
                 4. BOTOL KACA
            ================================================== -->

            <article
                class="inspiration-card"
                data-category="botol-kaca"
                data-slug="lampu-hias-botol"
            >

                <a
                    href="{{ route('inspirasi.show', 'lampu-hias-botol') }}"
                    class="inspiration-card__image"
                >

                    <img
                        src="{{ asset('images/inspirasi14.jpg') }}" {{-- SC: Generate AI --}}
                        alt="Lampu hias dari botol kaca"
                    >

                    <span class="inspiration-card__category">
                        Botol Kaca
                    </span>

                    <span class="inspiration-card__arrow">
                        ↗
                    </span>

                </a>


                <div class="inspiration-card__content">

                    <h2>
                        Lampu Hias Botol
                    </h2>

                    <p>
                        Botol kaca bekas diubah menjadi dekorasi
                        lampu yang unik untuk ruangan.
                    </p>

                    <div class="inspiration-card__author">

                        <span class="author-avatar">
                            A
                        </span>

                        <span>
                            Dibuat oleh <strong>Ardi</strong>
                        </span>

                    </div>

                </div>

            </article>


            <!-- =================================================
                 5. GALON PLASTIK
            ================================================== -->

            <article
                class="inspiration-card"
                data-category="galon-plastik"
                data-slug="kursi-mini-galon"
            >

                <a
                    href="{{ route('inspirasi.show', 'kursi-mini-galon') }}"
                    class="inspiration-card__image"
                >

                    <img
                        src="{{ asset('images/inspirasi15.jpg') }}" {{-- SC: Generate AI --}}
                        alt="Kursi mini dari galon plastik"
                    >

                    <span class="inspiration-card__category">
                        Galon Plastik
                    </span>

                    <span class="inspiration-card__arrow">
                        ↗
                    </span>

                </a>


                <div class="inspiration-card__content">

                    <h2>
                        Kursi Mini Galon
                    </h2>

                    <p>
                        Galon plastik bekas dimanfaatkan menjadi
                        kursi mini yang kreatif dan fungsional.
                    </p>

                    <div class="inspiration-card__author">

                        <span class="author-avatar">
                            F
                        </span>

                        <span>
                            Dibuat oleh <strong>Fajar</strong>
                        </span>

                    </div>

                </div>

            </article>


        </div>


        <!-- =================================================
             EMPTY STATE
        ================================================== -->

        <div
            class="inspiration-empty"
            id="inspirationEmpty"
        >

            <div class="inspiration-empty__icon">
                ✦
            </div>

            <h3>
                Belum ada inspirasi
            </h3>

            <p>
                Belum ada karya untuk kategori ini.
            </p>

        </div>

    </main>


    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="inspiration-cta">

        <div class="inspiration-cta__content">

            <span class="inspiration-label">
                PUNYA BARANG BEKAS?
            </span>

            <h2>
                Mungkin barangmu
                <span>punya cerita baru.</span>
            </h2>

            <p>
                Pindai barang bekasmu dan temukan ide
                upcycling yang bisa kamu buat sendiri.
            </p>

            <a
                href="{{ route('login') }}?redirect=/scan"
                class="inspiration-cta__button"
            >
                Mulai Pindai
                <span>→</span>
            </a>

        </div>

    </section>


</body>

</html>
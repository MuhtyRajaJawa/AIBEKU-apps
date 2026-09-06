@extends('layouts.app')

@section('content')

<x-navbar />

<main>

<section class="hero" id="fitur">

    <div class="container hero__container">

        <!-- ==========================
             HERO KIRI
        =========================== -->

        <div class="hero__left">

            <span class="hero__badge">

                ✨ Didukung Teknologi Kecerdasan Buatan

            </span>

            <h1 class="hero__title">

                Ubah Barang Bekas
                <br>
                <span>Menjadi Karya Bernilai.</span>

            </h1>

            <p class="hero__description">

                AIBEKU membantu mengenali material barang bekas menggunakan AI,
                kemudian memberikan inspirasi upcycling yang mudah diikuti agar
                barang yang dianggap sampah dapat dimanfaatkan kembali.

            </p>

            <div class="hero__button">

                <a href="#" id="scanButton" class="button button--primary">

                    Mulai Pindai

                </a>

                <a href="{{ route('inspirasi') }}" class="button button--secondary">

                    Lihat Inspirasi

                </a>

            </div>

            <div class="hero__statistic">

                <div class="stat">

                    <h3 class="counter" data-target="98" data-suffix="%">0%</h3>

                    <p>Akurasi AI</p>

                </div>

                <div class="stat">

                    <h3 class="counter" data-target="12400" data-suffix="+">0</h3>

                    <p>Ide Upcycling</p>

                </div>

                <div class="stat">

                    <h3 class="counter" data-target="2.1" data-suffix=" Ton">0</h3>

                    <p>CO₂ Berkurang</p>

                </div>

            </div>

        </div>

        <!-- ==========================
             HERO KANAN
        =========================== -->

        <div class="hero__right">

            <div class="workspace">

                <div class="workspace__header">

                    <div>

                        <h4>Analisis Material</h4>

                        <span>● AI Aktif</span>

                    </div>

                </div>

                <div class="workspace__camera">

                    <div class="camera">

                        <div class="camera__corner camera__corner--tl"></div>
                        <div class="camera__corner camera__corner--tr"></div>
                        <div class="camera__corner camera__corner--bl"></div>
                        <div class="camera__corner camera__corner--br"></div>

                        <img
                            src="{{ asset('images/botol.png') }}"
                            alt="Botol Plastik"
                            class="camera__object"
                        >

                        <span class="camera__scan"></span>

                    </div>

                </div>


                <div class="workspace__material">

                    <div class="material">

                        <small>Material</small>

                        <strong>Botol Plastik</strong>

                    </div>

                    <div class="material">

                        <small>Kategori</small>

                        <strong>Plastik</strong>

                    </div>

                </div>

                <div class="workspace__info">

                    <div class="info-card">

                        <small>Estimasi</small>

                        <strong>20 Menit</strong>

                    </div>

                    <div class="info-card">

                        <small>Akurasi</small>

                        <strong>98%</strong>

                    </div>

                </div>

                <div class="workspace__footer">

                    Botol plastik ini dapat diubah menjadi
                    <strong>pot tanaman</strong>,
                    <strong>tempat pensil</strong>,
                    <strong>lampu hias</strong>,
                    <strong>tempat sabun</strong>,
                    dan berbagai kerajinan kreatif lainnya.

                </div>

            </div>

        </div>

    </div>

</section>

<section class="problem reveal" id="tentang">

    <div class="container">

        <div class="problem-wrapper">

            <div class="problem-image">

                <img
                    src="{{ asset('images/sampah.jpg') }}" {{-- SC: Generate AI --}}
                    alt="Permasalahan Sampah"
                >

                <div class="problem-overlay">

                    <span>AIBEKU</span>

                    <h3>

                        Barang Bekas Masih Memiliki
                        Kesempatan Kedua.

                    </h3>

                </div>

            </div>

            <div class="problem-content">

                <span class="section-badge">

                    Mengapa AIBEKU Hadir?

                </span>

                <h2>

                    Barang Bekas Masih Memiliki Nilai yang Sangat Besar

                </h2>

                <p>

                    Setiap hari jutaan barang bekas berakhir menjadi sampah,
                    padahal sebagian besar masih dapat dimanfaatkan kembali.
                    Dengan bantuan AI, AIBEKU membantu menemukan potensi terbaik
                    agar setiap barang memiliki kehidupan kedua.

                </p>

                <div class="problem-list">

                    <div class="problem-item">

                        <h3>68%</h3>

                        <span>

                            Barang Masih Layak Digunakan

                        </span>

                    </div>

                    <div class="problem-item">

                        <h3>12 Juta+</h3>

                        <span>

                            Ton Sampah Plastik Setiap Tahun

                        </span>

                    </div>

                    <div class="problem-item">

                        <h3>95%</h3>

                        <span>

                            Berpotensi Di-Upcycle

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="workflow reveal" id="cara-kerja">

    <div class="container">

        <div class="workflow-header">

            <span class="section-badge">
                Cara Kerja AI
            </span>

            <h2>
                Hanya Empat Langkah Sederhana
            </h2>

            <p>
                AIBEKU memanfaatkan Artificial Intelligence untuk mengenali material,
                memberikan rekomendasi upcycling, dan membantu pengguna mengubah barang
                bekas menjadi produk yang lebih bernilai.
            </p>

        </div>

        <div class="workflow-grid">

            <div class="workflow-card">

                <div class="workflow-icon">
                    <img src="{{ asset('images/icon-camera.png') }}" alt="">
                </div>

                <span class="workflow-number">01</span>

                <h3>Ambil Foto</h3>

                <p>
                    Ambil gambar barang bekas menggunakan kamera.
                </p>

            </div>

            <div class="workflow-card">

                <div class="workflow-icon">
                    <img src="{{ asset('images/icon-ai.png') }}" alt="">
                </div>

                <span class="workflow-number">02</span>

                <h3>AI Menganalisis</h3>

                <p>
                    AI mengenali material dan kondisi barang.
                </p>

            </div>

            <div class="workflow-card">

                <div class="workflow-icon">
                    <img src="{{ asset('images/icon-idea.png') }}" alt="">
                </div>

                <span class="workflow-number">03</span>

                <h3>Ide Upcycling</h3>

                <p>
                    AI memberikan rekomendasi ide terbaik.
                </p>

            </div>

            <div class="workflow-card">

                <div class="workflow-icon">
                    <img src="{{ asset('images/icon-finish.png') }}" alt="">
                </div>

                <span class="workflow-number">04</span>

                <h3>Mulai Berkarya</h3>

                <p>
                    Ikuti tutorial dan ubah menjadi produk baru.
                </p>

            </div>

        </div>

    </div>

</section>

<section class="inspiration reveal" id="inspirasi">

    <div class="container">

        <div class="inspiration-header">

            <span class="faq-label">
                Inspirasi Upcycling
            </span>

            <h2>
                Ubah Barang Bekas Menjadi
                Karya yang Lebih Bernilai
            </h2>

            <p>
                AI AIBEKU memberikan berbagai rekomendasi ide kreatif berdasarkan
                material yang berhasil dikenali sehingga barang bekas dapat dimanfaatkan
                kembali dengan cara yang lebih bermanfaat.
            </p>

        </div>

<div class="inspiration-slider">

    <div class="inspiration-track">

        <!-- ========================= -->
        <!-- GRID 1 -->
        <!-- ========================= -->

        <div class="inspiration-grid">

            <div class="inspiration-card">

                <img src="{{ asset('images/inspirasi1.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                <div class="inspiration-overlay">
                    <span>Botol Plastik</span>
                    <h3>Pot Tanaman Minimalis</h3>
                </div>

            </div>

            <div class="inspiration-card">

                <img src="{{ asset('images/inspirasi2.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                <div class="inspiration-overlay">
                    <span>Botol Kaca</span>
                    <h3>Lampu Hias Modern</h3>
                </div>

            </div>

            <div class="inspiration-card">

                <img src="{{ asset('images/inspirasi3.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                <div class="inspiration-overlay">
                    <span>Kardus</span>
                    <h3>Organizer Meja</h3>
                </div>

            </div>

            <div class="inspiration-card">

                <img src="{{ asset('images/inspirasi4.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                <div class="inspiration-overlay">
                    <span>Kaleng Bekas</span>
                    <h3>Rak Mini</h3>
                </div>

            </div>

            <div class="inspiration-card card-large">

                <img src="{{ asset('images/inspirasi5.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                <div class="inspiration-overlay">
                    <span>Botol Plastik</span>
                    <h3>Tempat Pensil</h3>
                </div>

            </div>

        </div>

<!-- ========================= -->
<!-- GRID 2 -->
<!-- ========================= -->

<div class="inspiration-grid inspiration-grid-second">

    <!-- Pot Gantung (Besar) -->
    <div class="inspiration-card card-large pot-gantung">

        <img src="{{ asset('images/inspirasi7.jpg') }}" alt="Pot Gantung"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Botol Plastik</span>
            <h3>Pot Gantung</h3>
        </div>

    </div>

    <!-- Vas Bunga -->
    <div class="inspiration-card vas-bunga">

        <img src="{{ asset('images/inspirasi6.jpg') }}" alt="Vas Bunga"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Botol Kaca</span>
            <h3>Vas Bunga</h3>
        </div>

    </div>

    <!-- Tempat Sendok -->
    <div class="inspiration-card tempat-sendok">

        <img src="{{ asset('images/inspirasi8.jpg') }}" alt="Tempat Sendok"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kaleng Bekas</span>
            <h3>Tempat Sendok</h3>
        </div>

    </div>

    <!-- Keranjang -->
    <div class="inspiration-card keranjang">

        <img src="{{ asset('images/inspirasi9.jpg') }}" alt="Keranjang Penyimpanan"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kardus</span>
            <h3>Keranjang Penyimpanan</h3>
        </div>

    </div>

    <!-- Tas -->
    <div class="inspiration-card tas">

        <img src="{{ asset('images/inspirasi10.jpg') }}" alt="Tas Belanja"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kain Bekas</span>
            <h3>Tas Belanja</h3>
        </div>

    </div>

</div>

        <!-- ========================= -->
        <!-- DUPLIKAT GRID 1 -->
        <!-- ========================= -->

        <div class="inspiration-grid">

            <div class="inspiration-card">
                <img src="{{ asset('images/inspirasi1.jpg') }}"> {{-- SC: Generate AI --}}
                <div class="inspiration-overlay">
                    <span>Botol Plastik</span>
                    <h3>Pot Tanaman Minimalis</h3>
                </div>
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('images/inspirasi2.jpg') }}"> {{-- SC: Generate AI --}}
                <div class="inspiration-overlay">
                    <span>Botol Kaca</span>
                    <h3>Lampu Hias Modern</h3>
                </div>
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('images/inspirasi3.jpg') }}"> {{-- SC: Generate AI --}}
                <div class="inspiration-overlay">
                    <span>Kardus</span>
                    <h3>Organizer Meja</h3>
                </div>
            </div>

            <div class="inspiration-card">
                <img src="{{ asset('images/inspirasi4.jpg') }}">{{-- SC: Generate AI --}}
                <div class="inspiration-overlay">
                    <span>Kaleng Bekas</span>
                    <h3>Rak Mini</h3>
                </div>
            </div>

            <div class="inspiration-card card-large">
                <img src="{{ asset('images/inspirasi5.jpg') }}"> {{-- SC: Generate AI --}}
                <div class="inspiration-overlay">
                    <span>Botol Plastik</span>
                    <h3>Tempat Pensil</h3>
                </div>
            </div>

        </div>

<!-- ========================= -->
<!-- DUPLIKAT GRID 2 -->
<!-- ========================= -->

<div class="inspiration-grid inspiration-grid-second">

    <!-- Pot Gantung (Besar) -->
    <div class="inspiration-card card-large pot-gantung">

        <img src="{{ asset('images/inspirasi7.jpg') }}" alt="Pot Gantung"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Botol Plastik</span>
            <h3>Pot Gantung</h3>
        </div>

    </div>

    <!-- Vas Bunga -->
    <div class="inspiration-card vas-bunga">

        <img src="{{ asset('images/inspirasi6.jpg') }}" alt="Vas Bunga"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Botol Kaca</span>
            <h3>Vas Bunga</h3>
        </div>

    </div>

    <!-- Tempat Sendok -->
    <div class="inspiration-card tempat-sendok">

        <img src="{{ asset('images/inspirasi8.jpg') }}" alt="Tempat Sendok"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kaleng Bekas</span>
            <h3>Tempat Sendok</h3>
        </div>

    </div>

    <!-- Keranjang -->
    <div class="inspiration-card keranjang">

        <img src="{{ asset('images/inspirasi9.jpg') }}" alt="Keranjang Penyimpanan"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kardus</span>
            <h3>Keranjang Penyimpanan</h3>
        </div>

    </div>

    <!-- Tas -->
    <div class="inspiration-card tas">

        <img src="{{ asset('images/inspirasi10.jpg') }}" alt="Tas Belanja"> {{-- SC: Generate AI --}}

        <div class="inspiration-overlay">
            <span>Kain Bekas</span>
            <h3>Tas Belanja</h3>
        </div>

    </div>

</div>

</section>

<section class="testimonial reveal">

    <div class="container">

        <div class="testimonial-header">

            <span class="faq-label">
                Testimoni Pengguna
            </span>

            <h2>
                Apa Kata Pengguna AIBEKU?
            </h2>

            <p>
                Ribuan pengguna telah mencoba AIBEKU untuk menemukan ide kreatif
                dalam memanfaatkan kembali barang bekas menjadi karya yang bernilai.
            </p>

        </div>

        <div class="testimonial-grid">

            <div class="testimonial-card">

                <div class="testimonial-user">

                    <img src="{{ asset('images/user1.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                    <div>

                        <h4>Andi Pratama</h4>

                        <span>Mahasiswa</span>

                    </div>

                </div>

                <p>

                    "Awalnya botol plastik hanya saya buang begitu saja.
                    Setelah mencoba AIBEKU, ternyata bisa dijadikan pot tanaman
                    yang estetik. Sangat membantu!"

                </p>

            </div>

            <div class="testimonial-card">

                <div class="testimonial-user">

                    <img src="{{ asset('images/user2.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                    <div>

                        <h4>Siti Rahma</h4>

                        <span>Ibu Rumah Tangga</span>

                    </div>

                </div>

                <p>

                    "Rekomendasi AI sangat mudah dipahami.
                    Sekarang kardus bekas di rumah bisa menjadi organizer meja
                    yang bermanfaat."

                </p>

            </div>

            <div class="testimonial-card">

                <div class="testimonial-user">

                    <img src="{{ asset('images/user3.jpg') }}" alt=""> {{-- SC: Generate AI --}}

                    <div>

                        <h4>Budi Santoso</h4>

                        <span>Pengrajin</span>

                    </div>

                </div>

                <p>

                    "Desain yang diberikan AI cukup kreatif dan mudah dibuat.
                    Sangat cocok untuk mencari inspirasi upcycling."

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ==========================================================
     FAQ
========================================================== -->

<section class="faq" id="faq">

    <div class="faq-container">

        <!-- HEADER -->
        <div class="faq-header">

            <span class="faq-label">
                FAQ
            </span>

            <h2>
                Pertanyaan yang
                <br>
                Sering Ditanyakan
            </h2>

            <p>
                Temukan jawaban seputar AIBEKU, teknologi AI,
                dan cara memanfaatkan barang bekas.
            </p>

        </div>


        <!-- FAQ LIST -->
        <div class="faq-list">

            <!-- FAQ 1 -->
            <div class="faq-item">

                <button
                    type="button"
                    class="faq-question"
                    aria-expanded="false"
                >

                    <span class="faq-question-text">
                        Apa itu AIBEKU?
                    </span>

                    <span class="faq-icon">
                        <span class="faq-icon-line line-horizontal"></span>
                        <span class="faq-icon-line line-vertical"></span>
                    </span>

                </button>

                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        <p>
                            AIBEKU merupakan platform berbasis
                            Artificial Intelligence yang membantu
                            masyarakat mengenali material barang
                            bekas dan memberikan rekomendasi ide
                            upcycling secara cepat dan mudah.
                        </p>

                    </div>

                </div>

            </div>


            <!-- FAQ 2 -->
            <div class="faq-item">

                <button
                    type="button"
                    class="faq-question"
                    aria-expanded="false"
                >

                    <span class="faq-question-text">
                        Bagaimana AI mengenali barang bekas?
                    </span>

                    <span class="faq-icon">
                        <span class="faq-icon-line line-horizontal"></span>
                        <span class="faq-icon-line line-vertical"></span>
                    </span>

                </button>

                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        <p>
                            AI AIBEKU menganalisis gambar barang
                            yang kamu pindai untuk mengenali objek,
                            material, kategori, dan kondisinya.
                            Setelah itu, AI memberikan rekomendasi
                            upcycling yang sesuai.
                        </p>

                    </div>

                </div>

            </div>


            <!-- FAQ 3 -->
            <div class="faq-item">

                <button
                    type="button"
                    class="faq-question"
                    aria-expanded="false"
                >

                    <span class="faq-question-text">
                        Apakah saya harus membuat akun?
                    </span>

                    <span class="faq-icon">
                        <span class="faq-icon-line line-horizontal"></span>
                        <span class="faq-icon-line line-vertical"></span>
                    </span>

                </button>

                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        <p>
                            Iya, Kamu dapat menjelajahi informasi dan
                            fitur AIBEKU harus membuat akun Terlbih Dahulu.
                            beberapa fitur tertentu dapat
                            membutuhkan akun agar data dan aktivitasmu
                            dapat tersimpan.
                        </p>

                    </div>

                </div>

            </div>


            <!-- FAQ 4 -->
            <div class="faq-item">

                <button
                    type="button"
                    class="faq-question"
                    aria-expanded="false"
                >

                    <span class="faq-question-text">
                        Apakah rekomendasi AI bisa langsung diikuti?
                    </span>

                    <span class="faq-icon">
                        <span class="faq-icon-line line-horizontal"></span>
                        <span class="faq-icon-line line-vertical"></span>
                    </span>

                </button>

                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        <p>
                            Bisa. Setiap rekomendasi dilengkapi
                            tingkat kesulitan, estimasi waktu,
                            alat yang dibutuhkan, serta langkah
                            pembuatan agar lebih mudah untuk diikuti.
                        </p>

                    </div>

                </div>

            </div>


            <!-- FAQ 5 -->
            <div class="faq-item">

                <button
                    type="button"
                    class="faq-question"
                    aria-expanded="false"
                >

                    <span class="faq-question-text">
                        Apakah AIBEKU gratis digunakan?
                    </span>

                    <span class="faq-icon">
                        <span class="faq-icon-line line-horizontal"></span>
                        <span class="faq-icon-line line-vertical"></span>
                    </span>

                </button>

                <div class="faq-answer">

                    <div class="faq-answer-inner">

                        <p>
                            AIBEKU dirancang untuk membantu pengguna
                            mendapatkan inspirasi dan panduan
                            upcycling dengan cara yang mudah dan
                            praktis.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<footer class="footer">

    <div class="container">

        <div class="footer-grid">

            <div class="footer-brand">

                <div class="footer-logo">

                    <img src="{{ asset('images/logo.png') }}" alt="AIBEKU">

                    <h3>AIBEKU</h3>

                </div>

                <p>
                    Ubah barang bekas menjadi karya bernilai melalui teknologi
                    Artificial Intelligence yang memberikan inspirasi upcycling
                    secara cepat dan mudah.
                </p>

            </div>

            <div class="footer-column">

                <h4>Navigasi</h4>

                <a href="#fitur">Fitur</a>
                <a href="#tentang">Tentang</a>
                <a href="#cara-kerja">Cara Kerja</a>
                <a href="#inspirasi">Inspirasi</a>
                <a href="#faq">Tanya Jawab</a>

            </div>

            <div class="footer-column">

                <h4>Fitur</h4>

                <a href="#">AI Scanner</a>
                <a href="#">Inspirasi Upcycling</a>
                <a href="#">Rekomendasi AI</a>

            </div>

            <div class="footer-column">

                <h4>Kontak</h4>

                <a href="#">support@AIBEKU.id</a>
                <a href="#">Instagram</a>
                <a href="#">GitHub</a>

            </div>

        </div>

        <div class="footer-bottom">

            <p>
                © 2026 AIBEKU. Semua hak cipta dilindungi.
            </p>

        </div>

    </div>

</footer>
@extends('layouts.scan')

@section('title', 'AI Scanner - Daurin')

@section('content')

<section class="scan-page">

    <div class="container">

        <!-- ========================================= -->
        <!-- HEADER -->
        <!-- ========================================= -->

        <header class="scan-header">

            <a href="{{ route('landing') }}" class="back-button">

                <i data-lucide="arrow-left"></i>

                <span>Kembali</span>

            </a>

            <div class="scan-header__content">

                <div>

                    <span class="scan-label">

                        <i data-lucide="sparkles"></i>

                        AI Creative Assistant

                    </span>

                    <h1>

                        Pindai Barang Bekas

                    </h1>

                    <p>

                        Arahkan kamera ke barang bekas yang ingin kamu ubah
                        menjadi sesuatu yang lebih bermanfaat.

                        AI Daurin akan membantu menganalisis material,
                        memahami kondisi barang, kemudian memberikan ide
                        upcycling beserta panduan pembuatannya.

                    </p>

                </div>

            </div>

        </header>

        <!-- ========================================= -->
        <!-- MAIN LAYOUT -->
        <!-- ========================================= -->

        <div class="scan-layout">

            <div class="scan-left">

            <!-- ========================================= -->
            <!-- CAMERA -->
            <!-- ========================================= -->

            <section class="camera-section">

                <div class="camera-card">

                    <div class="camera-preview">

                        <video
                            id="cameraVideo"
                            autoplay
                            playsinline
                            muted>
                        </video>

                        <canvas
                            id="cameraCanvas">
                        </canvas>

                        <div
                            id="cameraPlaceholder"
                            class="camera-placeholder">

                            <div class="camera-placeholder-icon">

                                <i data-lucide="camera"></i>

                            </div>

                            <h3>

                                Kamera Belum Aktif

                            </h3>

                            <p>

                                Tekan tombol di bawah
                                untuk mulai memindai barang.

                            </p>

                        </div>

                    </div>

                    <div class="camera-footer">

                        <div class="camera-status">

                            <span class="status-dot"></span>

                            <span id="cameraStatusText">

                                Kamera belum aktif

                            </span>

                        </div>

                        <div class="camera-action">

                            <button id="cameraButton">

                                <i data-lucide="camera"></i>

                                Aktifkan Kamera

                            </button>

                        </div>

                    </div>

                </div>

            </section>

            </div>

            <!-- ========================================= -->
            <!-- AI PANEL -->
            <!-- ========================================= -->

            <aside class="ai-section">

                <div class="ai-card">

                    <!-- Header -->
                    <div class="ai-header">

                        <div class="ai-avatar">
                            <i data-lucide="brain-circuit"></i>
                        </div>

                        <div>

                            <h3>
                                AI Daurin
                            </h3>

                            <p>
                                AI Creative Assistant
                                untuk Upcycling
                            </p>

                        </div>

                    </div>

                    <!-- Status -->
                    <div class="ai-status-box">

                        <span
                            id="aiStatusBadge"
                            class="badge waiting">

                            Menunggu Kamera

                        </span>

                    </div>

                    <!-- ========================================= -->
                    <!-- INTRO -->
                    <!-- ========================================= -->

                    <div
                        id="introState"
                        class="intro-state">

                        <div class="intro-icon">

                            <i data-lucide="sparkles"></i>

                        </div>

                        <h4>
                            Selamat Datang di Daurin
                        </h4>

                        <p>
                            Saya siap membantu menemukan
                            ide upcycling terbaik.
                        </p>

                        <div class="intro-list">

                            <div class="intro-item">

                                <i data-lucide="package"></i>

                                <span>Mengenali barang</span>

                            </div>

                            <div class="intro-item">

                                <i data-lucide="flask-conical"></i>

                                <span>Mengidentifikasi material</span>

                            </div>

                            <div class="intro-item">

                                <i data-lucide="lightbulb"></i>

                                <span>Memberikan ide kreatif</span>

                            </div>

                            <div class="intro-item">

                                <i data-lucide="book-open"></i>

                                <span>Menyusun panduan pembuatan</span>

                            </div>

                        </div>

                    </div>

                    <!-- ========================================= -->
                    <!-- LOADING STATE -->
                    <!-- ========================================= -->

                    <div
                        id="loadingState"
                        class="loading-state"
                        style="display:none;">

                        <div class="loading-spinner"></div>

                        <h4>
                            AI Sedang Menganalisis...
                        </h4>

                        <p>
                            Mohon tunggu sebentar,
                            AI sedang memahami barang yang kamu pindai.
                        </p>

                        <div class="loading-steps">

                            <div class="loading-step">

                                <i data-lucide="package"></i>

                                Mengenali barang

                            </div>

                            <div class="loading-step">

                                <i data-lucide="flask-conical"></i>

                                Mengidentifikasi material

                            </div>

                            <div class="loading-step">

                                <i data-lucide="recycle"></i>

                                Menentukan kategori

                            </div>

                            <div class="loading-step">

                                <span>💡</span>

                                Menyiapkan ide upcycling

                            </div>

                        </div>

                    </div>

                    <!-- ========================================= -->
                    <!-- RESULT STATE -->
                    <!-- ========================================= -->

                    <div
                        id="resultState"
                        class="result-state"
                        style="display:none;">

                        <div class="result-header">

                            <div class="section-title">

                                <i data-lucide="clipboard-check"></i>

                                <span>Hasil Analisis</span>

                            </div>

                            <p>
                                Berikut hasil analisis AI Daurin.
                            </p>

                        </div>

                        <div class="analysis-grid">

                            <div class="analysis-item">

                                <span>

                                    <i data-lucide="package"></i>

                                    Barang

                                </span>

                                <strong id="objectResult">
                                    -
                                </strong>

                            </div>

                            <div class="analysis-item">

                                <span>

                                    <i data-lucide="flask-conical"></i>

                                    Material

                                </span>

                                <strong id="materialResult">
                                    -
                                </strong>

                            </div>

                            <div class="analysis-item">

                                <span>

                                    <i data-lucide="recycle"></i>

                                    Kategori

                                </span>

                                <strong id="categoryResult">
                                    -
                                </strong>

                            </div>

                            <div class="analysis-item">

                                <span>

                                    <i data-lucide="badge-check"></i>

                                    Kondisi

                                </span>

                                <strong id="conditionResult">
                                    -
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </aside>

        <!-- ========================================= -->
        <!-- IDE UPCYCLING -->
        <!-- ========================================= -->

        <section class="idea-section" style="display:none;">

            <div class="section-title">

                <i data-lucide="lightbulb"></i>

                <span>Ide Upcycling</span>

            </div>

            <div
                id="recommendationList"
                class="recommendation-grid">

                <!-- Card akan dibuat oleh scan.js -->

            </div>

        </section>


        <!-- ========================================= -->
        <!-- DETAIL IDEA -->
        <!-- ========================================= -->

        <div
            id="detailState"
            class="detail-state"
            style="display:none;">

            <button
                id="backToIdeas"
                class="back-detail">

                <i data-lucide="arrow-left"></i>

                <span>Kembali</span>

            </button>

            <div class="detail-header">

                <h3 id="detailTitle">-</h3>

                <div
                    id="detailDifficulty"
                    class="difficulty-badge">

                    -

                </div>

            </div>

            <div class="detail-row">

                <i data-lucide="clock-3"></i>

                <span>Estimasi :</span>

                <strong id="detailTime">-</strong>

            </div>

            <div class="detail-block">

                <h4>

                    <i data-lucide="hammer"></i>

                    Alat & Bahan

                </h4>

                <ul id="detailTools"></ul>

            </div>

            <div class="detail-block">

                <h4>

                    <i data-lucide="book-open"></i>

                    Langkah Pembuatan

                </h4>

                <ol id="detailSteps"></ol>

            </div>

        </div>


        <!-- ========================================= -->
        <!-- CHAT SECTION -->
        <!-- ========================================= -->

        <section class="chat-section">

            <div class="chat-header">

                <div class="chat-icon">

                    <i data-lucide="messages-square"></i>

                </div>

                <div>

                    <h4>
                        Tanya AI Daurin
                    </h4>

                    <p>
                        Tanyakan apa saja mengenai ide upcycling ini.
                    </p>

                </div>

            </div>

            <div
                id="chatMessages"
                class="chat-messages">

                <div class="chat-bubble ai">

                    👋 Halo!

                    <br><br>

                    Saya adalah <strong>AI Daurin</strong>.

                    Setelah proses analisis selesai,
                    saya akan membantu menjelaskan ide
                    upcycling, alat yang dibutuhkan,
                    langkah pembuatan, hingga tips
                    pengerjaannya.

                </div>

            </div>

            <div class="chat-input">

                <input
                    type="text"
                    id="chatInput"
                    placeholder="Contoh: Bagaimana cara membuatnya?"
                >

                <button id="sendChat">

                    <i data-lucide="send-horizontal"></i>

                </button>

            </div>

        </section>

        </div>

    </section>

@endsection
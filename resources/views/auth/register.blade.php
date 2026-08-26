<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar | Daurin</title>

    @vite([
        'resources/css/app.css',
        'resources/css/auth.css',
        'resources/js/auth.js'
    ])

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="auth auth--register">

    {{-- Background --}}
    <div class="auth__background"
        style="background-image:url('{{ asset('images/background1.png') }}')">
    </div>

    <div class="auth__overlay"></div>

    {{-- Register Card --}}
    <main class="auth__container">

        <div class="auth__card">

            {{-- Image --}}
            <div class="auth__image">

                <img
                    src="{{ asset('images/fotologin.png') }}"
                    alt="Register Illustration">

            </div>

            {{-- Form --}}
            <div class="auth__content">

                <a href="/" class="auth__back">
                    ← Kembali ke Beranda
                </a>

                <div class="auth__header">

                    <h1>
                        Buat Akun
                    </h1>

                    <p>
                        Daftar untuk mulai mengubah barang bekas menjadi karya
                        bernilai bersama AI Daurin.
                    </p>

                </div>

                <form id="registerForm" class="auth__form">

                    <div class="auth__group">

                        <label>Nama Lengkap</label>

                        <input
                            id="name"
                            type="text"
                            placeholder="Masukkan nama lengkap"
                            required>

                    </div>

                    <div class="auth__group">

                        <label>Email</label>

                    <input
                        id="email"
                        type="email"
                        placeholder="Masukkan email"
                        required>

                    </div>

                    <div class="auth__group">

                        <label>Password</label>

                        <div class="auth__password">

                        <input
                            id="password"
                            type="password"
                            placeholder="Masukkan password"
                            required>

                            <button
                                type="button"
                                class="toggle-password">

                                <i class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                    </div>

                    <div class="auth__group">

                        <label>Konfirmasi Password</label>

                        <div class="auth__password">

                        <input
                            id="confirmPassword"
                            type="password"
                            placeholder="Ulangi password"
                            required>

                            <button
                                type="button"
                                class="toggle-password">

                                <i class="fa-regular fa-eye"></i>

                            </button>

                        </div>

                    </div>

                    <button
                        type="submit"
                        class="auth__button">

                        Daftar

                    </button>

                </form>

                <div class="auth__footer">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Masuk
                    </a>

                </div>

            </div>

        </div>

    </main>

</body>

</html>
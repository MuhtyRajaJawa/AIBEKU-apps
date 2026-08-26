<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Masuk | Daurin</title>

    @vite([
        'resources/css/app.css',
        'resources/css/auth.css',
        'resources/js/auth.js'
    ])
</head>

<body class="auth auth--login">

    {{-- Background --}}
    <div class="auth__background"
     style="background-image:url('{{ asset('images/background1.png') }}')">
</div>
    <div class="auth__overlay"></div>

    {{-- Login Card --}}
    <main class="auth__container">

        <div class="auth__card">

            {{-- Image --}}
            <div class="auth__image">

                <img
                    src="{{ asset('images/fotologin.png') }}"
                    alt="Login Illustration">

            </div>

            {{-- Form --}}
            <div class="auth__content">

                <a href="/" class="auth__back">
                    ← Kembali ke Beranda
                </a>

                <div class="auth__header">

                    <h1>
                        Selamat Datang
                    </h1>

                    <p>
                        Masuk untuk mulai mengubah barang bekas menjadi karya bernilai bersama AI Daurin.
                    </p>

                </div>

                <form id="loginForm" class="auth__form">

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

                    <button
                        type="submit"
                        class="auth__button">

                        Masuk

                    </button>

                </form>

                <div class="auth__footer">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar Sekarang
                    </a>

                </div>

            </div>

        </div>

    </main>

</body>

</html>
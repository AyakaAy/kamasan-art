<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Masuk Pengelola Studio — {{ $site['brand'] ?? 'MADE KAMASAN' }}</title>

    <!-- Google Fonts: Cormorant Garamond & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/auth/login.css'])
</head>
<body>
    <main class="admin-login-wrapper">
        <!-- Panel Kiri: Latar Karya Wayang Kamasan (Sutasoma) -->
       <section class="admin-visual-pane">
            <img
                src="{{ asset('assets/images/products/sutasoma.jpg') }}"
                alt="Karya Wayang Kamasan Sutasoma"
                class="admin-visual-bg">
            <div class="admin-visual-overlay"></div>
                    

            <div class="admin-visual-top">
                <span class="brand-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"></circle>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    {{ $site['brand'] ?? 'MADE KAMASAN' }}
                </span>

                <a href="{{ url('/') }}" class="back-public-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Galeri Publik
                </a>
            </div>

            <div class="admin-visual-bottom">
                <p class="visual-kicker">Studio Seni Lukis Made Kamasan</p>
                <h1 class="visual-heading">Penjaga Warisan Narasi Klasik</h1>
                <p class="visual-desc">
                    {{ $site['tagline'] ?? 'Preserving the Heritage of Kamasan Painting' }}. 
                    Ruang kendali kurasi karya, pengelolaan ketersediaan stok, serta verifikasi pemesanan studio.
                </p>

                <div class="studio-meta-bar">
                    <span>{{ $site['address'] ?? 'Jl. Pande Mas, Klungkung, Bali' }}</span>
                    <span>•</span>
                    <span>Otoritas Pengelola Tunggal</span>
                </div>
            </div>
        </section>

        <!-- Panel Kanan: Form Otentikasi -->
        <section class="admin-form-pane">
            <div class="form-container">
                <p class="form-eyebrow">Autentikasi Pengelola</p>
                <h2 class="form-title">Masuk ke Konsol Studio</h2>
                <p class="form-subtitle">
                    Silakan masukkan kredensial administrator resmi untuk mengelola katalog dan status pesanan.
                </p>

                <form method="POST" action="{{ route('admin.login.post') }}" novalidate>
                    @csrf

                    <!-- Input Email -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label for="email" class="form-label">Email Pengelola</label>
                            <span class="form-required-tag">Wajib diisi</span>
                        </div>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control-ka"
                                placeholder="admin@gmail.com"
                                required
                                autofocus
                                autocomplete="email"
                            >
                        </div>
                            @if ($errors->has('email'))
                                <span class="error-message" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                    </div>

                    <!-- Input Password -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <span class="form-required-tag">Wajib diisi</span>
                        </div>
                        <div class="input-wrapper">
                            <span class="input-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control-ka"
                                placeholder="••••••••••••"
                                required
                                autocomplete="current-password"
                            >
                            <button
                                type="button"
                                class="toggle-password-btn"
                                id="togglePassword"
                                aria-label="Tampilkan atau sembunyikan kata sandi"
                            >
                                <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                       @if ($errors->has('password'))
                            <span class="error-message" role="alert">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Ingat Sesi -->
                    <label class="remember-row">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Ingat sesi masuk pada perangkat ini</span>
                    </label>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn-submit-ka">
                        <span>Buka Konsol Studio</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                            <polyline points="10 17 15 12 10 7"/>
                            <line x1="15" y1="12" x2="3" y2="12"/>
                        </svg>
                    </button>
                </form>

                <div class="security-notice-box">
                    <strong>Kebijakan Akses Terbatas:</strong> Halaman ini dikhususkan bagi pengelola resmi Studio Made Kamasan. Pendaftaran akun publik dinonaktifkan untuk menjaga keamanan data inventaris dan pesanan.
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                });
            }
        });
    </script>
</body>
</html>
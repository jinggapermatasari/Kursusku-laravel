<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteName }} | Kursus Digital</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="navbar">
    <div class="container nav-content">
        <a href="#beranda" class="logo">Kursus<span>Ku.</span></a>

        <nav>
            <a href="#beranda">Beranda</a>
            <a href="#kursus">Kursus</a>
            <a href="#tentang">Tentang</a>
        </nav>

        <a href="#kursus" class="btn btn-small">Lihat Kursus</a>
    </div>
</header>

<main>
    <section class="hero" id="beranda">
        <div class="container hero-content">
            <div class="hero-text">
                <span class="eyebrow">PLATFORM BELAJAR DIGITAL</span>

                <h1>Mulai Belajar,<br>
                    Bangun <span>Masa Depan.</span>
                </h1>

                <p>{{ $tagline }}. Pelajari keterampilan digital
                    melalui program kursus yang mudah dipahami.</p>

                <div class="hero-actions">
                    <a href="#kursus" class="btn">Jelajahi Kursus</a>
                    <a href="#tentang" class="btn btn-outline">
                        Tentang Kami
                    </a>
                </div>

                <div class="hero-stats">
                    <div>
                        <strong>{{ count($featured) }}</strong>
                        <span>Program Kursus</span>
                    </div>
                    <div>
                        <strong>Online</strong>
                        <span>Belajar Fleksibel</span>
                    </div>
                </div>
            </div>

            <div class="hero-card">
                <div class="hero-card-top">
                    <span class="circle-icon">✦</span>
                    <span class="status-label">Belajar Sekarang</span>
                </div>

                <div class="hero-illustration">
                    <div class="screen">
                        <div class="screen-bar"></div>
                        <div class="screen-line long"></div>
                        <div class="screen-line"></div>
                        <div class="screen-code">
                            &lt; Learn Digital /&gt;
                        </div>
                    </div>
                </div>

                <h3>Upgrade Skill Digitalmu</h3>
                <p>Belajar satu langkah lebih maju setiap hari.</p>

                <div class="progress-info">
                    <span>Semangat belajar</span>
                    <strong>100%</strong>
                </div>
                <div class="progress-bar"><span></span></div>
            </div>
        </div>
    </section>

    <section class="courses section" id="kursus">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">PILIHAN PROGRAM</span>
                <h2>Kursus Unggulan</h2>
                <p>Pilih kursus yang sesuai dengan kebutuhan belajarmu.</p>
            </div>

            <div class="course-grid">
                @foreach ($featured as $course)
                    <article class="course-card">
                        <div class="course-icon">
                            @if ($course['code'] === 'WEB-01')
                                &lt;/&gt;
                            @elseif ($course['code'] === 'PHP-01')
                                PHP
                            @else
                                L
                            @endif
                        </div>

                        <span class="course-code">{{ $course['code'] }}</span>
                        <h3>{{ $course['name'] }}</h3>
                        <p>{{ $course['description'] }}</p>

                        <div class="course-detail">
                            <span>Biaya kursus</span>
                            <strong>Rp {{ number_format($course['fee'], 0, ',', '.') }}</strong>
                        </div>

                        <div class="course-detail">
                            <span>Sisa kursi</span>
                            <strong>
                                {{ max(0, $course['quota'] - $course['registered']) }}
                                kursi
                            </strong>
                        </div>

                        @if ($course['registered'] >= $course['quota'])
                            <span class="course-status full">Penuh</span>
                        @else
                            <span class="course-status available">Tersedia</span>
                        @endif

                        <a href="#tentang" class="course-link">
                            Pelajari Program <span>→</span>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="about section" id="tentang">
        <div class="container about-content">
            <div>
                <span class="eyebrow">TENTANG KURSUSKU</span>
                <h2>Belajar Digital Jadi Lebih Terarah</h2>
            </div>

            <p>
                KursusKu merupakan contoh website informasi kursus digital
                yang dibangun menggunakan Laravel. Website ini menampilkan
                daftar program, biaya kursus, kuota peserta, dan sisa kursi.
            </p>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container footer-content">
        <a href="#beranda" class="logo footer-logo">Kursus<span>Ku.</span></a>
        <p>© {{ date('Y') }} KursusKu. Proyek pembelajaran Laravel.</p>
    </div>
</footer>

</body>
</html>
@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')

<section class="hero" id="beranda">
    <div class="container hero-content">
        <div class="hero-text">
            <span class="eyebrow">Ruang belajar untuk masa depan</span>        <h1>
            Upgrade dirimu,<br>
            rancang <span>masa depanmu.</span>
        </h1>

        <p>
            Tingkatkan kemampuan digitalmu melalui kursus yang praktis,
            fleksibel, dan menyenangkan. Mulai dari langkah kecil,
            tumbuh menjadi lebih hebat.
        </p>

        <div class="hero-actions">
            <a href="#kursus" class="btn">
                Mulai Belajar ↗
            </a>

            <a href="#tentang" class="btn btn-outline">
                Jelajahi Kursus
            </a>
        </div>

        <div class="hero-stats">
            <div>
                <strong>{{ count($featured) }}+</strong>
                <span>Pilihan program</span>
            </div>

            <div>
                <strong>100%</strong>
                <span>Belajar fleksibel</span>
            </div>

            <div>
                <strong>Online</strong>
                <span>Belajar dari mana saja</span>
            </div>
        </div>
    </div>

    <div class="hero-card">
        <div class="hero-card-top">
            <span class="circle-icon">✦</span>
            <span class="status-label">Your learning era</span>
        </div>

        <div class="hero-illustration">
            <div class="screen">
                <div class="screen-bar"></div>
                <div class="screen-line long"></div>
                <div class="screen-line"></div>
                <div class="screen-code">&lt; learn / grow / repeat &gt;</div>
            </div>
        </div>

        <span class="eyebrow">Your daily reminder</span>
        <h3>Make your own magic.</h3>

        <p>
            Pelan-pelan tidak apa-apa. Yang penting terus bertumbuh.
        </p>

        <div class="progress-info">
            <span>Progress perjalananmu</span>
            <strong>01 / 03</strong>
        </div>

        <div class="progress-bar">
            <span></span>
        </div>
    </div>
</div>

</section><section class="section courses" id="kursus">
    <div class="container">
        <div class="section-heading">
            <span class="eyebrow">Find your next skill</span>        <h2>
            Kecil langkahnya,<br>
            besar perkembangannya.
        </h2>

        <p>
            Pilih program yang kamu suka dan mulai bangun
            kemampuan digitalmu dari sekarang.
        </p>
    </div>

    <div class="course-grid">
        @forelse ($featured as $course)
            <article class="course-card">
                <div class="course-icon">
                    @if (($course['code'] ?? '') === 'WEB-01')
                        &lt;/&gt;
                    @elseif (($course['code'] ?? '') === 'PHP-01')
                        PHP
                    @else
                        ✦
                    @endif
                </div>

                <span class="course-code">
                    {{ $course['code'] ?? 'KURSUS' }}
                </span>

                <h3>{{ $course['name'] }}</h3>

                <p>{{ $course['description'] }}</p>

                <div class="course-detail">
                    <span>Biaya kursus</span>

                    <strong>
                        Rp {{ number_format($course['fee'], 0, ',', '.') }}
                    </strong>
                </div>

                <div class="course-detail">
                    <span>Sisa kursi</span>

                    <strong>
                        {{ max(0, $course['quota'] - $course['registered']) }}
                        kursi
                    </strong>
                </div>

                @if ($course['registered'] >= $course['quota'])
                    <span class="course-status full">
                        Kelas penuh
                    </span>

                    <span class="course-link" aria-disabled="true">
                        Kuota habis
                    </span>
                @else
                    <span class="course-status available">
                        Pendaftaran tersedia
                    </span>

                    <a
                        href="{{ route('enrollments.create') }}"
                        class="course-link"
                    >
                        Ikut kelas ini <span>↗</span>
                    </a>
                @endif
            </article>
        @empty
            <p>Belum ada kursus yang tersedia.</p>
        @endforelse
    </div>
</div>

</section><section class="about section" id="tentang">
    <div class="container about-content">
        <div>
            <span class="eyebrow">A little about us</span>        <h2>
            Belajar bukan soal cepat. Tapi terus bertumbuh.
        </h2>
    </div>

    <p>
        KursusKu adalah platform informasi kursus digital yang membantu
        kamu mengenal program belajar, biaya, kuota, dan ketersediaan
        kelas. Mulai dari satu keterampilan hari ini, lalu lanjutkan
        langkah berikutnya esok hari.
    </p>
</div>

</section>
@endsection
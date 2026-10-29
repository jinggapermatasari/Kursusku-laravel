<nav class="navbar navbar-expand-lg navbar-dark kursusku-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="brand-mark">K</span>
            <span>
                KursusKu
                <small class="brand-caption">PREMIUM LEARNING</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}"
                       href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn-premium"
                       href="{{ route('enrollments.create') }}">
                        Mulai Belajar ↗
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
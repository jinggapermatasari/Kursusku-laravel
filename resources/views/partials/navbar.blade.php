<nav class="navbar navbar-expand-lg navbar-dark kursusku-navbar">
    <div class="container">

        <!-- LOGO KURSUSKU -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="brand-mark">K</span>
            <span>
                KursusKu
                <small class="brand-caption">PREMIUM LEARNING</small>
            </span>
        </a>

        <!-- TOMBOL MENU RESPONSIVE -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- DAFTAR MENU -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#kursus">
                        Kursus
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#tentang">
                        Tentang
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#keunggulan">
                        Keunggulan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}"
                       href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>

                <!-- MULAI BELAJAR -->
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn-premium"
                       href="{{ route('belajar') }}">
                        Mulai Belajar ↗
                    </a>
                </li>

                <!-- LOGIN / PROFIL -->
                @guest
                    <li class="nav-item mt-2 mt-lg-0">
                        <a class="btn-login"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @else
                    <li class="nav-item mt-2 mt-lg-0">
                        <a class="btn-login"
                           href="{{ route('profile') }}">
                            Profil
                        </a>
                    </li>

                    <li class="nav-item mt-2 mt-lg-0">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-logout">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

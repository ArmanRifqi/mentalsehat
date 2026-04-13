<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: rgba(37, 99, 235, 0.95);">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <span class="d-inline-block me-2" style="font-size: 1.15rem;">🧠</span>
            <span style="font-weight: 700; letter-spacing: 0.02em;">Mental Sehat</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">📊 Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('patients.*') ? 'active' : '' }}" href="{{ route('patients.index') }}">👥 Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tests.*') ? 'active' : '' }}" href="{{ route('tests.index') }}">📝 Tes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('conditions.*') ? 'active' : '' }}" href="{{ route('conditions.index') }}">🔍 Kondisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('results.*') ? 'active' : '' }}" href="{{ route('results.index') }}">📈 Hasil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        👤 {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

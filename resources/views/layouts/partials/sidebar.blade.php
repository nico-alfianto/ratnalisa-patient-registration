<div id="sidebar">
    <div class="sidebar-wrapper active">

        <div class="sidebar-header position-relative">

            <div class="d-flex justify-content-between align-items-center">

                <div class="logo">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('assets/img/ratnalisa-logo-full.png') }}" alt="Logo Ratnalisa" width="200">
                    </a>
                </div>

                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>

            </div>

        </div>

        <div class="sidebar-menu">

            <ul class="menu">

                <li class="sidebar-title">
                    Menu Utama
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('pasien.index') }}" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Data Pasien</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('dokter.index') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Data Dokter</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('layanan.index') }}" class="sidebar-link">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <span>Data Layanan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('jadwal-layanan.index') }}" class="sidebar-link">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Jadwal Layanan</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-clipboard2-pulse"></i>
                        <span>Data Pemeriksaan</span>
                    </a>

                    <ul class="submenu">

                        <li class="submenu-item">
                            <a href="{{ route('pemeriksaan.pending') }}">
                                Menunggu Pembayaran
                            </a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('pemeriksaan.selesai') }}">
                                Selesai
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('invoice.index') }}" class="sidebar-link">
                        <i class="bi bi-receipt"></i>
                        <span>Data Invoice</span>
                    </a>
                </li>


                <li class="sidebar-title">
                    Master Data
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-gear-wide"></i>
                        <span>Kategori</span>
                    </a>

                    <ul class="submenu">

                        <li class="submenu-item">
                            <a href="{{ route('spesialis.index') }}">
                                Spesialis
                            </a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('agama.index') }}">
                                Agama
                            </a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('pendidikan.index') }}">
                                Pendidikan
                            </a>
                        </li>

                        <li class="submenu-item">
                            <a href="{{ route('pekerjaan.index') }}">
                                Pekerjaan
                            </a>
                        </li>

                    </ul>
                </li>

                <br>

                <form action="{{ route('logout') }}" method="POST" class="sidebar-item">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
                </li>

            </ul>

        </div>

    </div>
</div>

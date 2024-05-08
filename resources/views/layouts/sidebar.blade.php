<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('absensi') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Absensi
                        </a>
                    </li>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                        Data Akademik
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('siswa') }}">Siswa</a>
                            <a class="nav-link" href="{{ url('guru') }}">guru</a>
                            <a class="nav-link" href="{{ url('nilai') }}">Nilai</a>
                        </nav>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('mata_pelajaran') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Mata Pelajaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('kelas') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Kelas
                        </a>
                    </li>

                    <a class="nav-link" href="{{ url('jadwal') }}">
                        Jadwal Pelajaran
                    </a>

                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
</div>

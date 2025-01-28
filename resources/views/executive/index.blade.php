<x-app>
    <div class="page">
        <!-- Navbar -->
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Summary
                            </div>
                            <h2 class="page-title">
                                Dashboard {{ $main }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="page-pretitle">
                                Updated 16 JANUARI 2025
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">


                        {{-- card gawe info --}}

                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="text-muted text-uppercase small fw-bold">JUMLAH TERNAK</div>
                                        <div class="dropdown">
                                            <a class="text-muted" href="#" data-bs-toggle="dropdown">Last 7
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div style="background-color: #FFF5F0; padding: 8px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="#FF8C42" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-horse">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M7 10l-.85 8.507a1.357 1.357 0 0 0 1.35 1.493h.146a2 2 0 0 0 1.857 -1.257l.994 -2.486a2 2 0 0 1 1.857 -1.257h1.292a2 2 0 0 1 1.857 1.257l.994 2.486a2 2 0 0 0 1.857 1.257h.146a1.37 1.37 0 0 0 1.364 -1.494l-.864 -9.506h-8c0 -3 -3 -5 -6 -5l-3 6l2 2l3 -2z" />
                                                <path d="M22 14v-2a3 3 0 0 0 -3 -3" />
                                            </svg>
                                        </div>
                                        <div class="h1 m-0 ms-3 d-flex align-items-center">
                                            249
                                            <div class="ms-2 text-success d-flex align-items-center"
                                                style="font-size: 15px;">
                                                7%
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="16"
                                                    height="16" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center border-top pt-3">
                                        <a href="#" class="text-muted text-decoration-none small">Lebih
                                            lengkap</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="ms-auto">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="text-muted text-uppercase small fw-bold">KEBERSIHAN KANDANG</div>
                                        <div class="dropdown">
                                            <a class="text-muted" href="#" data-bs-toggle="dropdown">Last 7
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div style="background-color: #F0F0FF; padding: 8px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="#6C63FF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                <path d="M7 8h10" />
                                                <path d="M7 12h10" />
                                                <path d="M7 16h10" />
                                            </svg>
                                        </div>
                                        <div class="h1 m-0 ms-3 d-flex align-items-center">
                                            90%
                                            <div class="ms-2 text-success d-flex align-items-center"
                                                style="font-size: 15px;">
                                                8%
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="16" height="16" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center border-top pt-3">
                                        <a href="#" class="text-muted text-decoration-none small">Lebih
                                            lengkap</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="ms-auto">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="text-muted text-uppercase small fw-bold">PENGELUARAN PAKAN</div>
                                        <div class="dropdown">
                                            <a class="text-muted" href="#" data-bs-toggle="dropdown">Last 30
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Last 7 days</a>
                                                <a class="dropdown-item active" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modifikasi bagian angka -->
                                    <div class="d-flex align-items-center">
                                        <div style="background-color: #F0FFF0; padding: 8px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="#4CAF50" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                <path d="M12 3v3m0 12v3" />
                                            </svg>
                                        </div>
                                        <!-- Tambahkan class text-nowrap dan ubah style font-size -->
                                        <div class="h1 m-0 ms-3 d-flex align-items-center text-nowrap"
                                            style="font-size: 1.5rem;">
                                            Rp. 13.235.992
                                            <div class="ms-2 text-yellow d-flex align-items-center"
                                                style="font-size: 15px;">
                                                0%
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="16" height="16" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <line x1="5" y1="12" x2="19"
                                                        y2="12" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center border-top pt-3">
                                        <a href="#" class="text-muted text-decoration-none small">Lebih
                                            lengkap</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="ms-auto">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="text-muted text-uppercase small fw-bold">JUMLAH INVESTOR</div>
                                        <div class="dropdown">
                                            <a class="text-muted" href="#" data-bs-toggle="dropdown">Last 7
                                                days</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item active" href="#">Last 7 days</a>
                                                <a class="dropdown-item" href="#">Last 30 days</a>
                                                <a class="dropdown-item" href="#">Last 3 months</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div style="background-color: #FFF0F5; padding: 8px; border-radius: 8px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="#FF69B4" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                        </div>
                                        <div class="h1 m-0 ms-3 d-flex align-items-center">
                                            329
                                            <div class="ms-2 text-success d-flex align-items-center"
                                                style="font-size: 15px;">
                                                4%
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="16" height="16" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-flex align-items-center border-top pt-3">
                                        <a href="#" class="text-muted text-decoration-none small">Lebih
                                            lengkap</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="ms-auto">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="9 6 15 12 9 18" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end card e --}}
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Statistik Ternak</h3>
                                    <div id="chart-ternak" class="chart-lg"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-6">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="mb-3">Kesehatan Domba <strong>180 Sakit </strong>dari 912</p>
                                            <div class="progress progress-separated mb-3">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 44%" aria-label="Regular"></div>
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 19%" aria-label="System"></div>
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 9%" aria-label="Shared"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto d-flex align-items-center pe-2">
                                                    <span class="legend me-2 bg-primary"></span>
                                                    <span>Regular</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-info"></span>
                                                    <span>System</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center px-2">
                                                    <span class="legend me-2 bg-success"></span>
                                                    <span>Shared</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                                                </div>
                                                <div class="col-auto d-flex align-items-center ps-2">
                                                    <span class="legend me-2"></span>
                                                    <span>Free</span>
                                                    <span
                                                        class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card" style="height: 28rem">
                                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                            <div class="divide-y">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar">JL</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Jeffie Lewzey</strong> commented on your
                                                                <strong>"I'm not a witch."</strong> post.
                                                            </div>
                                                            <div class="text-muted">yesterday</div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            <div class="badge bg-primary"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/002m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                It's <strong>Mallory Hulme</strong>'s birthday. Wish him
                                                                well!
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            <div class="badge bg-primary"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/003m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Dunn Slane</strong> posted <strong>"Well, what
                                                                    do you want?"</strong>.
                                                            </div>
                                                            <div class="text-muted">today</div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            <div class="badge bg-primary"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/000f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Emmy Levet</strong> created a new project
                                                                <strong>Morning alarm clock</strong>.
                                                            </div>
                                                            <div class="text-muted">4 days ago</div>
                                                        </div>
                                                        <div class="col-auto align-self-center">
                                                            <div class="badge bg-primary"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/001f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Maryjo Lebarree</strong> liked your photo.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar">EP</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Egan Poetz</strong> registered new client as
                                                                <strong>Trilia</strong>.
                                                            </div>
                                                            <div class="text-muted">yesterday</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/002f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Kellie Skingley</strong> closed a new deal on
                                                                project <strong>Pen Pineapple Apple Pen</strong>.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/003f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Christabel Charlwood</strong> created a new
                                                                project for <strong>Wikibox</strong>.
                                                            </div>
                                                            <div class="text-muted">4 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar">HS</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Haskel Shelper</strong> change status of
                                                                <strong>Tabler Icons</strong> from <strong>open</strong>
                                                                to <strong>closed</strong>.
                                                            </div>
                                                            <div class="text-muted">today</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/006m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Lorry Mion</strong> liked <strong>Tabler UI
                                                                    Kit</strong>.
                                                            </div>
                                                            <div class="text-muted">yesterday</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/004f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Leesa Beaty</strong> posted new video.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/007m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Perren Keemar</strong> and 3 others followed
                                                                you.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar">SA</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Sunny Airey</strong> upload 3 new photos to
                                                                category <strong>Inspirations</strong>.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/009m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Geoffry Flaunders</strong> made a
                                                                <strong>$10</strong> donation.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/010m.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Thatcher Keel</strong> created a profile.
                                                            </div>
                                                            <div class="text-muted">3 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/005f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Dyann Escala</strong> hosted the event
                                                                <strong>Tabler UI Birthday</strong>.
                                                            </div>
                                                            <div class="text-muted">4 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar"
                                                                style="background-image: url(./static/avatars/006f.jpg)"></span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Avivah Mugleston</strong> mentioned you on
                                                                <strong>Best of 2020</strong>.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <span class="avatar">AA</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-truncate">
                                                                <strong>Arlie Armstead</strong> sent a Review Request to
                                                                <strong>Amanda Blake</strong>.
                                                            </div>
                                                            <div class="text-muted">2 days ago</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="card-title">User Terbaru</div>
                                </div>
                                <div class="card-table table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Username</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($userAnyar as $user)
                                                <tr>
                                                    <td class="w-1">
                                                        <span class="avatar avatar-sm"
                                                            style="background-image: url({{ asset('static/avatars/AVATAR_SAPI.png') }})"></span>
                                                    </td>
                                                    <td class="td-truncate">
                                                        <div class="text-truncate">
                                                            {{ $user->username }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap text-muted">
                                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada user terbaru.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card card-md">
                                <div class="card-stamp card-stamp-lg">
                                    <div class="card-stamp-icon bg-primary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                            <line x1="10" y1="10" x2="10.01" y2="10" />
                                            <line x1="14" y1="10" x2="14.01" y2="10" />
                                            <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                        </svg>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Riwayat Investasi</h3>
                                </div>
                                <div class="card-body border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="text-muted">
                                            Show
                                            <div class="mx-2 d-inline-block">
                                                <input type="text" class="form-control form-control-sm"
                                                    value="8" size="3" aria-label="Invoices count">
                                            </div>
                                            entries
                                        </div>
                                        <div class="ms-auto text-muted">
                                            Search:
                                            <div class="ms-2 d-inline-block">
                                                <input type="text" class="form-control form-control-sm"
                                                    aria-label="Search invoice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                        type="checkbox" aria-label="Select all invoices"></th>
                                                <th class="w-1">No.
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-sm icon-thick" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>Nama Investor</th>
                                                <th>Asal</th>
                                                <th>Jeis Investasi</th>
                                                <th>Created</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001401</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Muhammad Satrio Nugroho</a></td>
                                                <td>
                                 
                                                    Kota Blitar
                                                </td>
                                                <td>
                                                    Tipe A
                                                </td>
                                                <td>
                                                    15 Dec 2017
                                                </td>
                                                <td>
                                                    <span class="badge bg-success me-1"></span> Paid
                                                </td>
                                                <td>750.000.000</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001402</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">UX
                                                        Wireframes</a></td>
                                                <td>
                                                    <span class="flag flag-country-gb"></span>
                                                    Adobe
                                                </td>
                                                <td>
                                                    87956421
                                                </td>
                                                <td>
                                                    12 Apr 2017
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning me-1"></span> Pending
                                                </td>
                                                <td>$1200</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001403</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">New
                                                        Dashboard</a></td>
                                                <td>
                                                    <span class="flag flag-country-de"></span>
                                                    Bluewolf
                                                </td>
                                                <td>
                                                    87952621
                                                </td>
                                                <td>
                                                    23 Oct 2017
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning me-1"></span> Pending
                                                </td>
                                                <td>$534</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001404</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing
                                                        Page</a></td>
                                                <td>
                                                    <span class="flag flag-country-br"></span>
                                                    Salesforce
                                                </td>
                                                <td>
                                                    87953421
                                                </td>
                                                <td>
                                                    2 Sep 2017
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                                                </td>
                                                <td>$1500</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001405</span></td>
                                                <td><a href="invoice.html" class="text-reset"
                                                        tabindex="-1">Marketing Templates</a></td>
                                                <td>
                                                    <span class="flag flag-country-pl"></span>
                                                    Printic
                                                </td>
                                                <td>
                                                    87956621
                                                </td>
                                                <td>
                                                    29 Jan 2018
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger me-1"></span> Paid Today
                                                </td>
                                                <td>$648</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001406</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales
                                                        Presentation</a></td>
                                                <td>
                                                    <span class="flag flag-country-br"></span>
                                                    Tabdaq
                                                </td>
                                                <td>
                                                    87956621
                                                </td>
                                                <td>
                                                    4 Feb 2018
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                                                </td>
                                                <td>$300</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001407</span></td>
                                                <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo &
                                                        Print</a></td>
                                                <td>
                                                    <span class="flag flag-country-us"></span>
                                                    Apple
                                                </td>
                                                <td>
                                                    87956621
                                                </td>
                                                <td>
                                                    22 Mar 2018
                                                </td>
                                                <td>
                                                    <span class="badge bg-success me-1"></span> Paid Today
                                                </td>
                                                <td>$2500</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                        aria-label="Select invoice"></td>
                                                <td><span class="text-muted">001408</span></td>
                                                <td><a href="invoice.html" class="text-reset"
                                                        tabindex="-1">Icons</a></td>
                                                <td>
                                                    <span class="flag flag-country-pl"></span>
                                                    Tookapic
                                                </td>
                                                <td>
                                                    87956621
                                                </td>
                                                <td>
                                                    13 May 2018
                                                </td>
                                                <td>
                                                    <span class="badge bg-success me-1"></span> Paid Today
                                                </td>
                                                <td>$940</td>
                                                <td class="text-end">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-boundary="viewport"
                                                            data-bs-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">
                                                                Action
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                Another action
                                                            </a>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of
                                        <span>16</span> entries
                                    </p>
                                    <ul class="pagination m-0 ms-auto">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="15 6 9 12 15 18" />
                                                </svg>
                                                prev
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                next
                                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="9 6 15 12 9 18" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <x-footer />
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-muted">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1"
                                    class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-muted">Insert charts and additional advanced
                                            analyses to be inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            chart: {
                type: "bar",
                height: 240,
                stacked: true,
                toolbar: {
                    show: false
                },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                },
            },
            colors: ['#066fd1', '#388cda', '#79baf5', '#ee9445', '#ffc6a2'],
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Dewasa',
                data: [8, 9, 8, 10, 8, 10, 10, 8, 10, 12, 15, 20, 15, 20, 35, 15, 15, 15, 40, 35,
                    55, 60, 65, 65, 70, 90, 55
                ]
            }, {
                name: 'Anakan',
                data: [2, 8, 2, 5, 3, 5, 5, 2, 5, 8, 10, 12, 5, 5, 10, 5, 3, 3, 5, 10, 10, 5, 8, 8,
                    5, 5, 3
                ]
            }, {
                name: 'Terjual',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2, 2,
                    0
                ]
            }, {
                name: 'Sakit',
                data: [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 5, 5, 2, 2, 3, 2, 2, 2, 8, 2, 2, 5, 5, 5, 5, 2,
                    2
                ]
            }, {
                name: 'Mati',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0,
                    0
                ]
            }],
            xaxis: {
                categories: ['24 Jun', '', '', '', '', '', '', '01 Jul', '', '', '', '', '', '', '08 Jul',
                    '', '', '',
                    '16 Jul', '', '', '', '', '', '24 Jul', '', ''
                ],
                labels: {
                    style: {
                        fontSize: '12px'
                    },
                    rotate: 0
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                max: 100,
                tickAmount: 4,
                labels: {
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return value
                    }
                }
            },
            legend: {
                position: 'bottom',
                offsetY: 0
            },
            grid: {
                borderColor: '#f0f0f0',
                strokeDashArray: 4,
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.getElementById('chart-ternak'), options);
        chart.render();
    });
</script>

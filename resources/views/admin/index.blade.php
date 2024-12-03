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
                                Overview
                            </div>
                            <h2 class="page-title">
                               {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="#" class="btn">
                                        New view
                                    </a>
                                </span>
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-report">
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
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-report" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Sales</div>
                                        <div class="ms-auto lh-1">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Last 7 days</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h1 mb-3">75%</div>
                                    <div class="d-flex mb-2">
                                        <div>Conversion rate</div>
                                        <div class="ms-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="75% Complete">
                                            <span class="visually-hidden">75% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Revenue</div>
                                        <div class="ms-auto lh-1">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Last 7 days</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-0 me-2">$4,300</div>
                                        <div class="me-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="chart-revenue-bg" class="chart-sm"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">New clients</div>
                                        <div class="ms-auto lh-1">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Last 7 days</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-3 me-2">6,782</div>
                                        <div class="me-auto">
                                            <span class="text-yellow d-inline-flex align-items-center lh-1">
                                                0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <line x1="5" y1="12" x2="19"
                                                        y2="12" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="chart-new-clients" class="chart-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Active users</div>
                                        <div class="ms-auto lh-1">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle text-muted" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Last 7 days</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="h1 mb-3 me-2">2,986</div>
                                        <div class="me-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="3 17 9 11 13 15 21 7" />
                                                    <polyline points="14 7 21 7 21 14" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="chart-active-users" class="chart-sm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                            <path d="M12 3v3m0 12v3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        132 Sales
                                                    </div>
                                                    <div class="text-muted">
                                                        12 waiting payments
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <circle cx="6" cy="19" r="2" />
                                                            <circle cx="17" cy="19" r="2" />
                                                            <path d="M17 17h-11v-14h-2" />
                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        78 Orders
                                                    </div>
                                                    <div class="text-muted">
                                                        32 shipped
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        623 Shares
                                                    </div>
                                                    <div class="text-muted">
                                                        16 today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span
                                                        class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        132 Likes
                                                    </div>
                                                    <div class="text-muted">
                                                        21 today
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Domba Tracker</h3>
                                    <div id="chart-mentions" class="chart-lg"></div>
                                </div>
                            </div>
                        </div>
         
                        <div class="col-lg-6">
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
                        </div>
                        <div class="col-lg-6">
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
                                                <td colspan="4" class="text-center">Tidak ada user terbaru.</td>
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
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <h3 class="h1">Tabler Icons</h3>
                                            <div class="markdown text-muted">
                                                All icons come from the Tabler Icons set and are MIT-licensed. Visit
                                                <a href="https://tabler-icons.io" target="_blank"
                                                    rel="noopener">tabler-icons.io</a>,
                                                download any of the 2925 icons in SVG, PNG or&nbsp;React and use them in
                                                your favourite design tools.
                                            </div>
                                            <div class="mt-3">
                                                <a href="https://tabler-icons.io" class="btn btn-primary"
                                                    target="_blank" rel="noopener">Download icons</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tasks</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter">
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task" checked>
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Extend the data model.</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                August 04, 2021
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    2/7
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    3</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm"
                                                    style="background-image: url({{ asset('static/avatars/AVATAR_SAPI.png') }})"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task">
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Verify the event flow.</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                January 03, 2019
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    3/10
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    6</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm">JL</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task">
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Database backup and
                                                    maintenance</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16" rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                December 28, 2018
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    0/6
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    1</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm"
                                                    style="background-image: url(./static/avatars/002m.jpg)"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task" checked>
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Identify the implementation
                                                    team.</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16"
                                                        rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                November 07, 2020
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    6/10
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    12</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm"
                                                    style="background-image: url(./static/avatars/003m.jpg)"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task">
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Define users and workflow</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16"
                                                        rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                November 23, 2021
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    3/7
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    5</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm"
                                                    style="background-image: url(./static/avatars/000f.jpg)"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-1 pe-0">
                                                <input type="checkbox" class="form-check-input m-0 align-middle"
                                                    aria-label="Select task" checked>
                                            </td>
                                            <td class="w-100">
                                                <a href="#" class="text-reset">Check Pull Requests</a>
                                            </td>
                                            <td class="text-nowrap text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="4" y="5" width="16" height="16"
                                                        rx="2" />
                                                    <line x1="16" y1="3" x2="16"
                                                        y2="7" />
                                                    <line x1="8" y1="3" x2="8"
                                                        y2="7" />
                                                    <line x1="4" y1="11" x2="20"
                                                        y2="11" />
                                                    <line x1="11" y1="15" x2="12"
                                                        y2="15" />
                                                    <line x1="12" y1="15" x2="12"
                                                        y2="18" />
                                                </svg>
                                                January 14, 2021
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    2/9
                                                </a>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="#" class="text-muted">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/message -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                                                        <line x1="8" y1="9" x2="16"
                                                            y2="9" />
                                                        <line x1="8" y1="13" x2="14"
                                                            y2="13" />
                                                    </svg>
                                                    3</a>
                                            </td>
                                            <td>
                                                <span class="avatar avatar-sm"
                                                    style="background-image: url(./static/avatars/001f.jpg)"></span>
                                            </td>
                                        </tr>
                                    </table>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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

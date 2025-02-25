<x-app>
<body>
    <div class="page">

        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                Overview Ternak
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#detail-ternak" class="nav-link active"
                                                data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                </svg>
                                                Detail Ternak</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#riwayat-timbang" class="nav-link"
                                                data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                </svg>
                                                Riwayat Timbang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#riwayat-kondisi" class="nav-link"
                                                data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                                </svg>
                                                Riwayat Kondisi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#kambing" class="nav-link"
                                                data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                                </svg>
                                                Kambing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#mitra" class="nav-link"
                                                data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                                </svg>
                                                Mitra</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="detail-ternak">
                                            @include('executive.ternak.tabs.detail')
                                        </div>
                                        <div class="tab-pane" id="riwayat-timbang">
                                            @include('executive.ternak.tabs.timbang')
                                        </div>
                                        <div class="tab-pane" id="riwayat-kondisi">
                                            @include('executive.ternak.tabs.kondisi')
                                        </div>
                                        <div class="tab-pane" id="kambing">
                                            @include('executive.ternak.tabs.kambing')
                                        </div>
                                        <div class="tab-pane" id="mitra">
                                            @include('executive.ternak.tabs.mitra')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                   
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app>
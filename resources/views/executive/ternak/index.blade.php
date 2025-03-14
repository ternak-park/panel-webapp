<x-app>
    <div class="page">
        <!-- Navbar would be here -->
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
                    <!-- Tabs navigation -->
                    <div class="d-flex mb-3">
                        <div class="nav nav-tabs nav-tabs-pills" data-bs-toggle="tabs">
                            <a href="#detail-ternak" class="nav-link active" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l3 3l8 -8" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                                Detail Ternak
                            </a>
                            <a href="#riwayat-timbang" class="nav-link" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 6l3 -3l3 3" /><path d="M3 6v13h18v-2" /><path d="M13 9l2 -2l2 2" /><path d="M9 13l-2 2l-2 -2" /><path d="M9 21v-8l-6 -8h-2" /><path d="M9 13h2" /><path d="M15 21v-8l6 -8h2" /><path d="M15 13h-2" /></svg>
                                Riwayat Timbang
                            </a>
                            <a href="#riwayat-kondisi" class="nav-link" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>
                                Riwayat Kondisi
                            </a>
                            <a href="#kambing" class="nav-link" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="16" cy="16" r="3" /><circle cx="13" cy="7.5" r="2" /><circle cx="7" cy="10.5" r="3.5" /></svg>
                                Kambing
                            </a>
                            <a href="#mitra" class="nav-link" data-bs-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                Mitra
                            </a>
                        </div>
                    </div>
                    
                    <!-- Tabs content -->
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
</x-app>
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
                                    Dashboard
                                </div>
                                <h2 class="page-title">
                                    Pakan
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
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="col">
                                                <h2>Data Pakan</h2>
                                                <div class="filter-section">
                                                    <label>Dari Tanggal:</label>
                                                    <select> <option>15</option></select>
                                                    <select> <option>Desember</option></select>
                                                    <select> <option>2024</option></select>

                                                    <label>Sampai Tanggal:</label>
                                                    <select> <option>15</option></select>
                                                    <select> <option>Januari</option></select>
                                                    <select> <option>2025</option></select>

                                                    <button class="btn btn-primary">Lihat Data</button>
                                                    <button class="btn btn-secondary">Cetak</button>
                                                </div>
                                                <div class="data-table mt-4">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Fattening</th>
                                                                <th>Breeding</th>
                                                                <th>Hamil dan Menyusui</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Jumlah Ternak</td>
                                                                <td>20 Ekor</td>
                                                                <td>5 Ekor</td>
                                                                <td>53 Ekor</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVG Pakan Per Ternak</td>
                                                                <td>Rp5,634.57</td>
                                                                <td>Rp3,977.29</td>
                                                                <td>Rp6,660.33</td>
                                                            </tr>
                                                            <tr>
                                                                <td>AVG ADG Ternak</td>
                                                                <td>0.02</td>
                                                                <td>0.01</td>
                                                                <td>0.02</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Data Presentasi Pakan</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                    <div style="width: 50%;">
                                                                        <!-- Donut Chart for Program -->
                                                                        <svg width="100%" height="200" viewBox="0 0 200 200">
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#2fb344" stroke-width="30" stroke-dasharray="196 440" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#94d82d" stroke-width="30" stroke-dasharray="113 440" stroke-dashoffset="-196" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#f59f00" stroke-width="30" stroke-dasharray="88 440" stroke-dashoffset="-309" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#d5f21a" stroke-width="30" stroke-dasharray="43 440" stroke-dashoffset="-397" />
                                                                            <circle cx="100" cy="100" r="50" fill="white" />
                                                                        </svg>
                                                                        <!-- Legend -->
                                                                        <div class="mt-3">
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                                <span>Fattening (55%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #94d82d;"></span>
                                                                                <span>Breeding (20%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #f59f00;"></span>
                                                                                <span>Anakan (11%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #d5f21a;"></span>
                                                                                <span>Kambing (4%)</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                    <div style="width: 50%;">
                                                                        <!-- Donut Chart for Program -->
                                                                        <svg width="100%" height="200" viewBox="0 0 200 200">
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#2fb344" stroke-width="30" stroke-dasharray="196 440" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#94d82d" stroke-width="30" stroke-dasharray="113 440" stroke-dashoffset="-196" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#f59f00" stroke-width="30" stroke-dasharray="88 440" stroke-dashoffset="-309" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#d5f21a" stroke-width="30" stroke-dasharray="43 440" stroke-dashoffset="-397" />
                                                                            <circle cx="100" cy="100" r="50" fill="white" />
                                                                        </svg>
                                                                        <!-- Legend -->
                                                                        <div class="mt-3">
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                                <span>Fattening (55%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #94d82d;"></span>
                                                                                <span>Breeding (20%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #f59f00;"></span>
                                                                                <span>Anakan (11%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #d5f21a;"></span>
                                                                                <span>Kambing (4%)</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex justify-content-center">
                                                                    <div style="width: 50%;">
                                                                        <!-- Donut Chart for Program -->
                                                                        <svg width="100%" height="200" viewBox="0 0 200 200">
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#2fb344" stroke-width="30" stroke-dasharray="196 440" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#94d82d" stroke-width="30" stroke-dasharray="113 440" stroke-dashoffset="-196" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#f59f00" stroke-width="30" stroke-dasharray="88 440" stroke-dashoffset="-309" />
                                                                            <circle cx="100" cy="100" r="70" fill="transparent" stroke="#d5f21a" stroke-width="30" stroke-dasharray="43 440" stroke-dashoffset="-397" />
                                                                            <circle cx="100" cy="100" r="50" fill="white" />
                                                                        </svg>
                                                                        <!-- Legend -->
                                                                        <div class="mt-3">
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                                <span>Fattening (55%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #94d82d;"></span>
                                                                                <span>Breeding (20%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mb-2">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #f59f00;"></span>
                                                                                <span>Anakan (11%)</span>
                                                                            </div>
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #d5f21a;"></span>
                                                                                <span>Kambing (4%)</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p class="text-muted mt-3">Data yang tampil merupakan data sesuai rentang waktu yang ditentukan.</p>
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
    </body>
</x-app>

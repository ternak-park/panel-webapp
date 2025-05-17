<x-app>
    <body>
        <div class="page">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h2 class="mb-4">Data Pakan</h2>

                                    <div class="row align-items-center mb-4">
                                        <div class="col-md-auto d-flex align-items-center mb-2 mb-md-0">
                                            <span class="text-uppercase fw-bold me-2">DARI TANGGAL:</span>
                                            <select class="form-select me-2" style="width: 80px;">
                                                <option>15</option>
                                            </select>
                                            <select class="form-select me-2" style="width: 140px;">
                                                <option>Desember</option>
                                            </select>
                                            <select class="form-select me-4" style="width: 100px;">
                                                <option>2024</option>
                                            </select>
                                        </div>

                                        <div class="col-md-auto d-flex align-items-center mb-2 mb-md-0">
                                            <span class="text-uppercase fw-bold me-2">SAMPAI TANGGAL:</span>
                                            <select class="form-select me-2" style="width: 80px;">
                                                <option>15</option>
                                            </select>
                                            <select class="form-select me-2" style="width: 140px;">
                                                <option>Januari</option>
                                            </select>
                                            <select class="form-select me-4" style="width: 100px;">
                                                <option>2025</option>
                                            </select>
                                        </div>

                                        <div class="col-md-auto ms-md-auto">
                                            <button class="btn btn-primary me-2">Lihat Data</button>
                                            <button class="btn btn-secondary">Cetak</button>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="pakan-table">
                                            <thead>
                                                <tr>
                                                    <th class="bg-light"></th>
                                                    <th class="text-center text-uppercase" style="background-color: #e8f5e9; color: #2e7d32;">FATTENING</th>
                                                    <th class="text-center text-uppercase" style="background-color: #fff3e0; color: #e65100;">BREEDING</th>
                                                    <th class="text-center text-uppercase" style="background-color: #e3f2fd; color: #1565c0;">HAMIL DAN MENYUSUI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium">Jumlah Ternak</td>
                                                    <td class="text-center">42 Ekor</td>
                                                    <td class="text-center">103 Ekor</td>
                                                    <td class="text-center">53 Ekor</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">AVG Pakan Per Ternak</td>
                                                    <td class="text-center">Rp5,634.57</td>
                                                    <td class="text-center">Rp3,977.29</td>
                                                    <td class="text-center">Rp6,660.33</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">AVG ADG Ternak</td>
                                                    <td class="text-center">0.02</td>
                                                    <td class="text-center">0.01</td>
                                                    <td class="text-center">0.02</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Data Persentase Pakan</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div style="width: 150px; height: 150px;">
                                                                <svg viewBox="0 0 100 100" width="100%" height="100%">
                                                                    <!-- Donut chart with hole in center -->
                                                                    <circle cx="50" cy="50" r="40" fill="white" />

                                                                    <!-- Complete feed kediri (45%) - Dark Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#2fb344" stroke-width="20"
                                                                            stroke-dasharray="45 100" stroke-dashoffset="0" transform="rotate(-90 50 50)" />

                                                                    <!-- Silase (25%) - Light Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#8bd448" stroke-width="20"
                                                                            stroke-dasharray="25 100" stroke-dashoffset="-45" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas tahu (20%) - Orange -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ff9800" stroke-width="20"
                                                                            stroke-dasharray="20 100" stroke-dashoffset="-70" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas kedelai (10%) - Yellow -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ffea00" stroke-width="20"
                                                                            stroke-dasharray="10 100" stroke-dashoffset="-90" transform="rotate(-90 50 50)" />

                                                                    <!-- White hole in center -->
                                                                    <circle cx="50" cy="50" r="15" fill="white" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                <span>Complete feed kediri</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #8bd448;"></span>
                                                                <span>Silase</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ff9800;"></span>
                                                                <span>Ampas tahu</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ffea00;"></span>
                                                                <span>Ampas kedelai</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div style="width: 150px; height: 150px;">
                                                                <svg viewBox="0 0 100 100" width="100%" height="100%">
                                                                    <!-- Donut chart with hole in center -->
                                                                    <circle cx="50" cy="50" r="40" fill="white" />

                                                                    <!-- Silase (40%) - Dark Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#2fb344" stroke-width="20"
                                                                            stroke-dasharray="40 100" stroke-dashoffset="0" transform="rotate(-90 50 50)" />

                                                                    <!-- Complete feed kediri (30%) - Light Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#8bd448" stroke-width="20"
                                                                            stroke-dasharray="30 100" stroke-dashoffset="-40" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas tahu (20%) - Orange -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ff9800" stroke-width="20"
                                                                            stroke-dasharray="20 100" stroke-dashoffset="-70" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas kedelai (10%) - Yellow -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ffea00" stroke-width="20"
                                                                            stroke-dasharray="10 100" stroke-dashoffset="-90" transform="rotate(-90 50 50)" />

                                                                    <!-- White hole in center -->
                                                                    <circle cx="50" cy="50" r="15" fill="white" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                <span>Silase</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #8bd448;"></span>
                                                                <span>Complete feed kediri</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ff9800;"></span>
                                                                <span>Ampas tahu</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ffea00;"></span>
                                                                <span>Ampas kedelai</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div style="width: 150px; height: 150px;">
                                                                <svg viewBox="0 0 100 100" width="100%" height="100%">
                                                                    <!-- Donut chart with hole in center -->
                                                                    <circle cx="50" cy="50" r="40" fill="white" />

                                                                    <!-- Complete feed kediri (35%) - Dark Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#2fb344" stroke-width="20"
                                                                            stroke-dasharray="35 100" stroke-dashoffset="0" transform="rotate(-90 50 50)" />

                                                                    <!-- Silase (25%) - Light Green -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#8bd448" stroke-width="20"
                                                                            stroke-dasharray="25 100" stroke-dashoffset="-35" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas tahu (20%) - Orange -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ff9800" stroke-width="20"
                                                                            stroke-dasharray="20 100" stroke-dashoffset="-60" transform="rotate(-90 50 50)" />

                                                                    <!-- Ampas kedelai (15%) - Yellow -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#ffea00" stroke-width="20"
                                                                            stroke-dasharray="15 100" stroke-dashoffset="-80" transform="rotate(-90 50 50)" />

                                                                    <!-- Bubuk kacang hijau (5%) - Light Blue -->
                                                                    <circle cx="50" cy="50" r="25" fill="transparent" stroke="#c2e0f1" stroke-width="20"
                                                                            stroke-dasharray="5 100" stroke-dashoffset="-95" transform="rotate(-90 50 50)" />

                                                                    <!-- White hole in center -->
                                                                    <circle cx="50" cy="50" r="15" fill="white" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3">
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #2fb344;"></span>
                                                                <span>Complete feed kediri</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #8bd448;"></span>
                                                                <span>Silase</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ff9800;"></span>
                                                                <span>Ampas tahu</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center mb-1">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #ffea00;"></span>
                                                                <span>Ampas kedelai</span>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span class="d-inline-block me-2" style="width: 12px; height: 12px; background-color: #c2e0f1;"></span>
                                                                <span>Bubuk kacang hijau</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="text-muted mt-3 small">
                                        Terakhir diperbarui pada 31 Januari 2025 17:00 WIB
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Prevent DataTables initialization issues
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof $.fn.DataTable === 'function') {
                    $.fn.dataTable.ext.errMode = 'none';

                    // If you need to prevent auto-initialization completely
                    $.fn.dataTable.AutoInit = false;
                }
            });
        </script>
    </body>
</x-app>

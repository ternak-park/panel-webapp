<x-app>
    <div class="page">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            <a href="#" class="text-reset">Ternak</a> > <span class="text-muted">BREEDING</span>
                        </div>
                        <h2 class="page-title">
                            Overview Breeding
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <!-- Left side panel with animal details -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="px-3 py-2">
                                    <div class="input-icon mb-3">
                                        <select class="form-select" id="select-tag">
                                            <option value="0094" selected>Pilih Nomor Tag</option>
                                            <option value="0095">0095</option>
                                            <option value="0096">0096</option>
                                            <option value="0097">0097</option>
                                            <option value="0098">0098</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="px-3 pb-3">
                                    <div class="text-center mb-3">
                                        <img src="/api/placeholder/400/320" alt="Kambing" class="img-fluid rounded">
                                    </div>

                                    <div class="mb-3">
                                        <div class="fw-bold mb-2">TAG HEWAN</div>
                                        <div class="input-icon w-100">
                                            <input type="text" value="0094" class="form-control w-100"
                                                placeholder="Search…" readonly />
                                            <span class="input-icon-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M15 3v4a1 1 0 0 0 1 1h4" />
                                                    <path
                                                        d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" />
                                                    <path
                                                        d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-4">
                                            <div class="text-center border rounded p-2">
                                                <div class="text-muted small">KANDANG</div>
                                                <div class="fw-bold">B14-C</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center border rounded p-2">
                                                <div class="text-muted small">KONDISI</div>
                                                <div class="fw-bold">Sehat</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center border rounded p-2">
                                                <div class="text-muted small">SEX</div>
                                                <div class="fw-bold">Betina</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right side content area -->
                    <div class="col-12 col-md-8 col-lg-9">
                        <!-- Stats cards in a row -->
                        <div class="row mb-3">
                            <!-- JUMLAH TERNAK Card -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-0">
                                            <div class="text-muted mt-1 text-uppercase small fw-bold">JUMLAH TERNAK
                                            </div>
                                            <div class="ms-auto">
                                                <span class="text-gray d-inline-flex align-items-center lh-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                        height="13" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="border-bottom mt-1 mb-2"></div>

                                        <div class="d-flex align-items-center">
                                            <div style="background-color: #FFF5F0; padding: 8px; border-radius: 8px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#FF8C42" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M7 10l-.85 8.507a1.357 1.357 0 0 0 1.35 1.493h.146a2 2 0 0 0 1.857 -1.257l.994 -2.486a2 2 0 0 1 1.857 -1.257h1.292a2 2 0 0 1 1.857 1.257l.994 2.486a2 2 0 0 0 1.857 1.257h.146a1.37 1.37 0 0 0 1.364 -1.494l-.864 -9.506h-8c0 -3 -3 -5 -6 -5l-3 6l2 2l3 -2z" />
                                                    <path d="M22 14v-2a3 3 0 0 0 -3 -3" />
                                                </svg>
                                            </div>
                                            <div class="h1 m-0 ms-3 d-flex align-items-center">
                                                41
                                                <div class="ms-2 text-success d-flex align-items-center fw-normal"
                                                    style="font-size: 15px;">
                                                    10%
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
                                    </div>
                                </div>
                            </div>

                            <!-- BB TERBARU Card -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-0">
                                            <div class="text-muted mt-1 text-uppercase small fw-bold">BB TERBARU</div>
                                            <div class="ms-auto">
                                                <span class="text-gray d-inline-flex align-items-center lh-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                        height="13" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="border-bottom mt-1 mb-2"></div>

                                        <div class="d-flex align-items-center">
                                            <div style="background-color: #F0F5FF; padding: 8px; border-radius: 8px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#4263EB"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <rect x="3" y="7" width="18" height="13" rx="2" />
                                                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                                    <line x1="12" y1="12" x2="12"
                                                        y2="12.01" />
                                                </svg>
                                            </div>
                                            <div class="h1 m-0 ms-3 d-flex align-items-center">
                                                1,111.05
                                                <div class="ms-2 text-success d-flex align-items-center fw-normal"
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
                                    </div>
                                </div>
                            </div>

                            <!-- ADG TERBARU Card -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center mb-0">
                                            <div class="text-muted mt-1 text-uppercase small fw-bold">ADG TERBARU</div>
                                            <div class="ms-auto">
                                                <span class="text-gray d-inline-flex align-items-center lh-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                        height="13" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="border-bottom mt-1 mb-2"></div>

                                        <div class="d-flex align-items-center">
                                            <div style="background-color: #FFF0F5; padding: 8px; border-radius: 8px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#E91E63"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M19 5v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                                                    <path d="M7 12h5v5" />
                                                    <path d="M7 17l5 -5" />
                                                    <path d="M17 17v-5" />
                                                    <path d="M14 17h6" />
                                                </svg>
                                            </div>
                                            <div class="h1 m-0 ms-3 d-flex align-items-center">
                                                0.02
                                                <div class="ms-2 text-success d-flex align-items-center fw-normal"
                                                    style="font-size: 15px;">
                                                    2%
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle row with two charts -->
                        <div class="row mb-3">
                            <!-- Left Chart - Gender Percentage -->
                            <div class="col-md-6">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Persentase Jenis Kelamin Domba</h5>
                                        <div id="genderChart" style="height: 230px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Left Chart - Data Domba Hamil atau Menyusui -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title mb-3">Data Domba Hamil atau Menyusui</h3>
                                        <div class="mb-3">
                                            <select class="form-select" id="select-condition">
                                                <option value="all" selected>Pilih Kondisi Domba</option>
                                                <option value="hamil">Hamil</option>
                                                <option value="menyusui">Menyusui</option>
                                            </select>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-vcenter table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 100px;">TAGGING</th>
                                                        <th>KONDISI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">0094</td>
                                                        <td>Hamil</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">0095</td>
                                                        <td>Hamil</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">0096</td>
                                                        <td>Hamil</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">0097</td>
                                                        <td>Menyusui</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">0098</td>
                                                        <td>Hamil</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h3 class="card-title"
                                            style="font-size: 18px; font-weight: 500; color: #1e293b; margin-bottom: 15px;">
                                            Jumlah Domba Per Kondisi</h3> --}}
                                        <h5 class="card-title mb-3"> Jumlah Domba Per Kondisi</h5>

                                        <div style="margin-bottom: 10px; margin-left: 0px;">
                                            <span style="display: inline-flex; align-items: center;">
                                                <span
                                                    style="display: inline-block; width: 14px; height: 14px; background-color: #0D6EFD; border-radius: 3px; margin-right: 6px;"></span>
                                                <span
                                                    style="font-size: 14px; color: #475569; font-weight: 400;">Tagging</span>
                                            </span>
                                        </div>

                                        <div id="conditionChart" style="height: 260px; margin-top: 0px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"> Jumlah Domba Per Kondisi</h5>
                                        <div id="ageChart" style="height: 230px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Initialize the charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender chart
            const genderOptions = {
                series: [85, 15], // Persentase Betina (85%) dan Jantan (15%)
                labels: ['Betina', 'Jantan'],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#4CAF50', '#8BC34A'], // Warna untuk Betina dan Jantan
                stroke: {
                    width: 0
                },
                legend: {
                    position: 'right',
                    offsetY: 20,
                    fontSize: '13px',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                        offsetX: -5
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '55%',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '14px',
                                    fontWeight: 500,
                                    color: '#000000'
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    color: '#000000',
                                    formatter: function(val) {
                                        return val + '%'; // Menampilkan persentase di tengah donut
                                    }
                                },
                                total: {
                                    show: false // Sembunyikan total jika tidak diperlukan
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: true, // Aktifkan dataLabels untuk menampilkan persentase
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] +
                        '%'; // Tampilkan persentase pada donut
                    },
                    style: {
                        fontSize: '14px',
                        // fontWeight: 'bold',
                        colors: ['#000000'] // Warna teks persentase
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 250
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const genderChart = new ApexCharts(document.querySelector("#genderChart"), genderOptions);
            genderChart.render();
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender chart

            // Condition chart (Jumlah Domba Per Kondisi)
            const conditionOptions = {
                series: [{
                    name: 'Tagging',
                    data: [160, 50, 40, 25]
                }],
                chart: {
                    type: 'bar',
                    height: 260,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: false
                    },
                    offsetX: 0,
                    offsetY: 10
                },
                colors: ['#0D6EFD'],
                plotOptions: {
                    bar: {
                        distributed: false,
                        borderRadius: 0,
                        columnWidth: '28%',
                        dataLabels: {
                            position: 'top'
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -25,
                    style: {
                        fontSize: '14px',
                        fontWeight: '500',
                        colors: ["#0D6EFD"]
                    },
                    formatter: function(val) {
                        return val;
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#D3D3D3',
                    strokeDashArray: 0,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                            opacity: 0.6
                        }
                    },
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 10
                    }
                },
                xaxis: {
                    categories: ['Sehat', 'Menyusui', 'Hamil', 'Sakit'],
                    position: 'bottom',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#000000',
                            fontSize: '13px'
                        },
                        offsetY: 2
                    }
                },
                yaxis: {
                    min: 0,
                    max: 200,
                    tickAmount: 4,
                    labels: {
                        style: {
                            colors: '#000000',
                            fontSize: '13px'
                        },
                        formatter: function(val) {
                            return val;
                        },
                        offsetX: -5
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    enabled: false
                }
            };
            const conditionChart = new ApexCharts(document.querySelector("#conditionChart"), conditionOptions);
            conditionChart.render();

            // Age chart

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Age chart
            const ageOptions = {
                series: [60, 16.2, 11.5, 12.3], // Data persentase
                labels: ['Poel 3 (3-4 tahun)', 'Poel 2 (2-3 tahun)', 'Poel 1 (1-2 tahun)',
                    'Belum poel (0-1 tahun)'
                ],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#E65100', '#FB8C00', '#FFB300', '#FFD54F'], // Warna untuk setiap kategori
                stroke: {
                    width: 0
                },
                legend: {
                    position: 'right',
                    offsetY: 20,
                    fontSize: '13px',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                        offsetX: -5
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '55%',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '14px',
                                    fontWeight: 500,
                                    color: '#000000'
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    color: '#000000',
                                    formatter: function(val) {
                                        return val + '%'; // Menampilkan persentase di tengah donut
                                    }
                                },
                                total: {
                                    show: false // Sembunyikan total jika tidak diperlukan
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: true, // Aktifkan dataLabels untuk menampilkan persentase
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] +
                        '%'; // Tampilkan persentase pada donut
                    },
                    style: {
                        fontSize: '9px',

                        colors: ['#000000'] // Warna teks persentase
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 250
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            const ageChart = new ApexCharts(document.querySelector("#ageChart"), ageOptions);
            ageChart.render();
        });
    </script>
</x-app>

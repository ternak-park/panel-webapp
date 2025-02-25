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
                                    TERNAK • FATTENING
                                </div>
                                <h2 class="page-title">
                                    Overview Fattening
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
                                    <div class="card-header">
                                        <h3 class="card-title">Pilih Nomor Tag</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="px-3 py-2">
                                            <div class="input-icon mb-3">
                                                <select class="form-select" id="select-tag">
                                                    <option value="A01-A" selected>A01-A</option>
                                                    <option value="A01-B">A01-A</option>
                                                    <option value="C01-A">C01-A"</option>
                                                    <option value="D01-A">D01-A</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="px-3 pb-3">
                                            <div class="text-center mb-3">
                                                <img src="/api/placeholder/400/300" alt="Kambing"
                                                    class="img-fluid rounded">
                                            </div>

                                            <div class="mb-2">
                                                <div class="datagrid-item w-100">
                                                    <div class="datagrid-title">Tag Hewan</div>
                                                    <div class="input-icon w-100">
                                                        <input type="text" value="test" class="form-control w-100"
                                                            placeholder="Search…" readonly />
                                                        <span class="input-icon-addon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
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
                                                        <div class="fw-bold">Jantan</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right side content area -->
                            <div class="col-md-9">
                                <!-- Stats cards in a row -->
                                <div class="row mb-3">
                                    <!-- JUMLAH TERNAK Card -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center mb-0">
                                                    <div class="text-muted mt-1 text-uppercase small fw-bold">JUMLAH
                                                        TERNAK</div>
                                                    <div class="ms-auto">
                                                        <span class="text-gray d-inline-flex align-items-center lh-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <polyline points="9 6 15 12 9 18" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="border-bottom mt-1 mb-2"></div>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        style="background-color: #FFF5F0; padding: 8px; border-radius: 8px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#FF8C42" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
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
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
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
                                                    <div class="text-muted mt-1 text-uppercase small fw-bold">BB
                                                        TERBARU</div>
                                                    <div class="ms-auto">
                                                        <span class="text-gray d-inline-flex align-items-center lh-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <polyline points="9 6 15 12 9 18" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="border-bottom mt-1 mb-2"></div>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        style="background-color: #F0F5FF; padding: 8px; border-radius: 8px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#4263EB" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <rect x="3" y="7" width="18" height="13"
                                                                rx="2" />
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
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
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
                                                    <div class="text-muted mt-1 text-uppercase small fw-bold">ADG
                                                        TERBARU</div>
                                                    <div class="ms-auto">
                                                        <span class="text-gray d-inline-flex align-items-center lh-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <polyline points="9 6 15 12 9 18" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="border-bottom mt-1 mb-2"></div>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        style="background-color: #FFF0F5; padding: 8px; border-radius: 8px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#E91E63" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
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
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
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

                                <!-- Chart Card - Improved to match target -->
                                {{-- <div class="card mb-3">
                                    <div class="card-body">
                                        <h3 class="card-title mb-3">Data Upweight Ternak Per Bulan</h3>
                                        <div style="height: 250px;">
                                            <!-- Chart with improved layout to match image 2 -->
                                            <div class="d-flex justify-content-between align-items-end" style="height: 200px;">
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 140px; background-color: #4263EB; width: 25px;"></div>
                                                    <div class="mt-2">70</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 100px; background-color: #4263EB; width: 25px;"></div>
                                                    <div class="mt-2">50</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 40px; background-color: #4263EB; width: 25px;"></div>
                                                    <div class="mt-2">20</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 26px; background-color: #B1BCFF; width: 25px; margin-top: 114px;"></div>
                                                    <div class="mt-2">-13</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 80px; background-color: #B1BCFF; width: 25px;"></div>
                                                    <div class="mt-2">40</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 160px; background-color: #FFC107; width: 25px;"></div>
                                                    <div class="mt-2">80</div>
                                                </div>
                                                <div class="d-flex flex-column align-items-center" style="width: 11%;">
                                                    <div style="height: 50px; background-color: #FFC107; width: 25px;"></div>
                                                    <div class="mt-2">25</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Legend with improved style to match target -->
                                        <div class="d-flex flex-wrap mt-3 justify-content-start">
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #4263EB; border-radius: 50%;"></div>
                                                <span class="ms-2 small">Agustus 2024</span>
                                            </div>
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #4263EB; border-radius: 50%;"></div>
                                                <span class="ms-2 small">September 2024</span>
                                            </div>
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #4263EB; border-radius: 50%;"></div>
                                                <span class="ms-2 small">Oktober 2024</span>
                                            </div>
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #B1BCFF; border-radius: 50%;"></div>
                                                <span class="ms-2 small">November 2024</span>
                                            </div>
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #B1BCFF; border-radius: 50%;"></div>
                                                <span class="ms-2 small">Desember 2024</span>
                                            </div>
                                            <div class="d-flex align-items-center me-3 mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #FFC107; border-radius: 50%;"></div>
                                                <span class="ms-2 small">Januari 2025</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div style="width: 10px; height: 10px; background-color: #FFC107; border-radius: 50%;"></div>
                                                <span class="ms-2 small">Februari 2025</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="col-12">
                                            <h5 class="card-title mb-4">Data Upweight Ternak Per Bulan</h5>
                                            <div id="upweightChart" style="height: 300px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const options = {
                                            series: [{
                                                name: 'Upweight',
                                                data: [70, 50, 20, -13, 40, 80, 25]
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 300,
                                                toolbar: {
                                                    show: false
                                                },
                                                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                                            },
                                            colors: ['#0D6EFD', '#0D6EFD', '#0D6EFD', '#7CB9F8', '#7CB9F8', '#FFC107', '#FFC107'],
                                            plotOptions: {
                                                bar: {
                                                    distributed: true,
                                                    borderRadius: 0,
                                                    columnWidth: '30%',
                                                    dataLabels: {
                                                        position: 'top'
                                                    }
                                                },
                                            },
                                            dataLabels: {
                                                enabled: true,
                                                formatter: function(val) {
                                                    return val;
                                                },
                                                offsetY: -20,
                                                style: {
                                                    fontSize: '12px',
                                                    colors: ["#000"]
                                                }
                                            },
                                            xaxis: {
                                                categories: ['Agustus 2024', 'September 2024', 'Oktober 2024', 'November 2024', 'Desember 2024', 'Januari 2025', 'Februari 2025'],
                                                labels: {
                                                    show: false
                                                },
                                                axisBorder: {
                                                    show: false
                                                },
                                                axisTicks: {
                                                    show: false
                                                }
                                            },
                                            yaxis: {
                                                min: -25,
                                                max: 100,
                                                tickAmount: 5,
                                                labels: {
                                                    show: true,
                                                    style: {
                                                        fontSize: '11px'
                                                    },
                                                    formatter: function(val) {
                                                        return val;
                                                    }
                                                }
                                            },
                                            grid: {
                                                show: true,
                                                borderColor: '#f1f1f1',
                                                strokeDashArray: 4,
                                                position: 'back',
                                                xaxis: {
                                                    lines: {
                                                        show: false
                                                    }
                                                },
                                                yaxis: {
                                                    lines: {
                                                        show: true
                                                    }
                                                }
                                            },
                                            legend: {
                                                show: true,
                                                position: 'right',
                                                fontSize: '12px',
                                                fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
                                                customLegendItems: ['Agustus 2024', 'September 2024', 'Oktober 2024', 'November 2024', 'Desember 2024', 'Januari 2025', 'Februari 2025'],
                                                markers: {
                                                    fillColors: ['#0D6EFD', '#0D6EFD', '#0D6EFD', '#7CB9F8', '#7CB9F8', '#FFC107', '#FFC107'],
                                                    radius: 0,
                                                    width: 12,
                                                    height: 12,
                                                    customHTML: function() {
                                                        return '<span style="display:inline-block;width:12px;height:12px;"></span>'
                                                    }
                                                },
                                                itemMargin: {
                                                    horizontal: 5,
                                                    vertical: 3
                                                }
                                            },
                                            tooltip: {
                                                enabled: false
                                            }
                                        };
                            
                                        const chart = new ApexCharts(document.querySelector("#upweightChart"), options);
                                        chart.render();
                                    });
                                </script>

                        <!-- Table Card -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title mb-3">Data Timbang Ternak Per Bulan</h3>
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>TAGGING</th>
                                                <th>BB (Kg)</th>
                                                <th>30/07/2024</th>
                                                <th>23/08/2024</th>
                                                <th>02/09/2024</th>
                                                <th>16/09/2024</th>
                                                <th>02/10/2024</th>
                                                <th>01/11/2024</th>
                                                <th>01/12/2024</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0094</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                                <td>13.5</td>
                                            </tr>
                                            <tr>
                                                <td>0095</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                                <td>22.3</td>
                                            </tr>
                                            <tr>
                                                <td>0096</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                                <td>16.5</td>
                                            </tr>
                                            <tr>
                                                <td>0097</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                                <td>14.5</td>
                                            </tr>
                                            <tr>
                                                <td>0098</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                                <td>11.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
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

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
                                    DASHBOARD
                                </div>
                                <h2 class="page-title">
                                    Investor
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-deck row-cards">
                            {{-- card INVESTOR --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="text-muted text-uppercase small fw-bold">JUMLAH INVESTOR</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!-- Donut Chart for Gender -->
                                            <svg width="100%" height="200" viewBox="0 0 200 200">
                                                <circle cx="100" cy="100" r="70" fill="transparent"
                                                    stroke="#FF8F00" stroke-width="30" stroke-dasharray="330 440" />
                                                <circle cx="100" cy="100" r="70" fill="transparent"
                                                    stroke="#FFAD45" stroke-width="30" stroke-dasharray="110 440"
                                                    stroke-dashoffset="-330" />
                                                <circle cx="100" cy="100" r="50" fill="white" />
                                            </svg>
                                            <!-- Legend -->
                                            <div class="mt-1">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h2><b>124</b>
                                                        <h5>Total Investor</h5>
                                                    </h2>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="d-inline-block me-2"
                                                            style="width: 12px; height: 12px; background-color: #FF8F00;"></span>
                                                        <span><b>100</b> Investor Fattening</span>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span class="d-inline-block me-2"
                                                            style="width: 12px; height: 12px; background-color: #FFAD45;"></span>
                                                        <span><b>24</b> Investor Breeding</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- kolom tengah dengan 2 card --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="row g-4">
                                    {{-- card TOTAL INVESTASI MASUK --}}
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="text-muted text-uppercase small fw-bold">TOTAL INVESTASI
                                                        MASUK</div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3">
                                                    <span class="me-2">
                                                        <span class="avatar bg-teal-lt">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-cash" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <rect x="7" y="9" width="14" height="10"
                                                                    rx="2"></rect>
                                                                <circle cx="14" cy="14" r="2"></circle>
                                                                <path
                                                                    d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <div>
                                                        <h2 class="mb-0"><b>Rp.124.888.762</b></h2>
                                                        <div class="text-success d-flex align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-trending-up"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M3 17l6 -6l4 4l8 -8"></path>
                                                                <path d="M14 7l7 0l0 7"></path>
                                                            </svg>
                                                            <span>7%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- card ACCOUNT RECEIVABLE --}}
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="text-muted text-uppercase small fw-bold">ACCOUNT
                                                        RECEIVABLE (AR)</div>
                                                </div>
                                                <div class="d-flex align-items-center mt-3">
                                                    <span class="me-2">
                                                        <span class="avatar bg-blue-lt">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-receipt"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2">
                                                                </path>
                                                                <path
                                                                    d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <div>
                                                        <h2 class="mb-0"><b>Rp.67.888.762</b></h2>
                                                        <div class="text-success d-flex align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-trending-up"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M3 17l6 -6l4 4l8 -8"></path>
                                                                <path d="M14 7l7 0l0 7"></path>
                                                            </svg>
                                                            <span>7%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- card STATUS --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="text-muted text-uppercase small fw-bold">STATUS</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!-- Donut Chart for Gender -->
                                            <svg width="100%" height="200" viewBox="0 0 200 200">
                                                <circle cx="100" cy="100" r="70" fill="transparent"
                                                    stroke="#2FB344" stroke-width="30" stroke-dasharray="330 440" />
                                                <circle cx="100" cy="100" r="70" fill="transparent"
                                                    stroke="#FAA811" stroke-width="30" stroke-dasharray="110 440"
                                                    stroke-dashoffset="-330" />
                                                <circle cx="100" cy="100" r="50" fill="white" />
                                            </svg>
                                            <!-- Legend -->
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="d-inline-block me-2"
                                                        style="width: 12px; height: 12px; background-color: #2FB344;"></span>
                                                    <span><b>100</b> Paid</span>
                                                </div>
                                                <div class="mt-3">
                                                    <span class="d-inline-block me-2"
                                                        style="width: 12px; height: 12px; background-color: #FAA811;"></span>
                                                    <span><b>24</b> Partial</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">INVESTOR FATENING</h3>
                                </div>
                                <div class="card-body border-bottom py-3">
                                    <div class="d-flex">
                                        <div class="text-muted">
                                            Show
                                            <div class="mx-2 d-inline-block">
                                                <input type="text" class="form-control form-control-sm"
                                                    value="10" size="3" aria-label="Entries count">
                                            </div>
                                            entries
                                        </div>
                                        <div class="ms-auto text-muted">
                                            Search:
                                            <div class="ms-2 d-inline-block">
                                                <input type="text" class="form-control form-control-sm"
                                                    aria-label="Search">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">NO</th>
                                                <th>NO. KAVLING
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>NAMA INVESTOR
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>ALAMAT
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>ORDER DATE
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>JUMLAH DOMBA
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>NO HP
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th>STATUS
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm ms-1"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="6 15 12 9 18 15" />
                                                    </svg>
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>A01</td>
                                                <td>Ivan William</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>3 Jan 2024</td>
                                                <td>5</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>A01</td>
                                                <td>Ivan William</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>27 Jan 2024</td>
                                                <td>63</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>22 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-warning">PARTIAL</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>26 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>8 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>1 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>24 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>2 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-success">PAID</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>9 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-warning">PARTIAL</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>A01</td>
                                                <td>DevRel</td>
                                                <td>Kab. Sidoarjo</td>
                                                <td>18 Jan 2024</td>
                                                <td>93</td>
                                                <td>+62 821 4545 8777</td>
                                                <td><span class="badge bg-warning">PARTIAL</span></td>
                                                <td class="text-end">
                                                    <button class="btn button-toggle align-text-top"
                                                        data-bs-boundary="viewport"
                                                        data-bs-toggle="button">Detail</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of
                                        <span>16</span> entries</p>
                                    <ul class="pagination m-0 ms-auto">
                                        <li class="page-item">
                                            <a class="page-link" href="#">
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


    </body>
    <!-- Initialize the charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender chart
            const genderOptions = {
                series: [85, 15],
                labels: ['Betina', 'Jantan'],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#4CAF50', '#8BC34A'],
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
                                    show: true
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    formatter: function(val) {
                                        return val + '%';
                                    }
                                },
                                total: {
                                    show: false
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
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
                series: [60, 16.2, 11.5, 12.3],
                labels: ['Poel 3 (3-4 tahun)', 'Poel 2 (2-3 tahun)', 'Poel 1 (1-2 tahun)',
                    'Belum poel (0-1 tahun)'
                ],
                chart: {
                    type: 'donut',
                    height: 230,
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif'
                },
                colors: ['#E65100', '#FB8C00', '#FFB300', '#FFD54F'],
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
                                    show: true
                                },
                                value: {
                                    show: true,
                                    fontSize: '22px',
                                    fontWeight: 600,
                                    formatter: function(val) {
                                        return val + '%';
                                    }
                                },
                                total: {
                                    show: false
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
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

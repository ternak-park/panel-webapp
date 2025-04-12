<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            {{-- <td>{{ $kandang->pemilik->name ?? 'Tidak Ada Pemilik' }}</td> --}}

                            <h2 class="page-title">
                                {{ $judul }}
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <span class="d-none d-sm-inline">
                                    <a href="{{ route('hewan.excel') }}" class="btn">
                                        Cetak
                                    </a>
                                </span>
                                <button id="deleteSelected" class="btn btn-danger d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    Pilihan
                                </button>
                                <a href="{{ route('hewan.create') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambah-hewan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    </svg>
                                    Import .csv
                                </a>
                                <a href="{{ route('hewan.create') }}" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-tambah-hewan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah {{ $main }}
                                </a>
                                <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-tambahData" aria-label="Tambah Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="row row-cards">
                    {{--  --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hewan</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Menampilkan
                                        <div class="mx-2 d-inline-block">
                                            <select id="pageLength" class="form-control form-control-sm"
                                                style="width:70px">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        hasil
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput" class="form-control form-control-sm"
                                                placeholder="Cari Hewan" aria-label="Search supplier">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped card-table datatable" id="tableHewan">
                                    <thead>
                                        <tr>
                                            <th class="w-1">
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select all items" />
                                            </th>
                                            <th class="w-1" style="width: 5%;">No</th>
                                            <th style="width: 15%;">Tag</th>
                                            <th style="width: 15%;">Sex</th>
                                            <th style="width: 15%;">Program</th>
                                            <th style="width: 15%;">Jenis</th>
                                            <th style="width: 25%;">Tipe</th>
                                            <th class="w-1" style="width: 30%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Your table content will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p id="tableInfo" class="m-0 text-muted"></p>
                                <ul id="tablePagination" class="pagination m-0 ms-auto"></ul>
                            </div>
                        </div>
                    </div>
                    {{-- 2 --}}
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hewan</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Show
                                        <div class="mx-2 d-inline-block">
                                            <select id="pageLength" class="form-control form-control-sm"
                                                style="width:70px">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                        entries
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" id="searchInput"
                                                class="form-control form-control-sm" placeholder="Cari Hewan"
                                                aria-label="Search supplier">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable" id="tableHewan">
                                    <thead>
                                        <tr>
                                            <th class="w-1">
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select all items" />
                                            </th>
                                            <th class="w-1">No.</th>
                                            <th>Tag</th>
                                            <th>Sex</th>
                                            <th>Program</th>
                                            <th>Jenis</th>
                                            <th>Tipe</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table content will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-flex align-items-center">
                                <p id="tableInfo" class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of
                                    <span>16</span> entries
                                </p>
                                <ul id="tablePagination" class="pagination m-0 ms-auto">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 6l-6 6l6 6" />
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
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    {{-- INVOICES --}}
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Invoices</h3>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-muted">
                                        Show
                                        <div class="mx-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm" value="8"
                                                size="3" aria-label="Invoices count" />
                                        </div>
                                        entries
                                    </div>
                                    <div class="ms-auto text-muted">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm"
                                                aria-label="Search invoice" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable" id="tableHewan">
                                    <thead>
                                        <tr>
                                            <th class="w-1">
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select all invoices" />
                                            </th>
                                            <th class="w-1">
                                                No.
                                                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-sm icon-thick" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6 15l6 -6l6 6" />
                                                </svg>
                                            </th>
                                            <th>Invoice Subject</th>
                                            <th>Client</th>
                                            <th>VAT No.</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001401</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Design
                                                    Works</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-us"></span>
                                                Carlson Limited
                                            </td>
                                            <td>87956621</td>
                                            <td>15 Dec 2017</td>
                                            <td>
                                                <span class="badge bg-success me-1"></span> Paid
                                            </td>
                                            <td>$887</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001402</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">UX
                                                    Wireframes</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-gb"></span>
                                                Adobe
                                            </td>
                                            <td>87956421</td>
                                            <td>12 Apr 2017</td>
                                            <td>
                                                <span class="badge bg-warning me-1"></span> Pending
                                            </td>
                                            <td>$1200</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001403</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">New
                                                    Dashboard</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-de"></span>
                                                Bluewolf
                                            </td>
                                            <td>87952621</td>
                                            <td>23 Oct 2017</td>
                                            <td>
                                                <span class="badge bg-warning me-1"></span> Pending
                                            </td>
                                            <td>$534</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001404</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Landing
                                                    Page</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-br"></span>
                                                Salesforce
                                            </td>
                                            <td>87953421</td>
                                            <td>2 Sep 2017</td>
                                            <td>
                                                <span class="badge bg-secondary me-1"></span> Due in
                                                2 Weeks
                                            </td>
                                            <td>$1500</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001405</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Marketing
                                                    Templates</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-pl"></span>
                                                Printic
                                            </td>
                                            <td>87956621</td>
                                            <td>29 Jan 2018</td>
                                            <td>
                                                <span class="badge bg-danger me-1"></span> Paid
                                                Today
                                            </td>
                                            <td>$648</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001406</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Sales
                                                    Presentation</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-br"></span>
                                                Tabdaq
                                            </td>
                                            <td>87956621</td>
                                            <td>4 Feb 2018</td>
                                            <td>
                                                <span class="badge bg-secondary me-1"></span> Due in
                                                3 Weeks
                                            </td>
                                            <td>$300</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001407</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Logo &
                                                    Print</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-us"></span>
                                                Apple
                                            </td>
                                            <td>87956621</td>
                                            <td>22 Mar 2018</td>
                                            <td>
                                                <span class="badge bg-success me-1"></span> Paid
                                                Today
                                            </td>
                                            <td>$2500</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
                                                        <a class="dropdown-item" href="#">
                                                            Another action
                                                        </a>
                                                    </div>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice" />
                                            </td>
                                            <td><span class="text-muted">001408</span></td>
                                            <td>
                                                <a href="invoice.html" class="text-reset" tabindex="-1">Icons</a>
                                            </td>
                                            <td>
                                                <span class="flag flag-country-pl"></span>
                                                Tookapic
                                            </td>
                                            <td>87956621</td>
                                            <td>13 May 2018</td>
                                            <td>
                                                <span class="badge bg-success me-1"></span> Paid
                                                Today
                                            </td>
                                            <td>$940</td>
                                            <td class="text-end">
                                                <span class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"> Action </a>
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
                                <p class="m-0 text-muted">
                                    Showing <span>1</span> to <span>8</span> of
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
                                                <path d="M15 6l-6 6l6 6" />
                                            </svg>
                                            prev
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            next
                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    @include('admin.hewan.modal.edit', [
        'statusTernak' => $status,
        'tipeTernak' => $tipe,
        'kesehatanTernak' => $kesehatan,
        'programTernak' => $program,
        'kandangTernak' => $kandang,
        'pemilikTernak' => $user,
        'hewanInduk' => $induk,
    ])
    @include('admin.hewan.modal.create', [
        'statusTernak' => $status,
        'tipeTernak' => $tipe,
        'kesehatanTernak' => $kesehatan,
        'programTernak' => $program,
        'kandangTernak' => $kandang,
        'pemilikTernak' => $user,
        'hewanInduk' => $induk,
    ])
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function() {
                const id = $(this).data('id');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: 'Data akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/hewan/" + id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    response.success || 'Data telah dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(err) {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    } else {
                        Swal.fire(
                            'Cancelled',
                            'Data tidak dihapus.',
                            'info'
                        );
                    }
                });
            });
        });
    </script>
    <script>
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                // Lakukan fetch untuk mendapatkan data dari server
                fetch(`/admin/hewan/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi form di modal dengan data yang diambil
                        document.getElementById('editHewanForm').setAttribute('action',
                            `/admin/hewan/${id}`);
                        document.getElementById('edit-ternak-tag').value = data.ternak_tag;
                        document.getElementById('edit-ternak-induk').value = data.ternak_induk;
                        document.getElementById('edit-sex').value = data.sex;
                        document.getElementById('edit-tanggal-masuk').value = data.tanggal_masuk;
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        alert('Terjadi kesalahan saat mengambil data.');
                    });
            });
        });
    </script>

    <script>
        // Enable or Disable Fields Before Submission
        document.getElementById('hewanForm').addEventListener('submit', function() {
            document.getElementById('ternak_tag').removeAttribute('readonly');
            document.getElementById('ternak_tag').removeAttribute('disabled');
        });
    </script>

</x-app>

<x-app>
    <div class="container-xl">
        <div class="row gx-lg-5">
            <div class="d-none d-lg-block col-lg-3">
                <ul class="nav nav-pills nav-vertical">
                    <li class="nav-item ">
                        <a href="{{ route('welcome') }}" class="nav-link {{ Route::is('welcome') ? 'active' : '' }}">
                            Introduction
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#menu-base" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                            3 Step Only
                            <span class="nav-link-toggle"></span>
                        </a>
                        <ul class="nav nav-pills collapse" id="menu-base">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Cari Lahan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Beli
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Dapet Domba
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#menu-content" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                            Content
                            <span class="nav-link-toggle"></span>
                        </a>
                        <ul class="nav nav-pills collapse" id="menu-content">
                            <li class="nav-item">
                                <a href="../docs/colors.html" class="nav-link">
                                    Colors
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../docs/typography.html" class="nav-link">
                                    Typography
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../docs/icons.html" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../docs/customize.html" class="nav-link">
                                    Customize Tabler
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="../changelog.html" class="nav-link">
                            Changelog
                            <span class="badge bg-primary-lt ms-auto">1.0.0-beta15</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="markdown">
                            <div>
                                <div class="d-flex mb-3">
                                    <h1 class="m-0">Tentang Kami</h1>
                                </div>
                            </div>
                            <p>Ternakpark menghadirkan konsep peternakan yang cocok untuk mereka yang baru ingin terjun
                                ke dunia peternakan. Dibuat dengan sistem komunal membuat pemilik peternakan mampu
                                menekan resiko kegagalan di bisnis peternakan meski memiliki jumlah domba yang
                                minimalis.

                                Dengan strategi multi revenue (integrated farming) dan pengelolaan komunal, operasional
                                dapat ditekan dan bisnis dapat lebih berkelanjutan. Selama dua tahun terakhir,
                                Ternakpark telah berhasil membagikan keuntungan lebih dari Rp 600 juta kepada para
                                mitra, dengan total penjualan ternak mencapai lebih dari 2.500 ekor. Keberhasilan ini
                                adalah bukti nyata dari konsolidasi dan pengelolaan bisnis yang efektif di Ternakpark.
                            </p>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3>Benefit</h3>
                                        <ul class="list-unstyled">
                                            <li>
                                                - <a href="">Lahan Kavling Berstatus SHM</a>
                                            </li>
                                            <li>
                                                - <a href="">Kandang Ternak</a>
                                            </li>
                                            <li>
                                                - <a href="">5 Ekor Domba</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Wilayah</h3>
                                        <ul class="list-unstyled">
                                            <li>
                                                - <a href="#">Ternakpark Wonosalam</a>
                                            </li>
                                            <li>
                                                - <a href=".#">Ternakpark Purwakarta</a>
                                            </li>
                                            <li>
                                                - <a href="#">Ternakpark Cilegon</a>
                                            </li>
                                            <li>
                                                - <a href="#">Projek Baru Tahun 2025</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Contact</h3>
                                        <ul class="list-unstyled">
                                            <li>
                                                - <a href="#">Whatsapp</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3>Kenapa Kami ?</h3>
                                        <ul class="list-unstyled">
                                            <li>
                                                - <a href="#">Dikelola secara professional oleh ahlinya</a>
                                            </li>
                                            <li>
                                                - <a href="#">Mitra BWA.id</a>
                                            </li>
                                            <li>
                                                - <a href="#"> Potensi peternakan yang semakin meningkat</a>
                                            </li>
                                            <li>
                                                - <a href="#">
                                                    100% Kavling hak milik</a>
                                            </li>
                                            <li>
                                                - <a href="#">Lokasi strategis daerah wisata</a>
                                            </li>
                                            <li>
                                                - <a href="#">
                                                    Pengelolaan 100% dilakukan management TERNAK PARK</a>
                                            </li>
                                        </ul>
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

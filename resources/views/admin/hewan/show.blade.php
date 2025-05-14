<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Info</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <span class="avatar avatar-xl mb-4 rounded"
                                    style="
                                        background-image: url('{{ $ternakHewan->gambar_hewan ? asset('storage/hewan/' . $ternakHewan->gambar_hewan) : asset('storage/hewan/default.jpg') }}');
                                        background-size: cover;
                                        background-position: center;
                                        width: 100%;

                                         width: 400px;
                                        height: 400px;

                                        aspect-ratio: 1/1;
                                        border-radius: 50%;
                                    ">
                                </span>
                                <h3 class="mb-0">
                                    {{ $ternakHewan->jenis ? $ternakHewan->jenis->nama_jenis : 'Tidak Tersedia' }}</h3>
                                <p class="text-muted">{{ $ternakHewan->created_at->format('d-m-Y') }}</p>
                                <p class="mb-3">
                                    <button id="downloadLink" class="btn btn-outline-primary-lt">Download
                                        Gambar</button>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tag Hewan</div>
                                    <div class="input-icon">
                                        <input type="text" value="{{ $ternakHewan->tag_hewan }}" class="form-control"
                                            placeholder="Tidak Ada" readonly />
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tag Induk Betina</div>
                                    <div class="input-icon">

                                        <input type="text"
                                            value="{{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->tag_induk_betina : 'Tidak ada tag induk betina' }}"
                                            class="form-control" placeholder="Tidak Ada" readonly />
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tag Induk Jantan</div>
                                    <div class="input-icon">
                                        <input type="text"
                                            value="{{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->tag_induk_jantan : 'Tidak ada tag induk jantan' }}"
                                            class="form-control" placeholder="Tidak Ada" readonly />
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kode Kandang</div>
                                    <div class="input-icon">
                                        <input type="text"
                                            value="{{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->ternakKandang ? $ternakHewan->detailTernakHewans->first()->ternakKandang->kode_kandang : 'Tidak Tersedia' }}"
                                            class="form-control" placeholder="Tidak Ada" readonly />
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tag Anak</div>
                                    <div class="input-icon">
                                        <input type="text"
                                            value="{{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->tag_induk_betina : '' }}"
                                            class="form-control" placeholder="Tidak Ada" readonly />
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Pemilik</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->pemilik ? $ternakHewan->detailTernakHewans->first()->pemilik->nama_pemilik : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tgl Masuk/Lahir</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->tanggal_masuk : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kelamin</div>
                                    <div class="datagrid-content">{{ $ternakHewan->sex_hewan }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jenis</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->jenis ? $ternakHewan->jenis->nama_jenis : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kondisi Kesehatan</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->kesehatan ? $ternakHewan->detailTernakHewans->first()->kesehatan->nama_kesehatan : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Program</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->program ? $ternakHewan->detailTernakHewans->first()->program->nama_program : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->status ? $ternakHewan->detailTernakHewans->first()->status->nama_status : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Usia</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->ternak_usia : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Lama hari di Peternakan</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->lama_hari_dipeternakan . ' Hari' : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tgl Terjual/Mati</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->tgl_terjual_mati ? $ternakHewan->detailTernakHewans->first()->tgl_terjual_mati : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Berat Badan Masuk/Lahir</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->bb_masuk_lahir . ' Kg' : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Berat Badan Terbaru</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() ? $ternakHewan->detailTernakHewans->first()->bb_terbaru . ' Kg' : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tgl Timbang Terbaru</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detailTernakHewans->first() && $ternakHewan->detailTernakHewans->first()->tgl_timbang_terbaru ? $ternakHewan->detailTernakHewans->first()->tgl_timbang_terbaru : 'Tidak Tersedia' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('hewan.index') }}" class="btn btn-link">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadLink').addEventListener('click', function(e) {
            e.preventDefault();
            const namafile = '{{ $ternakHewan->gambar_hewan ? $ternakHewan->gambar_hewan : 'default.jpg' }}';
            const filePath = '{{ asset('storage/hewan/') }}/' + namafile;

            const link = document.createElement('a');
            link.href = filePath;
            link.download = namafile;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
</x-app>

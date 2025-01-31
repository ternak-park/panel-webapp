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
                                <h3 class="mb-0">{{ $ternakHewan->jenis }}</h3>
                                <p class="text-muted">{{ $ternakHewan->created_at }}</p>
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
                                        <input type="text" value="{{ $ternakHewan->tag }}" class="form-control"
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
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tag Hewan</div>
                                    <div class="input-icon">
                                        <input type="text" value="{{ $ternakHewan->tag }}" class="form-control"
                                            placeholder="Search…" readonly />
                                        <span class="input-icon-addon">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/files -->
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
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Tag Induk</div>
                                        <div class="input-icon">
                                            <input type="text"
                                                value="{{ $ternakHewan->ternakDetail->ternak_induk ?? 'Tidak ada tag induk' }}"
                                                class="form-control" placeholder="Search…" readonly />
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/files -->
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
                                    {{-- <div class="datagrid-title">Kode Kandang</div>
                                    <div class="datagrid-content">{{ $ternakHewan->kandang->kode_kandang }}</div> --}}
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Kode Kandang</div>
                                        <div class="input-icon">
                                            <input type="text" value="{{ $ternakHewan->kandang->kode_kandang }}"
                                                class="form-control" placeholder="Search…" readonly />
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/files -->
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
                                    {{-- <div class="datagrid-title">Kode Kandang</div>
                                    <div class="datagrid-content">{{ $ternakHewan->kandang->kode_kandang }}</div> --}}
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jenis</div>
                                    <div class="datagrid-content">{{ $ternakHewan->jenis }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kelamin</div>
                                    <div class="datagrid-content">{{ $ternakHewan->sex }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tipe</div>
                                    <div class="datagrid-content">{{ $ternakHewan->tipe->nama_tipe }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Status</div>
                                    <div class="datagrid-content">{{ $ternakHewan->status->nama_status }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kondisi</div>
                                    <div class="datagrid-content">{{ $ternakHewan->kesehatan->nama_kesehatan }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Program</div>
                                    <div class="datagrid-content">{{ $ternakHewan->program->nama_program }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Pemilik</div>
                                    <div class="datagrid-content">{{ $ternakHewan->pemilik->name }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tanggal Masuk</div>
                                    <div class="datagrid-content">
                                        {{ $ternakHewan->detail->tanggal_masuk ?? 'Tidak tersedia' }}
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tgl Data Dibuat</div>
                                    <div class="datagrid-content">{{ $ternakHewan->created_at }}</div>
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

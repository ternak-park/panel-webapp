<div class="modal modal-blur fade" id="modal-import-csv" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Hewan dari CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route(name: 'hewan.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">File CSV</label>
                        <input type="file" name="file" class="form-control" accept=".csv, .xlsx, .xls" required>
                    </div>
                    <div class="alert alert-success">
                        <p>Anda dapat <a href="{{ route('hewan.template') }}" class="alert-link">download template
                                CSV</a> untuk memudahkan pengisian data.</p>
                    </div>
                    {{-- <div class="alert alert-info">
                        <h4>Format CSV yang dibutuhkan:</h4>
                        <p>File CSV harus memiliki header kolom berikut:</p>
                        <ul>
                            <li><strong>tag</strong> (wajib): Tag unik untuk hewan</li>
                            <li><strong>sex</strong> (wajib): Jenis kelamin (Jantan/Betina)</li>
                            <li><strong>jenis</strong>: Jenis hewan (Domba/Kambing)</li>
                            <li><strong>ternak_induk</strong>: Tag induk (opsional)</li>
                            <li><strong>tanggal_masuk</strong>: Format tanggal (YYYY-MM-DD, DD/MM/YYYY, MM/DD/YYYY)</li>
                            <li><strong>tipe</strong>: Nama tipe ternak atau ID</li>
                            <li><strong>status</strong>: Nama status ternak atau ID</li>
                            <li><strong>kesehatan</strong>: Nama kesehatan ternak atau ID</li>
                            <li><strong>program</strong>: Nama program ternak atau ID</li>
                            <li><strong>kandang</strong>: Kode kandang ternak atau ID</li>
                            <li><strong>pemilik</strong>: Nama pemilik ternak atau ID</li>
                        </ul>
                        <div class="alert alert-success">
                            <strong>Input Fleksibel:</strong> Untuk kolom tipe, status, kesehatan, program, kandang, dan
                            pemilik, Anda dapat menggunakan:
                            <ul>
                                <li>Nama (contoh: "Admin" untuk pemilik)</li>
                                <li>ID (contoh: "1" untuk ID pemilik)</li>
                            </ul>
                            <strong>Catatan:</strong> Data yang dimasukkan harus ada di database. Jika tidak ditemukan,
                            kolom akan diisi null.
                        </div>
                        <div class="alert alert-success">
                            <strong>Format Tanggal:</strong> Sistem akan otomatis mengenali berbagai format tanggal
                            seperti:
                            <ul>
                                <li>YYYY-MM-DD (2025-05-08)</li>
                                <li>DD/MM/YYYY (08/05/2025)</li>
                                <li>MM/DD/YYYY (05/08/2025)</li>
                                <li>DD-MM-YYYY (08-05-2025)</li>
                            </ul>
                        </div>
                       
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

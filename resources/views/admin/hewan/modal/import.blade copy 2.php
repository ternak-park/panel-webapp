<div class="modal modal-blur fade" id="modal-import-csv" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Hewan dari CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('hewan.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">File CSV</label>
                        <input type="file" name="file" class="form-control" accept=".csv, .xlsx, .xls" required>
                    </div>
                    <div class="alert alert-info">
                        <h4>Format CSV yang dibutuhkan:</h4>
                        <p>File CSV harus memiliki header kolom berikut:</p>
                        <ul>
                            <li><strong>tag</strong> (wajib): Tag unik untuk hewan</li>
                            <li><strong>sex</strong> (wajib): Jenis kelamin (Jantan/Betina)</li>
                            <li><strong>jenis</strong>: Jenis hewan (Domba/Kambing)</li>
                            <li><strong>ternak_induk</strong>: Tag induk (opsional)</li>
                            <li><strong>tanggal_masuk</strong>: Format YYYY-MM-DD</li>
                            <li><strong>ternak_tipe_indeks</strong>: ID tipe ternak</li>
                            <li><strong>ternak_status_indeks</strong>: ID status ternak</li>
                            <li><strong>ternak_kesehatan_indeks</strong>: ID kesehatan ternak</li>
                            <li><strong>ternak_program_indeks</strong>: ID program ternak</li>
                            <li><strong>ternak_kandang_indeks</strong>: ID kandang ternak</li>
                            <li><strong>pemilik_indeks</strong>: ID pemilik ternak</li>
                        </ul>
                        <p>Anda dapat <a href="{{ route('hewan.template') }}" class="alert-link">download template CSV</a> untuk memudahkan pengisian data.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Import Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
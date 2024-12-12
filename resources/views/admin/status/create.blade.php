<script src="{{ asset('assets/js/kode/status.js') }}"></script>


<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('status.store') }}" method="POST" id="statusForm">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Tambah Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Status</label>
                                        <input type="text" class="form-control" name="kode_status" id="kode_status"
                                            name="kode_status" value="{{ old('kode_status') }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Status</label>
                                        <input type="text" class="form-control" name="nama_status" 
                                            name="nama_status" value="{{ old('nama_status') }}"  />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label">Deskripsi
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" maxlength="100">{{ old('deskripsi') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('status.index') }}" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        
        // Gawe Count Text
        const textarea = document.getElementById('deskripsi');
        const ketikan_sakkarepmu = document.getElementById('ketikan_sakkarepmu');

        textarea.addEventListener('input', function() {
            const currentLength = textarea.value.length;
            const maxLength = textarea.getAttribute('maxlength');
            ketikan_sakkarepmu.textContent = `${currentLength}/${maxLength}`;
        });

        // Hapus readonly dan disabled sebelum submit
        document.getElementById('statusForm').addEventListener('submit', function() {
            document.getElementById('kode_status').removeAttribute('readonly');
            document.getElementById('kode_status').removeAttribute('disabled');
        });
    </script>
</x-app>

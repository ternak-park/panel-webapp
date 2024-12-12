<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" method="POST" action="{{ route('tipe.update', $tipe->id) }}" id="statusForm">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4 class="card-title">Tambah Supplier</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode</label>
                                        <input type="text" class="form-control" id="kode_tipe" name="kode_tipe" value="{{ old('tipe', $tipe->kode_tipe) }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Status</label>
                                        <input type="text" class="form-control" name="nama_tipe" value="{{ old('tipe', $tipe->nama_tipe) }}"  />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <label class="form-label">Deskripsi
                                            <span class="form-label-description" id="ketikan_sakkarepmu">0/100</span>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" maxlength="100">{{ old('tipe', $tipe->deskripsi) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('tipe.index') }}" class="btn btn-link">Batal</a>
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
            document.getElementById('kode_tipe').removeAttribute('readonly');
            document.getElementById('kode_tipe').removeAttribute('disabled');
        });
    </script>
</x-app>

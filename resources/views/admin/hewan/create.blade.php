<script src="{{ asset('assets/js/kode/hewan.js') }}"></script>
<x-app>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <form class="card" action="{{ route('hewan.store') }}" method="POST" id="hewanForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Tambah Hewan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tag Hewan</label>
                                        <input type="text" class="form-control" name="ternak_tag" id="ternak_tag"
                                            name="ternak_tag" value="{{ old('ternak_tag') }}" readonly disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ternak Induk</label>
                                        <input type="text" class="form-control" name="ternak_induk"
                                            name="ternak_induk" value="{{ old('ternak_induk') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="sex">Jenis Kelamin</label>
                                        <select class="form-control" id="sex" name="sex" required>
                                            <option value="Jantan" {{ old('sex') == 'Jantan' ? 'selected' : '' }}>Jantan
                                            </option>
                                            <option value="Betina" {{ old('sex') == 'Betina' ? 'selected' : '' }}>Betina
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                        value="{{ old('tanggal_masuk') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <input type="number" class="form-control" id="ternak_status_indeks"
                                            name="ternak_status_indeks" value="{{ old('ternak_status_indeks') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tipe</label>
                                        <input type="number" class="form-control" id="ternak_tipe_indeks"
                                            name="ternak_tipe_indeks" value="{{ old('ternak_tipe_indeks') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kesehatan</label>
                                        <input type="number" class="form-control" id="ternak_kesehatan_indeks"
                                            name="ternak_kesehatan_indeks" value="{{ old('ternak_kesehatan_indeks') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kandang</label>
                                        <input type="number" class="form-control" id="ternak_program_indeks"
                                            name="ternak_program_indeks" value="{{ old('ternak_program_indeks') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kandang Ternak</label>
                                        <input type="number" class="form-control" id="ternak_kandang_indeks"
                                            name="ternak_kandang_indeks" value="{{ old('ternak_kandang_indeks') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pemilik</label>
                                        <input type="number" class="form-control" id="pemilik_indeks"
                                            name="pemilik_indeks" value="{{ old('pemilik_indeks') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_hewan">Gambar Hewan</label>
                                    <input type="file" class="form-control" id="gambar_hewan" name="gambar_hewan">
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
        document.getElementById('hewanForm').addEventListener('submit', function() {
            document.getElementById('kode_hewan').removeAttribute('readonly');
            document.getElementById('kode_hewan').removeAttribute('disabled');
        });
    </script>
    @if ($errors->any())
        <script>
            // Menampilkan semua error dengan SweetAlert
            Swal.fire({
                title: 'Oops!',
                text: '{{ $errors->first() }}', // Pesan error pertama
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            // Menampilkan pesan sukses dengan SweetAlert
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    @endif
</x-app>

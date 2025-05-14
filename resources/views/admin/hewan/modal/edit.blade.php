<!-- File: resources/views/admin/hewan/modal/edit.blade.php -->
<script src="{{ asset('assets/js/tom-select/modal/hewan.js') }}"></script>
<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editHewanForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <!-- Basic Information -->
                    <h4 class="mb-3">Informasi Dasar</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Ternak</label>
                                <input type="text" class="form-control" id="edit-ternak-tag" name="ternak_tag"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="edit-sex" name="sex_hewan" required>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Ternak</label>
                                <select type="text" class="form-select" id="edit-select-labels-jenis"
                                    name="ternak_jenis_indeks">
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_jenis ?? '' }}&lt;/span&gt;'>
                                            {{ $item->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gambar_hewan">Gambar Hewan</label>
                                <input type="file" class="form-control" id="edit-gambar-hewan" name="gambar_hewan">
                            </div>
                        </div>
                    </div>

                    <!-- Parent and Family Information -->
                    <h4 class="mb-3 mt-4">Informasi Keluarga</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Induk Betina</label>
                                <input type="text" class="form-control" id="edit-ternak-induk-betina" name="tag_induk_betina">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Induk Jantan</label>
                                <input type="text" class="form-control" id="edit-ternak-induk-jantan" name="tag_induk_jantan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Anak</label>
                                <input type="text" class="form-control" id="edit-ternak-tag-anak" name="tag_anak">
                            </div>
                        </div>
                    </div>

                    <!-- Ownership and Location Information -->
                    <h4 class="mb-3 mt-4">Kandang dan Kepemilikan</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kandang</label>
                                <select class="form-select" id="edit-select-labels-kandang"
                                    name="ternak_kandang_indeks">
                                    @foreach ($kandang as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_kandang }}&lt;/span&gt;'>
                                            {{ $item->kode_kandang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Pemilik</label>
                                <select class="form-select" id="edit-select-pemilik" name="pemilik_indeks">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $item->gambar_profile ? asset('storage/' . $item->gambar_profile) : '' }})'></span>">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Status and Program Information -->
                    <h4 class="mb-3 mt-4">Status dan Program</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Status Ternak</label>
                                <select type="text" class="form-select" id="edit-select-labels-status"
                                    name="ternak_status_indeks">
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_status ?? '' }}&lt;/span&gt;'>
                                            {{ $item->nama_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kesehatan</label>
                                <select class="form-select" id="edit-select-labels-kesehatan"
                                    name="ternak_kesehatan_indeks">
                                    @foreach ($kesehatan as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_kesehatan ?? '' }}&lt;/span&gt;'>
                                            {{ $item->nama_kesehatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Program</label>
                                <select class="form-select" id="edit-select-labels-program"
                                    name="ternak_program_indeks">
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_program ?? '' }}&lt;/span&gt;'>
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Time and Age Information -->
                    <h4 class="mb-3 mt-4">Tanggal dan Berat</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="edit-tanggal-masuk" name="tanggal_masuk"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit-tgl-terjual-mati">Tanggal Terjual/Mati</label>
                                <input type="date" class="form-control" id="edit-tgl-terjual-mati" name="tgl_terjual_mati">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit-ternak-usia">Usia (bulan)</label>
                                <input type="text" class="form-control" id="edit-ternak-usia" name="ternak_usia">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit-lama-hari-dipeternakan">Lama hari di peternakan</label>
                                <input type="number" class="form-control" id="edit-lama-hari-dipeternakan" name="lama_hari_dipeternakan">
                            </div>
                        </div>
                    </div>

                    <!-- Weight Information -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="edit-bb-masuk-lahir">Berat Badan Masuk/Lahir (Kg)</label>
                                <input type="number" class="form-control" id="edit-bb-masuk-lahir" name="bb_masuk_lahir" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="edit-bb-terbaru">Berat Badan Terbaru (Kg)</label>
                                <input type="number" class="form-control" id="edit-bb-terbaru" name="bb_terbaru" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="edit-tgl-timbang-terbaru">Tanggal Timbang Terbaru</label>
                                <input type="date" class="form-control" id="edit-tgl-timbang-terbaru" name="tgl_timbang_terbaru">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('editHewanForm').addEventListener('submit', function() {
        document.getElementById('edit-ternak-tag').removeAttribute('readonly');
        document.getElementById('edit-ternak-tag').removeAttribute('disabled');
    });
</script>
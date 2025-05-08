<!-- File: resources/views/admin/hewan/modal/edit.blade.php -->
<script src="{{ asset('assets/js/tom-select/modal/hewan.js') }}"></script>
<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editHewanForm" action="" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
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
                                <label class="form-label">Ternak Induk</label>
                                {{-- <input type="text" class="form-control" id="edit-ternak-induk" name="ternak_induk"> --}}
                                <select type="text" class="form-select" id="select-labels-modal-induk"
                                    name="ternak_induk">
                                    @foreach ($hewanInduk as $item)
                                        <option value="{{ $item->tag }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->tag }}&lt;/span&gt;'>
                                            {{ $item->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="edit-sex" name="sex" required>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="edit-tanggal-masuk" name="tanggal_masuk"
                                    required>
                            </div>
                        </div>

                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Status Ternak</label>
                                <select type="text" class="form-select" id="select-labels-modal-status"
                                    name="ternak_status_indeks">
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_status }}&lt;/span&gt;'>
                                            {{ $item->nama_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tipe Ternak</label>
                                <select class="form-select" id="select-labels-modal-tipe" name="ternak_tipe_indeks">
                                    @foreach ($tipe as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_tipe }}&lt;/span&gt;'>
                                            {{ $item->nama_tipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kesehatan</label>
                                <select class="form-select" id="select-labels-modal-kesehatan"
                                    name="ternak_kesehatan_indeks">
                                    @foreach ($kesehatan as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_kesehatan }}&lt;/span&gt;'>
                                            {{ $item->nama_kesehatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Program</label>
                                <select class="form-select" id="select-labels-modal-program"
                                    name="ternak_program_indeks">
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_program }}&lt;/span&gt;'>
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kandang</label>
                                <select class="form-select" id="select-labels-modal-kandang"
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
                                <select class="form-select" id="select-modal-pemilik"name="pemilik_indeks">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $item->gambar_profile ? asset('storage/' . $item->gambar_profile) : '' }})'></span>"
                                            {{ old('user_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
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

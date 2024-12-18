<script src="{{ asset('assets/js/kode/hewan.js') }}"></script>
<script src="{{ asset('assets/js/tom-select/hewan.js') }}"></script>
<form action="{{ route('hewan.update',':id') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <input type="hidden" id="ternak_tag" name="ternak_tag"> --}}
    <input type="hidden" id="tag" name="tag">

    <div class="modal modal-blur fade" id="modal-edit-hewan" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Hewan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Hewan</label>
                                <input type="text" class="form-control" id="ternak_tag" name="ternak_tag"
                                    value="{{ old('ternak_tag') }}" disabled readonly>
                                @error('ternak_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Ternak Induk</label>
                                <input type="text" class="form-control" id="ternak_induk" name="ternak_induk"
                                    value="{{ old('ternak_induk') }}">
                                @error('ternak_induk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sex" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="sex" name="sex" required>
                                    <option value="Jantan" {{ old('sex') == 'Jantan' ? 'selected' : '' }}>Jantan
                                    </option>
                                    <option value="Betina" {{ old('sex') == 'Betina' ? 'selected' : '' }}>Betina
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                    value="{{ old('tanggal_masuk') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Pilih Ternak</label>
                                <select class="form-select" id="select-labels-status" name="ternak_status_indeks">
                                    @foreach ($statusTernak as $status)
                                        <option value="{{ $status->id }}"
                                            data-custom-properties='<span class="badge bg-primary-lt">{{ $status->kode_status }}</span>'>
                                            {{ $status->nama_status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tipe</label>
                                <select class="form-select" id="select-labels-tipe" name="ternak_tipe_indeks">
                                    @foreach ($tipeTernak as $tipe)
                                        <option value="{{ $tipe->id }}"
                                            data-custom-properties='<span class="badge bg-primary-lt">{{ $tipe->kode_tipe }}</span>'>
                                            {{ $tipe->nama_tipe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kesehatan</label>
                                <select class="form-select" id="select-labels-kesehatan" name="ternak_kesehatan_indeks">
                                    @foreach ($kesehatanTernak as $kesehatan)
                                        <option value="{{ $kesehatan->id }}"
                                            data-custom-properties='<span class="badge bg-primary-lt">{{ $kesehatan->id }}</span>'>
                                            {{ $kesehatan->nama_kesehatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Program</label>
                                <select class="form-select" id="select-labels-program" name="ternak_program_indeks">
                                    @foreach ($programTernak as $program)
                                        <option value="{{ $program->id }}"
                                            data-custom-properties='<span class="badge bg-primary-lt">{{ $program->id }}</span>'>
                                            {{ $program->nama_program }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kandang Ternak</label>
                                <select class="form-select" id="select-labels-kandang" name="ternak_kandang_indeks">
                                    @foreach ($kandangTernak as $kandang)
                                        <option value="{{ $kandang->id }}"
                                            data-custom-properties='<span class="badge bg-primary-lt">{{ $kandang->id }}</span>'>
                                            {{ $kandang->kode_kandang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Pemilik</label>
                                <select class="form-select" id="select-pemilik" name="pemilik_indeks">
                                    @foreach ($pemilikTernak as $user)
                                        <option value="{{ $user->id }}"
                                            data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $user->gambar_profile ? asset('storage/' . $user->gambar_profile) : '' }})'></span>"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="gambar_hewan" class="form-label">Gambar Hewan</label>
                        <input type="file" class="form-control" id="gambar_hewan" name="gambar_hewan">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>



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
        document.getElementById('ternak_tag').removeAttribute('readonly');
        document.getElementById('ternak_tag').removeAttribute('disabled');
    });
</script>

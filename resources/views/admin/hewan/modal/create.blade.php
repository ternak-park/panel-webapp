<script src="{{ asset('assets/js/kode/hewan.js') }}"></script>
<script src="{{ asset('assets/js/tom-select/hewan.js') }}"></script>
<form action="{{ route('hewan.store') }}" method="POST" enctype="multipart/form-data" id="hewanForm">
    @csrf
    <div class="modal modal-blur fade" id="modal-tambah-hewan" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Hewan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Basic Information -->
                    <h4 class="mb-3">Informasi Dasar</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Hewan</label>
                                <input type="text" class="form-control" name="ternak_tag" id="ternak_tag"
                                    value="{{ old('ternak_tag') }}" disabled readonly>
                                @error('ternak_tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sex">Jenis Kelamin</label>
                                <select class="form-control" id="sex" name="sex_hewan" required>
                                    <option value="Jantan" {{ old('sex_hewan') == 'Jantan' ? 'selected' : '' }}>Jantan
                                    </option>
                                    <option value="Betina" {{ old('sex_hewan') == 'Betina' ? 'selected' : '' }}>Betina
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Ternak</label>
                                <select type="text" class="form-select" id="select-labels-jenis"
                                    name="ternak_jenis_indeks">
                                    @foreach ($jenisTernak as $jenis)
                                        <option value="{{ $jenis->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $jenis->kode_jenis }}&lt;/span&gt;'>
                                            {{ $jenis->nama_jenis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="gambar_hewan">Gambar Hewan</label>
                                <input type="file" class="form-control" id="gambar_hewan" name="gambar_hewan">
                            </div>
                        </div>
                    </div>

                    <!-- Parent and Family Information -->
                    <h4 class="mb-3 mt-4">Informasi Keluarga</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Induk Betina</label>
                                <select type="text" class="form-select" id="select-labels-induk-betina"
                                    name="tag_induk_betina">
                                    <option value="">Tidak Ada Induk Betina</option>
                                    @foreach ($hewanInduk->where('sex_hewan', 'Betina') as $induk)
                                        <option value="{{ $induk->tag_hewan }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $induk->tag_hewan }}&lt;/span&gt;'>
                                            {{ $induk->tag_hewan }}
                                            ({{ $induk->jenis ? $induk->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Induk Jantan</label>
                                <select type="text" class="form-select" id="select-labels-induk-jantan"
                                    name="tag_induk_jantan">
                                    <option value="">Tidak Ada Induk Jantan</option>
                                    @foreach ($hewanInduk->where('sex_hewan', 'Jantan') as $induk)
                                        <option value="{{ $induk->tag_hewan }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $induk->tag_hewan }}&lt;/span&gt;'>
                                            {{ $induk->tag_hewan }}
                                            ({{ $induk->jenis ? $induk->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tag Anak</label>
                                <select type="text" class="form-select" id="select-labels-anak" name="tag_anak">
                                    <option value="">Tidak Ada Anak</option>
                                    @foreach ($hewan as $anak)
                                        <option value="{{ $anak->tag_hewan }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $anak->tag_hewan }}&lt;/span&gt;'>
                                            {{ $anak->tag_hewan }}
                                            ({{ $anak->jenis ? $anak->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Ownership and Location Information -->
                    <h4 class="mb-3 mt-4">Kandang dan Kepemilikan</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kandang Ternak</label>
                                <select type="text" class="form-select" id="select-labels-kandang"
                                    name="ternak_kandang_indeks">
                                    @foreach ($kandangTernak as $kandang)
                                        <option value="{{ $kandang->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $kandang->kode_kandang }}&lt;/span&gt;'>
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

                    <!-- Status and Program Information -->
                    <h4 class="mb-3 mt-4">Status dan Program</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status Ternak</label>
                                <select type="text" class="form-select" id="select-labels-status"
                                    name="ternak_status_indeks">
                                    @foreach ($statusTernak as $status)
                                        <option value="{{ $status->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $status->kode_status }}&lt;/span&gt;'>
                                            {{ $status->nama_status }}
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
                                <select type="text" class="form-select" id="select-labels-kesehatan"
                                    name="ternak_kesehatan_indeks">
                                    @foreach ($kesehatanTernak as $kesehatan)
                                        <option value="{{ $kesehatan->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $kesehatan->kode_kesehatan }}&lt;/span&gt;'>
                                            {{ $kesehatan->nama_kesehatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Program</label>
                                <select type="text" class="form-select" id="select-labels-program"
                                    name="ternak_program_indeks">
                                    @foreach ($programTernak as $program)
                                        <option value="{{ $program->id }}"
                                            data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $program->kode_program }}&lt;/span&gt;'>
                                            {{ $program->nama_program }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Time and Age Information -->
                    <h4 class="mb-3 mt-4">Tanggal dan Berat</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_masuk">Tanggal Masuk/Lahir</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                    value="{{ old('tanggal_masuk') ?? date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl_terjual_mati">Tanggal Terjual/Mati</label>
                                <input type="date" class="form-control" id="tgl_terjual_mati"
                                    name="tgl_terjual_mati" value="{{ old('tgl_terjual_mati') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ternak_usia">Usia (bulan)</label>
                                <input type="text" class="form-control" id="ternak_usia" name="ternak_usia"
                                    value="{{ old('ternak_usia') ?? '0' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lama_hari_dipeternakan">Lama hari di peternakan</label>
                                <input type="number" class="form-control" id="lama_hari_dipeternakan"
                                    name="lama_hari_dipeternakan" value="{{ old('lama_hari_dipeternakan') ?? '0' }}">
                            </div>
                        </div>
                    </div>

                    <!-- Weight Information -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="bb_masuk_lahir">Berat Badan Masuk/Lahir (Kg)</label>
                                <input type="number" class="form-control" id="bb_masuk_lahir" name="bb_masuk_lahir"
                                    step="0.01" value="{{ old('bb_masuk_lahir') ?? '0' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="bb_terbaru">Berat Badan Terbaru (Kg)</label>
                                <input type="number" class="form-control" id="bb_terbaru" name="bb_terbaru"
                                    step="0.01" value="{{ old('bb_terbaru') ?? '0' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tgl_timbang_terbaru">Tanggal Timbang Terbaru</label>
                                <input type="date" class="form-control" id="tgl_timbang_terbaru"
                                    name="tgl_timbang_terbaru"
                                    value="{{ old('tgl_timbang_terbaru') ?? date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
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
    // Hapus readonly dan disabled sebelum submit
    document.getElementById('hewanForm').addEventListener('submit', function() {
        document.getElementById('ternak_tag').removeAttribute('readonly');
        document.getElementById('ternak_tag').removeAttribute('disabled');
    });
</script>

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
                    <div class="nav-tabs-responsive">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#edit-tab-basic" class="nav-link active px-3" data-bs-toggle="tab" aria-selected="true" role="tab">
                                    Informasi Dasar
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit-tab-family" class="nav-link px-3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                    Keluarga
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit-tab-ownership" class="nav-link px-3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                    Kepemilikan
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit-tab-status" class="nav-link px-3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                    Status & Program
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit-tab-dates" class="nav-link px-3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                    Tanggal & Berat
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content pt-3">
                        <!-- Tab 1: Basic Information -->
                        <div id="edit-tab-basic" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tag Ternak</label>
                                        <input type="text" class="form-control px-2" id="edit-ternak-tag" name="ternak_tag" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Jenis Kelamin</label>
                                        <select class="form-control px-2" id="edit-sex" name="sex_hewan" required>
                                            <option value="Jantan">Jantan</option>
                                            <option value="Betina">Betina</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Jenis Ternak</label>
                                        <select type="text" class="form-select px-2" id="edit-select-labels-jenis" name="ternak_jenis_indeks">
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_jenis ?? '' }}&lt;/span&gt;'>
                                                    {{ $item->nama_jenis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3 mt-2">
                                        <label class="form-label ps-1">Gambar Hewan</label>
                                        <input type="file" class="form-control px-2" id="edit-gambar-hewan" name="gambar_hewan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 2: Family Information -->
                        <div id="edit-tab-family" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tag Induk Betina</label>
                                        <select type="text" class="form-select px-2" id="edit-select-labels-induk-betina" name="tag_induk_betina">
                                            <option value="">Tidak Ada Induk Betina</option>
                                            @foreach ($hewanInduk->where('sex_hewan', 'Betina') as $induk)
                                                <option value="{{ $induk->tag_hewan }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $induk->tag_hewan }}&lt;/span&gt;'>
                                                    {{ $induk->tag_hewan }} ({{ $induk->jenis ? $induk->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tag Induk Jantan</label>
                                        <select type="text" class="form-select px-2" id="edit-select-labels-induk-jantan" name="tag_induk_jantan">
                                            <option value="">Tidak Ada Induk Jantan</option>
                                            @foreach ($hewanInduk->where('sex_hewan', 'Jantan') as $induk)
                                                <option value="{{ $induk->tag_hewan }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $induk->tag_hewan }}&lt;/span&gt;'>
                                                    {{ $induk->tag_hewan }} ({{ $induk->jenis ? $induk->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tag Anak</label>
                                        <select type="text" class="form-select px-2" id="edit-select-labels-anak" name="tag_anak">
                                            <option value="">Tidak Ada Anak</option>
                                            @foreach ($hewan as $anak)
                                                <option value="{{ $anak->tag_hewan }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $anak->tag_hewan }}&lt;/span&gt;'>
                                                    {{ $anak->tag_hewan }} ({{ $anak->jenis ? $anak->jenis->nama_jenis : 'Jenis tidak tersedia' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 3: Ownership Information -->
                        <div id="edit-tab-ownership" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Kandang</label>
                                        <select class="form-select px-2" id="edit-select-labels-kandang" name="ternak_kandang_indeks">
                                            @foreach ($kandang as $item)
                                                <option value="{{ $item->id }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_kandang }}&lt;/span&gt;'>
                                                    {{ $item->kode_kandang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Pemilik</label>
                                        <select class="form-select px-2" id="edit-select-pemilik" name="pemilik_indeks">
                                            @foreach ($user as $item)
                                                <option value="{{ $item->id }}" data-custom-properties="<span class='avatar avatar-xs' style='background-image: url({{ $item->gambar_profile ? asset('storage/' . $item->gambar_profile) : '' }})'></span>">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 4: Status and Program Information -->
                        <div id="edit-tab-status" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Status Ternak</label>
                                        <select type="text" class="form-select px-2" id="edit-select-labels-status" name="ternak_status_indeks">
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_status ?? '' }}&lt;/span&gt;'>
                                                    {{ $item->nama_status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Kesehatan</label>
                                        <select class="form-select px-2" id="edit-select-labels-kesehatan" name="ternak_kesehatan_indeks">
                                            @foreach ($kesehatan as $item)
                                                <option value="{{ $item->id }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_kesehatan ?? '' }}&lt;/span&gt;'>
                                                    {{ $item->nama_kesehatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Program</label>
                                        <select class="form-select px-2" id="edit-select-labels-program" name="ternak_program_indeks">
                                            @foreach ($program as $item)
                                                <option value="{{ $item->id }}" data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $item->kode_program ?? '' }}&lt;/span&gt;'>
                                                    {{ $item->nama_program }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 5: Dates and Weight Information -->
                        <div id="edit-tab-dates" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tanggal Masuk</label>
                                        <input type="date" class="form-control px-2" id="edit-tanggal-masuk" name="tanggal_masuk" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tanggal Terjual/Mati</label>
                                        <input type="date" class="form-control px-2" id="edit-tgl-terjual-mati" name="tgl_terjual_mati">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Usia (bulan)</label>
                                        <input type="text" class="form-control px-2" id="edit-ternak-usia" name="ternak_usia">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Lama hari di peternakan</label>
                                        <input type="number" class="form-control px-2" id="edit-lama-hari-dipeternakan" name="lama_hari_dipeternakan">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Berat Badan Masuk/Lahir (Kg)</label>
                                        <input type="number" class="form-control px-2" id="edit-bb-masuk-lahir" name="bb_masuk_lahir" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Berat Badan Terbaru (Kg)</label>
                                        <input type="number" class="form-control px-2" id="edit-bb-terbaru" name="bb_terbaru" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Tanggal Timbang Terbaru</label>
                                        <input type="date" class="form-control px-2" id="edit-tgl-timbang-terbaru" name="tgl_timbang_terbaru">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        Perbarui
                    </button>
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
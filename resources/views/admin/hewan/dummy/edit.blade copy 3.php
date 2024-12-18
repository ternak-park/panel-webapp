<!-- File: resources/views/admin/hewan/modal/edit.blade.php -->
<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <input type="text" class="form-control" id="edit-ternak-tag" name="ternak_tag" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Ternak Induk</label>
                                <input type="text" class="form-control" id="edit-ternak-induk" name="ternak_induk">
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="edit-sex" name="sex" required>
                                    <option value="jantan">Jantan</option>
                                    <option value="betina">Betina</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="edit-tanggal-masuk" name="tanggal_masuk" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Status Ternak</label>
                                <select class="form-select" name="ternak_status_indeks">
                                    @foreach($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Tipe Ternak</label>
                                <select class="form-select" name="ternak_tipe_indeks">
                                    @foreach($tipe as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_tipe }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kesehatan</label>
                                <select class="form-select" name="ternak_kesehatan_indeks">
                                    @foreach($kesehatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kesehatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Program</label>
                                <select class="form-select" name="ternak_program_indeks">
                                    @foreach($program as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kandang</label>
                                <select class="form-select" name="ternak_kandang_indeks">
                                    @foreach($kandang as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode_kandang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Pemilik</label>
                                <select class="form-select" name="pemilik_indeks">
                                    @foreach($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
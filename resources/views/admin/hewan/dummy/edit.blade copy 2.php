<!-- Modal Edit Hewan -->
<div class="modal fade" id="modal-edit-hewan" tabindex="-1" aria-labelledby="modal-edit-hewan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-edit-hewan">Edit Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editHewanForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-ternak-tag" class="form-label">Tag Ternak</label>
                        <input type="text" class="form-control" id="edit-ternak-tag" name="ternak_tag" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-ternak-induk" class="form-label">Induk Ternak</label>
                        <input type="text" class="form-control" id="edit-ternak-induk" name="ternak_induk">
                    </div>
                    <div class="mb-3">
                        <label for="edit-sex" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="edit-sex" name="sex">
                            <option value="jantan">Jantan</option>
                            <option value="betina">Betina</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-tanggal-masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="edit-tanggal-masuk" name="tanggal_masuk" required>
                    </div>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

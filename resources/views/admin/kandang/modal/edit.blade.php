<div class="modal modal-blur fade" id="modal-edit-kandang" tabindex="-1" role="dialog" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kandang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editKandangForm" action="" method="POST">
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
                                <a href="#edit-tab-detail" class="nav-link px-3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                    Detail Kandang
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
                                        <label class="form-label ps-1">Kode Kandang</label>
                                        <input type="text" class="form-control px-2" id="edit-kode-kandang" name="kode_kandang" required>
                                        <small class="form-hint">Contoh: KD-001, KD-002, dll.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Kapasitas Total</label>
                                        <input type="number" class="form-control px-2" id="edit-total-ternak-kandang" name="total_ternak_kandang" min="0" required>
                                        <small class="form-hint">Jumlah maksimum hewan yang dapat ditampung</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Pemilik</label>
                                        <select class="form-select px-2" id="edit-select-labels-pemilik" name="nama_pemilik_id" required>
                                            <option value="">-- Pilih Pemilik --</option>
                                            @foreach($pemilik as $p)
                                                <option value="{{ $p->id }}"
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $p->id }}&lt;/span&gt;'>
                                                    {{ $p->nama_pemilik }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab 2: Detail Kandang -->
                        <div id="edit-tab-detail" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Total Ternak (Terisi)</label>
                                        <input type="number" class="form-control px-2" id="edit-total-ternak" name="total_ternak" min="0">
                                        <small class="form-hint">Jumlah hewan yang saat ini ada di kandang</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Total BB (kg)</label>
                                        <input type="number" class="form-control px-2" id="edit-total-bb" name="total_bb" min="0" step="0.01">
                                        <small class="form-hint">Total berat badan seluruh hewan dalam kandang</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-2">
                                        <label class="form-label ps-1">Petugas</label>
                                        <select class="form-select px-2" id="edit-select-labels-petugas" name="nama_petugas_id">
                                            <option value="">-- Pilih Petugas --</option>
                                            @foreach($petugas as $p)
                                                <option value="{{ $p->id }}"
                                                    data-custom-properties='&lt;span class="badge bg-primary-lt"&gt;{{ $p->id }}&lt;/span&gt;'>
                                                    {{ $p->nama_petugas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize TomSelect for edit form select elements if available
        if (typeof TomSelect !== 'undefined') {
            window.tomSelectInstances = window.tomSelectInstances || {};
            
            // Initialize for pemilik select in edit form
            if (document.getElementById('edit-select-labels-pemilik')) {
                window.tomSelectInstances['edit-select-labels-pemilik'] = new TomSelect('#edit-select-labels-pemilik', {
                    create: false,
                    sortField: {
                        field: 'text',
                        direction: 'asc'
                    },
                    render: {
                        option: function(data, escape) {
                            return '<div>' +
                                   (data.customProperties ? data.customProperties : '') +
                                   '<span class="ms-2">' + escape(data.text) + '</span>' +
                                   '</div>';
                        },
                        item: function(data, escape) {
                            return '<div>' +
                                   (data.customProperties ? data.customProperties : '') +
                                   '<span class="ms-2">' + escape(data.text) + '</span>' +
                                   '</div>';
                        }
                    }
                });
            }
            
            // Initialize for petugas select in edit form
            if (document.getElementById('edit-select-labels-petugas')) {
                window.tomSelectInstances['edit-select-labels-petugas'] = new TomSelect('#edit-select-labels-petugas', {
                    create: false,
                    sortField: {
                        field: 'text',
                        direction: 'asc'
                    },
                    render: {
                        option: function(data, escape) {
                            return '<div>' +
                                   (data.customProperties ? data.customProperties : '') +
                                   '<span class="ms-2">' + escape(data.text) + '</span>' +
                                   '</div>';
                        },
                        item: function(data, escape) {
                            return '<div>' +
                                   (data.customProperties ? data.customProperties : '') +
                                   '<span class="ms-2">' + escape(data.text) + '</span>' +
                                   '</div>';
                        }
                    }
                });
            }
        }
    });
</script>
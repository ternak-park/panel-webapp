<script src="{{ asset('assets/js/kode/hewan.js') }}"></script>


<x-app>
    <div class="container">
        <h2>Tambah Ternak Baru</h2>
        
        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        {{-- Form to add new ternak --}}
        <form action="{{ route('hewan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="ternak_tag">Tag Ternak</label>
                <input type="text" class="form-control" id="ternak_tag" name="ternak_tag" value="{{ old('ternak_tag') }}" required>
            </div>
    
            <div class="form-group">
                <label for="ternak_induk">Ternak Induk</label>
                <input type="text" class="form-control" id="ternak_induk" name="ternak_induk" value="{{ old('ternak_induk') }}">
            </div>
    
            <div class="form-group">
                <label for="sex">Jenis Kelamin</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="Jantan" {{ old('sex') == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="Betina" {{ old('sex') == 'Betina' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
            </div>
    
            <div class="form-group">
                <label for="ternak_status_indeks">Status Ternak</label>
                <input type="number" class="form-control" id="ternak_status_indeks" name="ternak_status_indeks" value="{{ old('ternak_status_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="ternak_tipe_indeks">Tipe Ternak</label>
                <input type="number" class="form-control" id="ternak_tipe_indeks" name="ternak_tipe_indeks" value="{{ old('ternak_tipe_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="ternak_kesehatan_indeks">Kesehatan Ternak</label>
                <input type="number" class="form-control" id="ternak_kesehatan_indeks" name="ternak_kesehatan_indeks" value="{{ old('ternak_kesehatan_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="ternak_program_indeks">Program Ternak</label>
                <input type="number" class="form-control" id="ternak_program_indeks" name="ternak_program_indeks" value="{{ old('ternak_program_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="ternak_kandang_indeks">Kandang Ternak</label>
                <input type="number" class="form-control" id="ternak_kandang_indeks" name="ternak_kandang_indeks" value="{{ old('ternak_kandang_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="pemilik_indeks">Pemilik Ternak</label>
                <input type="number" class="form-control" id="pemilik_indeks" name="pemilik_indeks" value="{{ old('pemilik_indeks') }}">
            </div>
    
            <div class="form-group">
                <label for="gambar_hewan">Gambar Hewan</label>
                <input type="file" class="form-control" id="gambar_hewan" name="gambar_hewan">
            </div>
    
            <button type="submit" class="btn btn-primary">Simpan Ternak</button>
        </form>
    </div>
</x-app>

<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Supplier Details</h1>
                <div class="card">
                    <div class="card-header">Supplier Information</div>
                    <div class="card-body">
                        <p><strong>Kode:</strong> {{ $supplier->kode }}</p>
                        <p><strong>Jenis Pakan:</strong> {{ $supplier->jenis_pakan }}</p>
                        <p><strong>Supplier:</strong> {{ $supplier->nama }}</p>
                        <p><strong>Harga Per KG:</strong> {{ $supplier->harga_per_kg }}</p>
                        <p><strong>Alamat:</strong> {{ $supplier->alamat }}</p>
                        <p><strong>Telepon:</strong> {{ $supplier->telepon }}</p>
                    </div>
                </div>

                <a href="{{ route('suppliers.index') }}" class="btn btn-primary mt-3">Back to Suppliers</a>
            </div>
        </div>
    </div>
</x-app>

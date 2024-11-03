<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Inventory Barang</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createBarangModal">Add New Item</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->status }}</td>
                <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateBarangModal-{{ $item->id }}">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createBarangModal" tabindex="-1" aria-labelledby="createBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Fields for new item creation -->
                    <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control mb-2" required>
                    <input type="text" name="jenis_barang" placeholder="Jenis Barang" class="form-control mb-2" required>
                    <input type="number" name="stock" placeholder="Stock" class="form-control mb-2" required>

                    <!-- Status Dropdown -->
                    <select name="status" class="form-control mb-2" required>
                        <option value="">Select Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="stok habis">Stok Habis</option>
                        <option value="sedang diantar">Sedang Diantar</option>
                    </select>

                    <!-- Harga Satuan with Rp prefix -->
                    <div class="input-group mb-2">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga_satuan" placeholder="Harga Satuan" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal (one for each item) -->
@foreach($barang as $item)
<div class="modal fade" id="updateBarangModal-{{ $item->id }}" tabindex="-1" aria-labelledby="updateBarangModalLabel-{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('barang.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Update Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Fields for updating the item -->
                    <input type="text" name="nama_barang" value="{{ $item->nama_barang }}" class="form-control mb-2" required>
                    <input type="text" name="jenis_barang" value="{{ $item->jenis_barang }}" class="form-control mb-2" required>
                    <input type="number" name="stock" value="{{ $item->stock }}" class="form-control mb-2" required>

                    <!-- Status Dropdown -->
                    <select name="status" class="form-control mb-2" required>
                        <option value="tersedia" {{ $item->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="stok habis" {{ $item->status == 'stok habis' ? 'selected' : '' }}>Stok Habis</option>
                        <option value="sedang diantar" {{ $item->status == 'sedang diantar' ? 'selected' : '' }}>Sedang Diantar</option>
                    </select>

                    <!-- Harga Satuan with Rp prefix -->
                    <div class="input-group mb-2">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga_satuan" value="{{ $item->harga_satuan }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

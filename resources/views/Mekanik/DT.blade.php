<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Detail Transaksi</h1>
        <form action="{{ route('tambahDT') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="number" name="user_id" value="{{ $user->id }}" id="user_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="pesan_id" class="form-label">Pesan ID</label>
                <input type="number" name="pesan_id" value="{{ $pesan->id }}" id="pesan_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="transaksi_id" class="form-label">Transaksi ID</label>
                <input type="number" name="transaksi_id" value="{{ $transaksi->id }}" id="transaksi_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang ID</label>
                <input type="number" name="barang_id" id="barang_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="biaya_penanganan" class="form-label">Biaya Penanganan</label>
                <input type="text" name="biaya_penanganan" id="biaya_penanganan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
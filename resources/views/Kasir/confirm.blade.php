<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>

    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #495057;
}

/* Container */
.container {
    max-width: 1200px;
}

/* Card */
.card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
}

/* Heading */
.card h1 {
    color: #007bff;
    font-size: 2rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
}

/* Form Controls */
.form-control {
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 1rem;
    padding: 0.75rem 1rem;
}

.form-select {
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 0.75rem 1rem;
}

/* Buttons */
.btn {
    border-radius: 4px;
    font-size: 1rem;
    padding: 0.75rem;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    color: #ffffff;
}

.btn-danger:hover {
    background-color: #c82333;
}
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 shadow-sm">
                    <h1 class="text-center mb-4">Konfirmasi Pembayaran</h1>
                    <form action="{{ route('editconfirm', $pesan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Informasi Orderan</label>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="user_id" value="{{ $pesan->user_id }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="merek_motor" value="{{ $pesan->merek_motor }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="seri_motor" value="{{ $pesan->seri_motor }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="mesin_motor" value="{{ $pesan->mesin_motor }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="no_plat" value="{{ $pesan->no_plat }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="jenis_service" value="{{ $pesan->jenis_service }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="tgl_service" value="{{ $pesan->tgl_service }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control" name="deskripsi" value="{{ $pesan->deskripsi }}" disabled>
                                </div>
                                <div class="col-12 mb-2">
                                    {{-- <input type="text" class="form-control" value="{{ $pesan->bukti->foto }}" disabled> --}}
                                </div>
                            </div>
                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                            <select id="status_pembayaran" name="status_pembayaran" required class="form-select mb-3">
                                <option value="belum dibayar">Belum Dibayar</option>
                                <option value="Sedang dikonfirmasi">Sedang Dikomfirmasi</option>
                                <option value="lunas">Lunas</option>
                                <option value="dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                            <a href="{{ route('homeKasir', $pesan->user->id) }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>

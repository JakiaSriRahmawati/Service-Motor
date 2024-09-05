<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Mekanik</title>
    <style>
        .card {
            border: 1px solid #e3e3e3;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            margin: 0 5px;
        }

        .btn-outline-primary {
            border-color: #0d6efd;
            color: #0d6efd;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('template.navMekanik')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg p-4 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Tabel Booking</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Pengguna</th>
                                        <th>Nama</th>
                                        <th>Merek Motor</th>
                                        <th>Mesin Motor</th>
                                        <th>Seri Motor</th>
                                        <th>Plat Nomber</th>
                                        <th>Jenis Service</th>
                                        <th>Deskripsi</th>
                                        <th>Status Orderan</th>
                                        <th>Status Service</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($p as $item)
                                        <tr>
                                            <td>{{ $item->user_id }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->merek_motor }}</td>
                                            <td>{{ $item->mesin_motor }}</td>
                                            <td>{{ $item->seri_motor }}</td>
                                            <td>{{ $item->no_plat }}</td>
                                            <td>{{ $item->jenis_service }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>{{ $item->status_orderan }}</td>
                                            <td>{{ $item->status_service }}</td>
                                            <td class="actions">
                                                <a href="{{ route('DT', $item->id) }}"
                                                    class="btn btn-outline-secondary mb-2">Tambah Detail</a>
                                                <a href="{{ route('order', $item->id) }}"
                                                    class="btn btn-outline-primary">Edit <i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="" class="btn btn-outline-danger"
                                                    onclick="return confirm('Yakin Mau Hapus?')">Hapus <i
                                                        class="bi bi-trash2-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

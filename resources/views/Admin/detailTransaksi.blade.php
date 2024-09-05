<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transaksi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            color: #007bff;
        }

        .sidebar .nav-link {
            color: #adb5bd;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #007bff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .table-container {
            overflow-x: auto;
        }
        .actions a {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('homeAdmin') }}">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaOwner') }}">
                    <i class="bi bi-person-up"></i> Owner
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link " href="{{ route('kelolaPengguna') }}">
                    <i class="bi bi-person-fill"></i> Pengguna
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaMekanik') }}">
                    <i class="bi bi-person-gear"></i> Mekanik
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaKasir') }}">
                    <i class="bi bi-clipboard2-check"></i> Kasir
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaPesanan') }}">
                    <i class="bi bi-basket2"></i> Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active" href="{{ route('detailBooking') }}">
                    <i class="bi bi-clipboard2-check"></i> Detail Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('homePengguna') }}">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="card shadow-sm bg-body rounded">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Detail Transaksi</h5>
                <div class="table-container">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID Pengguna</th>
                                <th>Nama</th>
                                <th>Merek Motor</th>
                                <th>Mesin Motor</th>
                                <th>Seri Motor</th>
                                <th>Plat Nomber</th>
                                <th>Jenis Service</th>
                                <th>Barang</th>
                                <th>Harga Barang</th>
                                <th>Biaya Penanganan</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($dp as $item)
                            <tr>
                                <td>{{ $item->user->id }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->barang->harga_barang }}</td>
                                <td>20.000</td>
                                <td>mau ganti oli dengan oli yang berkualitas</td>
                                <td>Dikerjakan</td>
                                <td class="actions">
                                    <a href="" class="btn btn-outline-primary">Edit <i class="bi bi-pencil-square"></i></a>
                                    <a href="" class="btn btn-outline-danger" onclick="return confirm('Yakin Mau Hapus?')">Hapus <i class="bi bi-trash2-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

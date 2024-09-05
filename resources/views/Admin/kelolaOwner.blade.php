<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Pengguna</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        body {
            display: flex;
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
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }

        .table-container {
            margin: 0 auto;
        }

        .table {
            width: 100%;
        }

        .card {
            margin: 20px auto;
            width: 100%;
        }

        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
            margin: 0 auto;
        }

        .bk {
            display: block;
            width: 200px;
            margin: 25px auto;
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
                <a class="nav-link active" href="{{ route('kelolaOwner') }}">
                    <i class="bi bi-person-up"></i> Owner
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaPengguna') }}">
                    <i class="bi bi-person-fill"></i> Pengguna
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaMekanik') }}">
                    <i class="bi bi-person-gear"></i> Mekanik
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link " href="{{ route('kelolaKasir') }}">
                    <i class="bi bi-clipboard2-check"></i> Kasir
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaPesanan') }}">
                    <i class="bi bi-basket2"></i> Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('detailBooking') }}">
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
        {{-- chartjs --}}
        <div class="chart-container card-chart card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h5 class="card-title">Grafik Jumlah Servis Per Bulan</h5>
                <canvas id="servisChart"></canvas>
            </div>
        </div>

        {{-- tabel transaksi --}}
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h5 class="card-title">Riwayat Transaksi</h5>
                <div class="table-responsive table-container">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->User->nama }}</td>
                                <td>{{ $item->tgl_transaksi }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->pemasukan }}</td>
                                <td>{{ $item->pengeluaran }}</td>
                            </tr>
                            @endforeach
                            <tr class="table-info">
                                <th colspan="4" class="text-center">Total</th>
                                <th>{{ $totalPemasukan }}</th>
                                <th>{{ $totalPengeluaran }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a href="#" class="bk btn btn-primary">Kirim</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // data chartjs
        const labels = @json($labels); // bulan
        const jumlahServis = @json($jumlahServis); // jumlah servis per bulan

        const ctx = document.getElementById('servisChart').getContext('2d');
        const servisChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Servis',
                    data: jumlahServis,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
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
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card .card-body h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .card .card-body h5 {
            margin: 0;
            font-size: 1.2rem;
            color: #fff;
        }
        .card .icon {
            font-size: 3rem;
            color: #fff;
        }
        .card .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0,0,0,0.1);
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        .card.bg-primary {
            background-color: #007bff;
        }
        .card.bg-secondary {
            background-color: #6c757d;
        }
        .card.bg-success {
            background-color: #28a745;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    @include('template.navAdmin')

    <div class="sidebar">
        <h4 class="text-center">Dashboard</h4>
        <hr class="hr">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link active" href="{{ route('homeAdmin') }}">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('kelolaOwner') }}">
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
                <a class="nav-link" href="{{ route('detailBooking') }}">
                    <i class="bi bi-clipboard2-check"></i> Detail Booking
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('profile',  Auth::user()->id) }}">
                    <i class="bi bi-person-fill"></i> Profile
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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card bg-primary">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5>Pelanggan</h5>
                                <h1>120</h1>
                            </div>
                            <div class="icon-container">
                                <i class="bi bi-person-fill icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-secondary">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5>Transaksi</h5>
                                <h1>120</h1>
                            </div>
                            <div class="icon-container">
                                <i class="bi bi-cash icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card bg-success">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h5>Service</h5>
                                <h1>120</h1>
                            </div>
                            <div class="icon-container">
                                <i class="bi bi-gear icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.min.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/datatable.min.js') }}"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .rounded-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
            border: 2px solid #ddd;
        }
        .profile-header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }
        .table-wrapper {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .actions .btn {
            margin: 0 5px;
        }

        
    </style>
    @include('template.nav')
</head>

<body>
    <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-3 text-center">
                <img src="{{ asset($user->profil) }}" id="banyu" alt="Profile Picture" class="rounded-image">
            </div>
            <div class="col-9">
                <p>
                <h4>{{ $user->nama }}</h4>
                {{ $user->kontak }}><br/>
                {{ $user->email }}><br/>
                {{ $user->alamat }}><br/>
                </p>

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <div class="profile-header">
                    <img src="{{ asset($user->profil) }}" id="banyu" alt="Profile Picture" class="rounded-image">
                    <h4>{{ $user->nama }}</h4>
                    <p>{{ $user->kontak }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->alamat }}</p>

                </div>
            </div>
        </div> --}}
     
        <div class="row">
            <div class="col-12 content">
                <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3">Detail Transaksi</h5>
                            <table class="table table-striped table-bordered" id="banyu">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Merek Motor</th>
                                        <th>Seri Motor</th>
                                        <th>Mesin Motor</th>
                                        <th>Plat Nomor</th>
                                        <th>Jenis Service</th>
                                        <th>Tanggal Service</th>
                                        <th>Deskripsi</th>
                                        <th>Status Orderan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Service</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($pesan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td>{{ $item->merek_motor }}</td>
                                            <td>{{ $item->seri_motor }}</td>
                                            <td>{{ $item->mesin_motor }} </td>
                                            <td>{{ $item->no_plat }} </td>
                                            <td>{{ $item->jenis_service }} </td>
                                            <td>{{ $item->tgl_service }} </td>
                                            <td>{{ $item->deskripsi }} </td>
                                            <td>{{ $item->status_orderan }} </td>
                                            <td>{{ $item->status_pembayaran }} </td>
                                            <td>{{ $item->status_service }} </td>
                                            <td class="actions">
                                                <a href="{{ route('bukti',$item->id) }}" class="btn btn-primary">Bayar</a>
                                                <a href="" class="btn btn-outline-danger" onclick="return confirm('Yakin Mau Hapus?')">Cancel <i class="bi bi-trash2-fill"></i></a>
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

        <!-- datatabel -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#banyu').DataTable();
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

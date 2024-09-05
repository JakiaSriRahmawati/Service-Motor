<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Kasir</title>

    <style>
        body {
            padding-top: 20px;
        }

        .container {
            padding: 0 15px;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table img {
            max-width: 120px;
            border-radius: 5px;
        }

        .img-thumbnail {
            border: 1px solid #dee2e6;
            padding: .25rem;
            background-color: #f8f9fa;
        }

        .badge {
            font-size: .75rem;
            padding: .5rem .75rem;
            border-radius: .25rem;
            color: black;
        }

        .actions .btn {
            margin: 0 .25rem;
        }

        .actions .btn:last-child {
            margin-right: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: .5rem .75rem;
            margin: 0 .25rem;
        }

        .dataTables_wrapper .dataTables_info {
            padding: .5rem 0;
        }

        /* Ensure the table fits within its container */
        .table-responsive {
            overflow-x: auto;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.min.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/datatable.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('template.navKasir')

    <div class="container mt-5">
        <div class="col-12 content">
            <div class="card shadow-lg p-4 mb-5 bg-light rounded">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Tabel Booking</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>ID Pengguna</th>
                                    <th>Nama</th>
                                    <th>Merek Motor</th>
                                    <th>Mesin Motor</th>
                                    <th>Seri Motor</th>
                                    <th>Plat Nomber</th>
                                    <th>Jenis Service</th>
                                    <th>Deskripsi</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
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
                                        <td>
                                            {{-- @if ($item->bukti && $item->bukti->foto)
                                                <img src="{{ asset($item->bukti->foto) }}" alt="Bukti Foto"
                                                    class="img-thumbnail">
                                            @else
                                                <p>No photo available</p>
                                            @endif
                                        </td> --}}
                                        @if ($item->bukti && $item->bukti->foto)
                                            @php
                                                $fileUrl = asset('storage/uploads/' . basename($item->bukti->foto));
                                                $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION);
                                            @endphp
                                            @if (in_array($fileExtension, ['jpeg', 'png', 'jpg', 'gif', 'svg']))
                                                <img src="{{ $fileUrl }}" alt="Bukti Foto" class="img-thumbnail" onclick="showPopup('{{ $fileUrl }}')">
                                            @elseif ($fileExtension === 'pdf')
                                                <iframe src="{{ $fileUrl }}" type="application/pdf" style="width: 100%; height: 150px;" frameborder="0">
                                                    This browser does not support PDFs. Please download the PDF to view it: <a href="{{ $fileUrl }}">Download PDF</a>.
                                                </iframe>
                                            @else
                                                <p>Unsupported file type</p>
                                            @endif
                                        @else
                                            <p>No photo available</p>
                                        @endif
                                    </td>
                                        <td>
                                            <span class="badge text-dark {{ $item->status_pembayaran }}">
                                                {{ $item->status_pembayaran }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge text-dark {{ $item->status_service }}">
                                                {{ $item->status_service }}
                                            </span>
                                        </td>
                                        <td class="actions">
                                            <a href="{{ route('confirm', $item->id) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                Edit <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Yakin Mau Hapus?')">
                                                Hapus <i class="bi bi-trash2-fill"></i>
                                            </a>
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

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#banyu').DataTable({
                paging: true,
                searching: true,
                info: true
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

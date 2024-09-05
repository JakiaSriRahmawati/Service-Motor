<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Belanjaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-header {
            background-color: #28a745;
            color: white;
        }

        .card-footer {
            background-color: #f8f9fa;
        }

        .table th, .table td {
            text-align: center;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4>Detail Pesanan</h4>
                <p>ID Pesanan: {{ $pesan->id }}</p>
                <p>Merek Motor: {{ $pesan->merek_motor }}</p>
                <p>Seri Motor: {{ $pesan->seri_motor }}</p>
                <p>Mesin Motor: {{ $pesan->mesin_motor }}</p>
                <p>No Plat: {{ $pesan->no_plat }}</p>
                <p>Tgl pesan: {{ $pesan->tgl_service }}</p>
                <p>Jenis Service: {{ $pesan->jenis_service }}</p>
                <p>Deskripsi: {{ $pesan->deskripsi }}</p>
                <p>Status: {{ $pesan->status_orderan }}</p>

                <h4>Barang yang Dibutuhkan</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Stok Barang</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->barang->harga_barang }}</td>
                                <td>{{ $item->biaya_penanganan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4>Upload Bukti Pembayaran</h4>
                <form action="{{ route('bayar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="bukti">Upload Bukti Transaksi</label>
                        <input type="file" name="foto" accept="image/*" class="form-control" required>
                        <input type="hidden" name="pesan_id" value="{{ $pesan->id }}">
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // function printInvoice(item) {
        //     let tbody = '';
        //     let totalJumlah = 1; // Assuming each item represents one order, adjust as needed
        //     let totalH = item.harga_barang;
        //     let totalBp = item.biaya_penanganan;
        //     let totalSub = item.subtotal;

        //     tbody += `<tr>
        //         <td>1</td>
        //         <td>${item.jenis_Service}</td>
        //         <td>${item.nama_barang}</td>
        //         <td>1</td>
        //         <td>${item.harga_barang}</td>
        //         <td>${item.subtotal}</td>
        //     </tr>`;

        //     document.getElementById('print-id').innerText = item.ID;
        //     document.getElementById('print-nama').innerText = item.nama;
        //     document.getElementById('print-tbody').innerHTML = tbody;
        //     document.getElementById('print-total-jumlah').innerText = totalJumlah;
        //     document.getElementById('print-total-harga').innerText = item.harga_barang;
        //     document.getElementById('print-penanganan').innerText =item.biaya_penanganan;
        //     document.getElementById('print-subtotal').innerText = item.subtotal;
        //     // Trigger the print dialog
        //     window.print();
        // }
    
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

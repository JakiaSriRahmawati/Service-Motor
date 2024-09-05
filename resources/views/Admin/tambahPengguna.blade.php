<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>
    @include('template.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <h2 class="text-center mt-3">Tambah User</h2>
                <form action="{{ route('postTambahUser') }}" method="POST" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <label for="profil">Profil</label>
                    <input type="file" accept="image/*" required name="profil" class="form-control">
                    <label for="name">Nama</label>
                    <input type="text" required name="name" class="form-control">
                    <label for="email">Email</label>
                    <input type="text" required name="email" class="form-control">
                    <label for="password">Password</label>
                    <input type="password" required name="password" class="form-control">
                    <label for="alamat">Alamat</label>
                    <input type="text" required name="alamat" class="form-control">
                    <label for="kontak">Kontak</label>
                    <input type="text" required name="kontak" class="form-control">
                    <label for="role">Role</label>
                    <input type="text" required name="role" class="form-control">
                    
                    <button class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

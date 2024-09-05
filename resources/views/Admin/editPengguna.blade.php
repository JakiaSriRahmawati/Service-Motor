<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Edit User</title>
</head>
<body>
    @include('template.nav')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('postEditUser', $d->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="profil">Gambar Profil</label>
                                <input type="file" accept="image/*" name="profil" class="form-control">
                                @if ($d->profil)
                                    <img src="{{($d->profil) }}" alt="Profil" class="img-thumbnail mt-2" style="max-width: 150px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $d->nama) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $d->email) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" required name="password" class="form-control">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti password.</small>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $d->alamat) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $d->kontak) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" id="role" name="role" value="{{ old('role', $d->role) }}" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

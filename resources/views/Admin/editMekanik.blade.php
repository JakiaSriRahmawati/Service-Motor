<!DOCTYPE html>
<html>
<head>
    <title>Edit Mechanic</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card card-rounded mt-5 " >
                    <div class="card-body">
                        <h2 class="card-title text-center">Edit Mekanik</h2>
                            <form action="{{ route('postEditUser',$mekanik->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
                                @csrf
                                <label for="nama" class="">Nama</label>
                                <input value="{{ $mekanik->nama }}" type="text" required name="nama" class="form-control  mb-2">
                                <label for="email" class="">email</label>
                                <input value="{{ $mekanik->email }}" type="text" required name="email" class="form-control  mb-2">
                                <label for="password" class="">password </label>
                                <input value="{{ $mekanik->password }}" type="text" required name="password" class="form-control  mb-2">
                                <label for="role" class="">role</label>
                                <input value="{{ $mekanik->role }}" type="text" required name="role" class="form-control  mb-2">
                                <label for="kontak" class="">kontak</label>
                                <input value="{{ $mekanik->kontak }}" type="text" required name="kontak" class="form-control  mb-2">
                                <label for="profil" class="">Profil</label>
                                <input type="file" accept="image/*" name="profil" required class="form-control  mb-2">
                                <label for="alamat" class="">alamat</label>
                                <input value="{{ $mekanik->alamat }}" type="text" required name="alamat" class="form-control  mb-2">
                                <center>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </center>
                            </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

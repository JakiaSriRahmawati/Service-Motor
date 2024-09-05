<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @include('template.nav')
</head>
<body>
    
    <div class="container mt-5 py-5">
        <div class="card mx-auto mt-5" style="max-width: 400px;">
            <div class="card-header text-center">
                <h3>Register</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('postregister') }}" method="post">
                    @csrf 
                    <div class="form-group mb-3">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control rounded-top @error('nama')is-invalid @enderror" id="nama" name="nama" placeholder="Enter your Username" required value="{{ old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control rounded-top @error('email')is-invalid @enderror" id="email" name="email" placeholder="Enter your email" required value="{{ old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded-top @error('password')is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}                        
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control rounded-top @error('password2')is-invalid @enderror" id="password2" name="password2" placeholder="Enter your konfirmasi password" required>
                        @error('password2')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kontak">No Handphone</label>
                        <input type="text" class="form-control rounded-top @error('kontak')is-invalid @enderror" id="kontak" name="kontak" placeholder="Enter your kontak" required value="{{ old('kontak')}}">
                        @error('kontak')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <label for="profil">Gambar</label>
                    <input type="file" accept="img/*" name="profil" class="form-control" required value="{{ old('profil')}}">
                    <div class="form-group mb-4">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control rounded-top @error('alamat')is-invalid @enderror" id="alamat" name="alamat" placeholder="Enter your alamat" required value="{{ old('alamat')}}">
                        @error('alamat')
                        <div class="invalid-feedback">
                           {{$message}}                 
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success mt-1">Register</button>
                        <button type="reset" class="btn btn-secondary mt-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
\
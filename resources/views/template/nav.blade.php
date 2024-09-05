<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo (1).png') }}" alt="Brand Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homePengguna') }}">Home Pengguna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @auth
                            
                        <li><a class="dropdown-item" href="{{ route('profil', Auth::user()->id) }}">Profile</a></li>
                        <button class="dropdown-item d-flex ms-auto align-self-start rounded mb-2 btnS" id="targetButton" data-bs-toggle="modal"
                        data-bs-target="#tambahMekanikModal">Booking</button>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.bc {
    font-size: 14px;
    padding: 8px 16px;
    border-radius: 50px;
    background-color: #007bff;
    color: #fff;
    border: none;
    transition: background-color 0.3s, transform 0.3s;
}

.navbar {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 10px 20px;
    z-index: 1000;
}

.nav-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #FFD700;
}

.content {
    margin-top: 80px;
    text-align: center;
    color: white;
    padding: 20px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Home
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('homeMekanik', $user->id) }}">Home</a></li>
                    <li><a class="dropdown-item" href="{{ route('barang') }}">Barang</a></li>
                    <li><a class="dropdown-item" href="{{ route('MekanikDT') }}">Detail Transaksi</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset(auth()->user()->profil) }}" class="rounded-circle" width="40" height="40" alt="Profile Picture">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            @csrf
                        </form>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>


<style>
.navbar {
    padding: 0.25rem 1rem; /* Reduced padding */
    background: rgba(0, 0, 0, 0.8); /* Darker transparent background */
}

.navbar-brand {
    font-size: 1.25rem; /* Smaller font size */
    font-weight: bold;
}

.nav-link {
    font-size: 0.875rem; /* Smaller font size */
}

.nav-link:hover {
    color: #FFD700; /* Gold color on hover */
}

.dropdown-menu {
    background-color: #343a40; /* Dark background for dropdown */
}

.dropdown-item {
    color: #fff; /* White text for dropdown items */
    font-size: 0.875rem; /* Smaller font size */
}

.dropdown-item:hover {
    background-color: #495057; /* Slightly lighter background on hover */
}

.navbar-toggler {
    border-color: #ffffff;
}

.navbar-toggler-icon {
    background-image: url('data:image/svg+xml;charset=utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="%23ffffff" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>');
}

.navbar-collapse {
    align-items: center;
}

.btn-outline-light {
    border-color: #ffffff;
    color: #ffffff;
    font-size: 0.75rem; /* Smaller font size */
}

.btn-outline-light:hover {
    background-color: #ffffff;
    color: #000000;
}

.nav-item .dropdown-toggle {
    display: flex;
    align-items: center;
}

.navbar-nav .dropdown-toggle img {
    border-radius: 50%;
    width: 30px; /* Smaller profile image */
    height: 30px; /* Smaller profile image */
}

</style>

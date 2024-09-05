<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function login() {
        $user = Auth::user();
        return view('template.login', compact('user'));
    }

    // Proses login
    public function postLogin(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        // Coba untuk login dengan kredensial yang diberikan
        if (Auth::attempt($data)) {
            $user = Auth::user();
            return $this->redirectUser($user);
        }

        // Jika gagal login
        return redirect()->route('login')->with('notifikasi', 'Email atau Password Salah!');
    }

    // Menampilkan halaman registrasi
    public function register() {
        return view('Pengguna.register');
    }

    // Proses registrasi

    public function postregister(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            "nama" => "required",
            "email" => "required|email:dns|unique:users,email",
            "password" => "required|min:8",
            "kontak" => "required",
            "profil" => "required",
            "alamat" => "required",
        ]);
    
        // Encrypt the password
        $data['password'] = bcrypt($data['password']);
    
        // Buat pengguna baru
        $user = User::create($data);
    
        // Login pengguna baru
        Auth::login($user);
    
        // Redirect ke homePengguna
        return redirect()->route('homePengguna');
    }
    
        // Redirect berdasarkan peran
        // return $this->redirectUser($user);
    

    // Fungsi untuk mengarahkan pengguna berdasarkan perannya
    private function redirectUser($user)
    {
        switch ($user->role) {
            case 'Admin':
                return redirect()->route('homeAdmin')->with('notifikasi', 'Selamat Datang, ' . $user->name);
            case 'Pengguna':
                return redirect()->route('homePengguna')->with('notifikasi', 'Selamat Datang, ' . $user->name);
            case 'Owner':
                return redirect()->route('homeOwner')->with('notifikasi', 'Selamat Datang, ' . $user->name);
            case 'Mekanik':
                return redirect()->route('homeMekanik', ['id' => $user->id])->with('notifikasi', 'Selamat Datang, ' . $user->name);
            case 'kasir':
                return redirect()->route('homeKasir', ['id' => $user->id])->with('notifikasi', 'Selamat Datang, ' . $user->name);
            default:
                return redirect()->route('login')->with('notifikasi', 'Peran tidak dikenali.');
        }
    }

    // Logout pengguna
    public function logout() {
        auth()->logout();
        return redirect()->route('homePengguna');
    }
}

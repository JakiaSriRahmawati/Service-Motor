<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\barang;
use App\Models\detail_transaksi;
use App\Models\pesan;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function homePengguna(){
        $user = Auth::user();
        $data = artikel::all();
        return view('Pengguna.homePengguna', compact('data', 'user'));
    }    
    public function about()
    {
        return view('template.about');
    }
    function detail(artikel $artikel){
        $artikel = artikel::where('id', $artikel->id)->get()->first();
        return view('Pengguna.detailArtikel', compact('artikel', 'artikel'));
    }

    // pesanan
    function postPesan(Request $request)
    {
        $data = $request->validate([
            'merek_motor' => 'required',
            'seri_motor' => 'required',
            'mesin_motor' => 'required',
            'no_plat' => 'required',
            'jenis_service' => 'required',
            'tgl_service' => 'required',
            'deskripsi' => 'required',
            // 'status_service' => 'required',
            // 'status_pembayaran' => 'required'
        ]);

    

        $pesan = pesan::create([
            'user_id' => Auth::id(),
            'merek_motor' => $request->merek_motor,
            'seri_motor' => $request->seri_motor,
            'mesin_motor' => $request->mesin_motor,
            'no_plat' => $request->no_plat,
            'jenis_service' => $request->jenis_service,
            'tgl_service' => $request->tgl_service,
            'deskripsi' => $request->deskripsi,
            // 'status' => $request->status
        ]);
        $pesan->save();

        $transaksi = new transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->pesan_id = $pesan->id;
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->save();

        return redirect()->route('homePengguna')->with('notifikasi', 'Berhasil Memesan');
    }
    public function profil($id)
    {
        $user = auth()->user();
        $detail = detail_transaksi::with('barang')->get();
        $pesan = pesan::where('user_id', $id)->get(); // Mengambil satu pesan
        return view('Pengguna.profil', compact('user', 'detail','pesan'));
    }
    public function profile($id)
    {
        $user = auth()->user();
        return view('Admin.profile', compact('user'));
    }
    public function postTambahUser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'kontak' => 'required',
            'profil' => 'required',
            'alamat' => 'required'
        ]);

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('default_password');
        $user->alamat = $request->alamat;
        $user->kontak = $request->kontak;
        $user->profil = $request->profil->store('img');
        $user->role = 'Pengguna';
        $user->save();

        return redirect()->route('kelolaPengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }
    
}

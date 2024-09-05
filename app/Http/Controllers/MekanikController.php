<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MekanikController extends Controller
{
    public function profil()
    {
        $user = Auth::user();
        return view("Pengguna.profil", compact("detailTransaksi", "user", "pesan", "transaksi"));
    }
    function barang()
    {
        $user = Auth::user();
        $barang = barang::all();

        return view('Mekanik.barang', compact('barang', 'user'));
    }

    public function postTambahMekanik(Request $request)
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
        $user->role = 'Mekanik';
        $user->save();

        // return redirect()->route('kelolaMekanik')->with('success', 'Mekanik berhasil ditambahkan');
    }


    //homeMekanik
    public function homeMekanik($id)
    {
        $user = User::findOrFail($id);
        $p = pesan::with('User')->get();
        $o = pesan::where('user_id', $id)->first();

        return view('Mekanik.homeMekanik', compact('user', 'p', 'o'));
    }

    public function order($id)
    {
        $p = pesan::with('User')->get();
        $pesan = pesan::find($id);
        $o = pesan::where('user_id', $id)->first();
        return view('Mekanik.order', compact('pesan', 'p'));
    }
    public function editorder(Pesan $pesan, Request $request)
    {
        $data = $request->validate([
            'status_service' => 'required|string',
            'status_orderan' => 'required|string'
        ]);

        $pesan->update($data);
        return redirect()->route('homeMekanik', ['id' => $pesan->user_id])->with('notifikasi', 'berhasil diterima');
    }
}

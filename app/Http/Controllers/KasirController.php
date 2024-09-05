<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pesan;
use App\Models\User;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function homeKasir($id)
    {
        // $user = User::findOrFail($id);
        $userId = $id;
        // $bukti = bukti::all();
        $barangs = barang::all();
    //     $pesans = Pesan::all();
        $p = pesan::with('User')->get();
        $bukti= pesan::with('bukti')->get();
        $o = pesan::where('user_id', $id)->first(); 
    
        return view('Kasir.homeKasir', compact('bukti', 'p', 'o'));
    }
    public function confirm($id)
    {
        $p = pesan::with('User')->get();
        $pesan = pesan::find($id);
        // $o = pesan::where('user_id', $id)->first();
        return view('Kasir.confirm', compact('pesan', 'p'));
    }
    public function editconfirm(Pesan $pesan, Request $request)
    {
        $data = $request->validate([
            'status_pembayaran' => 'required|string'
        ]);
        $pesan->update($data);
        dump($data);
        return redirect()->route('homeKasir', ['id' => $pesan->user_id])->with('notifikasi', 'berhasil dikonifrmasi');
    }
    
}

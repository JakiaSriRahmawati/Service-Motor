<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\bukti;
use App\Models\detail_transaksi;
use App\Models\detailTransaksi;
use App\Models\pesan;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function bayar(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $pesan = Pesan::where('id', $request->pesan_id)->first();

        $bukti = bukti::create([
            'pesan_id' => $request->pesan_id,
            'foto' => $request->file('foto')->store('img'),
            'user_id' => Auth::id()
        ]);

        $pesan->update(['status_pembayaran' => 'Sedang dikonfirmasi']);

        $user = Auth::user();
        return redirect()->route('profil', $user->id)->with('notifikasi', 'Berhasil Mengupload Bukti, Menunggu dikonfirmasi Kasir');
    }

    public function bukti($id)
    {
          // Mengambil pesan berdasarkan ID
    $pesan = pesan::findOrFail($id);
    
    // Mengambil detail transaksi yang terkait dengan pesan
    $detail = detail_transaksi::with(['barang'])->where('pesan_id', $id)->get();
        // Menghitung total harga
    
        return view('Kasir.bukti', compact('pesan', 'detail'));
}
function MekanikDT()
    {
        $user = Auth::user();
        $detail = detail_transaksi::with(['user', 'pesan', 'barang', 'transaksi'])->get();
        return view('Mekanik.homeDT', compact('detail', 'user'));
    }
function DT($id)
    {
        $user = User::find($id);
        $pesan = pesan::find($id);
        $transaksi = transaksi::find($id);
        return view('Mekanik.DT', compact('user', 'pesan', 'transaksi'));
    }
    public function tambahDT(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pesan_id' => 'required|exists:pesans,id',
            'transaksi_id' => 'required|exists:transaksis,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'biaya_penanganan' => 'required|numeric',
        ]);

        // harga barang
        $barang = barang::find($request->input('barang_id'));
        if (!$barang) {
            return redirect()->back()->withErrors(['barang_id' => 'Barang tidak ditemukan.']);
        }

        $harga_barang = $barang->harga_barang;
        $jumlah = $request->input('jumlah');
        $biaya_penanganan = $request->input('biaya_penanganan');

        // Hitung subtotal
        $subtotal = ($harga_barang * $jumlah) + $biaya_penanganan;

        // Kurangi stok barang
        if ($barang->stock < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi');
        }

        $barang->stock -= $request->jumlah;
        $barang->save();

        detail_transaksi::create([
            'user_id' => $request->input('user_id'),
            'pesan_id' => $request->input('pesan_id'),
            'transaksi_id' => $request->input('transaksi_id'),
            'barang_id' => $request->input('barang_id'),
            'jumlah' => $jumlah,
            'biaya_penanganan' => $biaya_penanganan,
            'subtotal' => $subtotal,
        ]);

        $user = Auth::user();
        return redirect()->route('homeMekanik', $user->id)->with('success', 'Detail Transaksi berhasil ditambahkan');
    }
}

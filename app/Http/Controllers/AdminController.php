<?php

namespace App\Http\Controllers;
use App\Charts\ServiceBulananChart;
use App\Models\bukti;
use App\Models\detail_transaksi;
use App\Models\pesan;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function homeAdmin()
    {
        $d = User::where('role', 'Pengguna')->get();

        return view('Admin.homeAdmin', compact('d'));
    }
    public function kelolaPengguna()
    {
        $d = User::where('role', 'Pengguna')->get();

        return view('Admin.kelolaPengguna', compact('d'));
    }
    public function kelolaMekanik(Request $request)
    {
        if ($request->has('search')) {
            $m = User::where('nama', 'LIKE', '%' . $request->search . '%')->where('role', 'Mekanik')->get();
        } else {
            $m = User::where('role', 'Mekanik')->get();
        }

        return view('Admin.kelolaMekanik', compact('m'));
    }
     // control owner
     public function homeOwner()
     {
         return view('Owner.homeOwner');
     }
    // booking
    public function kelolaPesanan()
    {
        $p = pesan::all();
        $p = pesan::with('User')->get();

        return view('Admin.kelolaPesan', compact('p'));
    }
     // kelola owner
     public function kelolaOwner(ServiceBulananChart $chart, Request $request)
     {
         // untuk transaksi
         $transaksi = transaksi::with('User')->get();
         $transaksi = transaksi::all();
         $totalPemasukan = transaksi::totalPemasukan();
         $totalPengeluaran = transaksi::totalPengeluaran();
 
 
         //untuk grafik
         $servisPerBulan = pesan::select(DB::raw('MONTH(tgl_service) as bulan'), DB::raw('count(*) as jumlah_servis'))
             ->groupBy('bulan')
             ->orderBy('bulan')
             ->get();
 
         $labels = $servisPerBulan->pluck('bulan')->map(function ($bulan) {
             return date('F', mktime(0, 0, 0, $bulan, 10));
         });
 
         $jumlahServis = $servisPerBulan->pluck('jumlah_servis');
 
 
         return view('Admin.kelolaOwner', compact('transaksi', 'totalPemasukan', 'totalPengeluaran', 'labels', 'jumlahServis'));
     }
     public function detailBooking()
    {
        $dp = detail_transaksi::all();
        $dp = detail_transaksi::with(['User', 'barang'])->get();
        // $dp = transaksi::with(['pesan'])->get();

        return view('Admin.detailTransaksi', compact('dp'));
    }
    // control mekanik
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


        return redirect()->route('kelolaMekanik')->with('success', 'Mekanik berhasil ditambahkan');
    }
    public function editMekanik($id)
    {
        $mekanik = User::where('id', $id)->first();
        return view('Admin.editMekanik', compact('mekanik'));
    }
    function editPengguna(User $d){
        return view('Admin.editPengguna',compact('d'));
    }
    function postEditUser(User $user, Request $request)
    {
        $d = $request->validate([
            'profil' => 'required',
            'nama' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'role' => 'required',
          
        ]);
        $data['profil']=$request->profil->store('img');
        $user->update($data);
        return redirect()->route('kelolaPengguna')->with('notifikasi','Data Berhasil Diedit');

         // $d['profil'] = $request->profil->store('img');
        // $user->password = bcrypt('default_password');
        // $user->update($d);
    }
    //crud tambah pengguna
    function tambahpengguna(){
        return view('Admin.tambahpengguna');   
    }
    function postTambahUser(Request $request){
        $d = $request->validate([
            'profil' =>'required',
            'nama' =>'required',
            'email'=>'required',
            'password'=>'required',
            'kontak'=>'required',
            'alamat'=>'required',
            'role'=>'required',
        ]);

        // dd($data);
        $user = User::create([
            'profil' =>$request->profil->store('img'),
            'nama' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request),
            'kontak'=>$request->kontak,
            'alamat'=>$request->alamat,
            'role'=>$request->role,
        ]);
        Auth::login($user);
        return redirect()->route('kelolaPengguna')->with('notifikasi','Data Berhasil Ditambahkan');
    }
     // kelola Kasir
     public function kelolaKasir(Request $request)
     {
         if ($request->has('search')) {
             $m = User::where('nama', 'LIKE', '%' . $request->search . '%')->where('role', 'Kasir')->get();
         } else {
             $m = User::where('role', 'Kasir')->get();
         }
 
         return view('Admin.kelolaKasir', compact('m'));
     }

     function bayar(Request $request){
        $request->validate([
            'foto' =>  'required | image | mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $pesan = pesan::findOrFail( $request->pesan_id );
        
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $path = $file->store('public/img');
            $foto = basename($path);
        } else {
            return redirect()->route('profil')->withErrors('Gagal Mengunggah Foto');
        }
        $data = bukti::create([
            'pesan_id' => $request->pesan_id,
            'foto' => $request->foto,
            'user_id' => Auth::id()
        ]);

        $pesan->update(['status_pembayaran' => 'Sedang dikonrifmasi']);
        return redirect()->route('profil')->with('notifikasi', 'Berhasil Mengupload Bukti, Menunggu dikonfirmasi Kasir');
    }
    function hapusPengguna($id){
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
          return redirect()->route('kelolaPengguna')->with('notifikasi','Data Berhasil Dihapus');
    }
    // function hapusmekanik($id){
    //     $mekanik = mekanik::findOrFail($id);
    //     $mekanik->delete();
    //       return redirect()->route('kelolamekanik')->with('notifikasi','Data Berhasil Dihapus');
    // }
}

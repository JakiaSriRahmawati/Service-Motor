<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    function postVerify($id){
        $pesan = pesan::find($id);

        $transaksi = new transaksi();
        $transaksi->user_id = Auth::id();
        $transaksi->pesan_id = $pesan->id;
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->save();
    }
}

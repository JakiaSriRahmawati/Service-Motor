<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'pesan_id', 'tanggal_transaksi', 'total' ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function detailTransaksi()
    {
        return $this->hasMany(detail_transaksi::class);
    }

    public function pesan(){
        return $this->belongsTo(pesan::class);
    }

    // Fungsi untuk menjumlahkan seluruh pemasukan
    public static function totalPemasukan()
    {
        return self::sum('pemasukan');
    }

    // Fungsi untuk menjumlahkan seluruh pengeluaran
    public static function totalPengeluaran()
    {
        return self::sum('pengeluaran');
    }

}

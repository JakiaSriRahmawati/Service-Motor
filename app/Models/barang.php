<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
 

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function pesan(){
        return $this->belongsTo(pesan::class);
    }

    public function detailTransaksi() 
    {
        return $this->belongsTo(detail_transaksi::class);    
    }

    public function kurangiStok($jumlah)
    {
        $this->stock -= $jumlah;
        $this->save();
    }

    protected $fillable = ['nama_barang','harga_barang', 'stock'];
}

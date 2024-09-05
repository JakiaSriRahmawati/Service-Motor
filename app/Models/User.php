<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function bukti(){
        return $this->hasMany(bukti::class);
    }

    public function pesan(){
        return $this->hasMany(pesan::class);
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
    public function detailTransaksi(){
        return $this->hasMany(detail_transaksi::class);
    }

    public function rating(){
        return $this->belongsTo(rating::class);
    }

    public function artikel(){
        return $this->hasMany(artikel::class);
    }

    public function barang(){
        return $this->hasMany(barang::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'konfirmasi password',
        'kontak',
        'profil',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

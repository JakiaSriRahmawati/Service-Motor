<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti extends Model
{
    use HasFactory;
    protected $fillable = ['pesan_id', 'user_id','foto'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function pesan(){
        return $this->hasMany(pesan::class);
    }
}

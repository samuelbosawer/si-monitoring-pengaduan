<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function penerima()
    {
        return $this->belongsTo(User::class,'penerima_id', 'id');
    }

     public function pendampingan()
     {
         return $this->hasMany(Pendampingan::class,'pengaduan_id', 'id');
     }

     public function latestPendampingan()
    {
        return $this->hasOne(Pendampingan::class)->latestOfMany();
    }


}

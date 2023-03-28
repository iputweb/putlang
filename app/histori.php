<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    use HasFactory;
    protected $guarded = [];

     public function barang(){
        return $this->hasOne(barang::class, 'id', 'id_barang');
    }
     public function lelang(){
        return $this->hasOne(lelang::class, 'id', 'id_lelang');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

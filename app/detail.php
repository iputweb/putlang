<?php

namespace App;

use App\User;
use App\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lelang extends Model
{
    protected $table = 'lelangs';
    protected $fillable = [
        'id', 'id_barang', 'tanggal_lelang', 'harga_akhir', 'id_user', 'status'
    ];
    use HasFactory;

    public function barang(){
        return $this->hasOne(barang::class, 'id', 'id_barang');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

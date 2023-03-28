<?php

namespace App;

use App\lelang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $primaryKey = 'id' ;
    protected $guarded = ['id'];
    protected $with = ['lelang'];
    public $timestamps = false;
    protected $fillable = [
        'id', 'nama_barang', 'gambar_barang', 'tanggal_barang', 'harga_barang', 'deskripsi_barang'
    ];


    public function lelang()
    {
        return $this->hasOne(lelang::class, 'id', 'id_lelang');
    }

}

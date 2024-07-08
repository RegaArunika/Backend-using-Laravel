<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $primaryKey = 'id_produk';
    protected $table = "tb_produks";
    protected $fillable = [
        'kode_produk','nama_produk', 'desk_produk','img_produk','id_toko','lokasi','harga'
    ];

    public function toko(){
        return $this->belongsTo(Toko::class, 'id_toko','id_toko');
    }
    public function harga(){
        return $this->hasOne(Harga::class, 'id_produk','id_produk');
    }
}
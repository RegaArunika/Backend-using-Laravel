<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toko extends Model
{
    use HasFactory;

    protected $table = 'tb_toko';
    protected $primaryKey = 'id_toko';
    
    protected $fillable = [
        'id_toko', 'nm_toko', 'desk_toko', 'location', 'kontak'
    ];

    public function produk() {
        return $this->hasMany(Produk::class, 'id_toko', 'id_toko');
    }
}

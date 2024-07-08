<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    // Perbaiki penulisan $primaryKey, seharusnya camel case
    protected $primaryKey = 'id_harga';

    // Perbaiki penulisan nama tabel, seharusnya snake case
    protected $table = "tb_harga";

    protected $fillable = [
        'id_produk', 'harga', 'date_from', 'date_end', 'quantity', 'harga_instant'
    ];

    // Perbaiki nama fungsi agar tidak bentrok dengan nama model
    public function produk()
    {
        // Ganti nama model yang dihubungkan sesuai dengan namespace yang benar
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}

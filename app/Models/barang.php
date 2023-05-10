<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nama_barang',
        'harga_barang',
        'jumlah_barang',
        'gambar_barang',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategoribarang::class);
    }
}

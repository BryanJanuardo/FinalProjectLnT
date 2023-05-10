<?php

namespace App\Http\Controllers;
use App\Models\kategoribarang;

use Illuminate\Http\Request;

class CategoryBarangController extends Controller
{
    // public function view() {return redirect('list-barang');}
    public function store(Request $req)
    {
        kategoribarang::create([
            'nama_kategori' => $req->kategori_barang,
        ]);

        return redirect('create-barang');
    }

}

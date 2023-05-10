<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\kategoribarang;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'nama_barang' => 'required|min:5|max:80',
            'harga_barang' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'gambar_barang' => 'required|mimes:png,jpeg,jpg,gif',
        ]);

        $extension = $req->file('gambar_barang')->getClientOriginalExtension();
        $filename = $req->nama_barang.'.'.$extension;
        $req->file('gambar_barang')->storeAs('/public/barang/', $filename);

        barang::create([
            'nama_barang' => $req->nama_barang,
            'harga_barang' => $req->harga_barang,
            'jumlah_barang' => $req->jumlah_barang,
            'kategori_id' => $req->kategori_id,
            'gambar_barang' => $filename,
        ]);

        $barang = barang::all();
        return redirect('list-barang');
    }

    public function viewlist()
    {
        $barang = barang::all();
        return view('list-barang', compact('barang'));
    }

    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        return view('edit-barang', compact('barang'));
    }

    public function update(Request $req, $id)
    {
        $extension = $req->file('gambar_barang')->getClientOriginalExtension();
        $filename = $req->nama_barang.'.'.$extension;
        $req->file('gambar_barang')->storeAs('/public/barang/', $filename);

        barang::findOrFail($id)->update([
            'nama_barang' => $req->nama_barang,
            'harga_barang' => $req->harga_barang,
            'jumlah_barang' => $req->jumlah_barang,
            'gambar_barang' => $filename,
        ]);

        $barang = barang::findOrFail($id);
        return redirect('list-barang');
    }

    public function delete($id)
    {
        barang::destroy($id);
        return redirect('list-barang');
    }
    public function viewcreate()
    {
        $kategori = kategoribarang::all();
        return view('create-barang', compact('kategori'));
    }
}

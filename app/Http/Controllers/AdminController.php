<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function produkIndex()
    {
        $produk = produk::paginate(5);

        return view('produk.index', compact('produk'));
    }

    public function tampiltambahproduk(kategori $kategori)
    {
        $kategori = kategori::all();
        return view('produk.tambah', compact('kategori'));
    }

    public function tambahproduk(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'foto' => 'required|file|image',
            'harga' => 'required|numeric',
        ]);

        produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'foto' => $request->foto->store('images'),
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.produk');
    }

    public function editproduk(produk $produk)
    {
        $kategori = kategori::all();

        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function updateproduk(Request $request, produk $produk)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'foto' => 'file|image',
            'harga' => 'required|numeric',
        ]);

        if ($request->hasFile('foto'))
        {
            $data['foto'] = $request->foto->store('images');
        }
        else
        {
            unset($data['foto']);
        }

        $produk->update($data);

        return redirect()->route('admin.produk');
    }

    public function deleteProduk(produk $produk)
    {
        $foto = produk::where('id', $produk->id)->first();
        $fileName = public_path($foto->foto);
        unlink($fileName);
        $produk->delete();

        return redirect()->route('admin.produk');
    }



}

<?php

namespace App\Http\Controllers;

use App\User;
use App\barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('barangs.list', [
            'title' => 'Barang Lelang',
            'barangs' => barang::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.create', [
            'title' => 'Tambah Barang',
            'barangs' => barang::paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $gambar = $request->gambar;
        //     $slug = Str::slug($gambar->getClientOriginalName());
        //     $new_gambar = time() .'_'. $slug;
        //     $gambar->move('public/barang', $new_gambar);

        barang::create([
             'nama_barang' => $request->nama_barang,
             'harga_barang' => $request->harga_barang,
            'gambar_barang' => $request->file('gambar_barang')->store('barang'),
            'tanggal_barang' => $request->tanggal_barang,
            'deskripsi_barang' => $request->deskripsi_barang
        ]);

        return redirect()->route('barangs.index')->with('message', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        return view('barangs.edit', [
            'title' => 'Edit User',
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    
    {
       if($request->file('gambar_barang')){
        $data['gambar_barang'] = $request->file('gambar_barang')->store('barang');
    };
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->tanggal_barang = $request->tanggal_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        $barang->save();

        return redirect()->route('barangs.index')->with('message', 'Barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        

        $barang->delete();

        return redirect()->route('barangs.index')->with('message', 'Barang berhasil dihapus!');
    }
}

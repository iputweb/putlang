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
use App\lelang;
use Illuminate\Support\Facades\Storage;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelangs = lelang::with('barang')->get();
        $barang = barang::all();

        return view('lelang.list', [
            'title' => 'Lelang barang',
            'lelangs' => $lelangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  $lelang = lelang::all();
        // $barang = barang::with('lelang')->get();
        $barang = barang::all();

        $lelang = lelang::with(['barang'])->get();
        return view('lelang.create', [
            'title' => 'Tambah Barang Lelang',
            'barang' => $barang,
            'lelang' => $lelang
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
        $validate = $request->validate([
            'harga_akhir' => ['nullable']
        ]);

        lelang::create([
             'id_barang' => $request->id_barang,
             'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'harga_akhir' => $request->harga_akhir,
            'tanggal_lelang' => $request->tanggal_lelang,
            'status' => $request->status
        ]);

        return redirect()->route('lelang.index')->with('message', 'lelang berhasil ditambahkan!');
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
    public function edit(lelang $lelang)
    {
        return view('lelang.edit', [
            'title' => 'Edit Lelang',
            'lelang' => $lelang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lelang $lelang)
    
    {
        $lelang->status = $request->status;
        $lelang->save();

        return redirect()->route('lelang.index')->with('message', 'Lelang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(lelang $lelang)
    {
        

        $lelang->delete();

        return redirect()->route('lelang.index')->with('message', 'Lelang berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\barang;
use App\lelang;
use App\histori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $lelangs = lelang::with('barang')->where('status', 'dibuka')->get();
         $lelang_pemenang = lelang::with('user')->where('status', 'ditutup')->get();
        $barang = barang::all();
         $histori = histori::where('id_lelang')->orderBy('tawar_harga', 'DESC')->take(3)->get();
        $top_price = histori::where('id_lelang')->orderBy('tawar_harga', 'DESC')->first();



        return view('beranda', [
            'title' => 'Barang Lelang',
            'barangs' => $barang,
            'lelangs' => $lelangs,
            'lelang_pemenang' => $lelang_pemenang,
            'histori' => $histori,
            'top_price' => $top_price,
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
    public function edit(User $basic)
    {
        return view('basic.edit', [
            'title' => 'Edit User',
            'user' => $basic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $basic)
    {
        if($request->filled('password')) {
            $basic->password = Hash::make($request->password);
        }
        $basic->name = $request->name;
        $basic->last_name = $request->last_name;
        $basic->email = $request->email;
        $basic->level = $request->level;
        $basic->save();

        return redirect()->route('basic.index')->with('message', 'User berhasil diupdate!');
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

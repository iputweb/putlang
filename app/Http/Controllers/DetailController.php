<?php

namespace App\Http\Controllers;

use App\User;
use App\barang;
use App\lelang;
use App\detail;
use App\histori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $lelangs = lelang::with('barang')->find($id);
        $barang = barang::all();
        $histori = histori::where('id_lelang', $id)->orderBy('tawar_harga', 'DESC')->take(3)->get();
        $top_price = histori::where('id_lelang',$id)->orderBy('tawar_harga', 'DESC')->first();

        return view('detail', [
            'title' => 'Barang Lelang',
            'barangs' => $barang,
            'lelang' => $lelangs,
            'histori' => $histori,
            'top_price' => $top_price,
        ]);

        lelang::create([
             'harga_akhir' => $lelangs->harga_akhir,
        ]);

        return redirect()->route('detail')->with('message', 'Barang berhasil ditambahkan!');
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

        lelang::create([
             'harga_akhir' => $request->harga_akhir,
        ]);

        return redirect()->route('barangs.index')->with('message', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bid(Request $request, $id)
    {
        $lelangs = lelang::all()->where('id', $id)->first();
        if ($lelangs->harga_akhir >= $request->tawar_harga) {
            return redirect()->route('detail', $id)->with('message', 'bid harus lebih tinggi dari harga Awal!');
        }
        $history_data = [
            'id_barang' => $lelangs->id_barang,
            'id_lelang' => $id,
            'id_user' => Auth::user()->id,
            'tawar_harga' => $request->tawar_harga
        ];

        histori::create($history_data);
        lelang::where('id', $id)->update([
            'id_user' => Auth::user()->id,
            'harga_akhir' => $request->tawar_harga
        ]);

        return redirect()->route('detail', $id)->with('success', 'bid berhasil ditambahkan!');

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

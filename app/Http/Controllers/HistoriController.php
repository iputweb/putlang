<?php

namespace App\Http\Controllers;

use App\barang;
use App\lelang;
use App\histori;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historis = histori::with(['barang', 'user', 'lelang'])->get()->sortByDesc('created_at');
        $barang = barang::all();

        return view('histori', [
            'title' => 'Barang Lelang',
            'historis' => $historis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function show(histori $histori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function edit(histori $histori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, histori $histori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function destroy(histori $histori)
    {
        //
    }
}

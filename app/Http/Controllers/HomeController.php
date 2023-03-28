<?php

namespace App\Http\Controllers;

use App\barang;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $admins = User::where('level','petugas')->count();
        $masyarakats = User::where('level','masyarakat')->count();
        $barangs = barang::count();

        $widget = [
            'users' => $users,
            'barangs' => $barangs,
            'admins' => $admins,
            'masyarakats' => $masyarakats
            //...
        ];

        
        return view('home', compact('widget'));
    }
}

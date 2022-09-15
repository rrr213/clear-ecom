<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\diteltransaksi;
use App\Models\transaksi;
use Illuminate\Support\Str;
use App\Models\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){

        $data = produk::all();
        return view('welcome', compact('data'));
    }

    public function detail(Request $request, produk $produk){
        return view('main', compact('produk'));
    }

    public function login(){
        return view('login');
    }

    public function postlogin(Request $request){
        $cek = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($cek)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.produk')->with('status', 'Selamat datang : '.$user->name);
            }else {
                return redirect()->route('home')->with('status', 'Selamat datang : '.$user->name);
            }
        }
        return back()->with('status', 'Email atau password salah');
    }

    public function registrasi(){
        return view('registrasi');
    }

    public function postregistrasi(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            'name' =>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'customer'
        ]);
        return redirect()->route('login')->with('status','Berhasil Tambah Customer');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('home');
    }

    public function postkeranjang(Request $request, produk $produk){
        $request->validate([
            'banyak'=>'required',
        ]);
        diteltransaksi::create([
            'qty' => $request->banyak,
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'status' =>'keranjang',
            'totalharga' => $produk->harga * $request->banyak,
        ]);

         return redirect()->route('pelanggan.keranjang')->with('status','dimasukan kedalam keranjang');
    }

    public function keranjang(Request $request){
        $diteltransaksi=diteltransaksi::where('user_id', auth()->id())->where('status','keranjang')->with('produk')->get();

        return view('keranjang',compact('diteltransaksi'));
    }

    public function bayar(Request $request, diteltransaksi $diteltransaksi){

        $produk= $diteltransaksi->produk;
        return view('bayar',compact('produk', 'diteltransaksi'));
    }

    public function prosesbayar(Request $request, diteltransaksi $diteltransaksi)
    {
        $request->validate([
            'bukti_transaksi' => 'required|file',
        ]);

        $transaksi = transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $diteltransaksi->totalharga,
            'kode' => 'INV'.Str::random(8)
        ]);

        $diteltransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'cekout',
            'bukti_transaksi' => $request->bukti_transaksi->store('images'),
        ]);

        return redirect()->route('pelanggan.summary')->with('status','Berhasil checkout/upload bukti');
    }

    public function summary(Request $request)
    {
        $diteltransaksi = diteltransaksi::where('user_id', auth()->id())->where('status', 'cekout')->get();

        return view('summary', compact('diteltransaksi'));
    }


}

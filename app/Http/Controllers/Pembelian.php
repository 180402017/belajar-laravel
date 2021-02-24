<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pelanggan_model, Persediaan_model, PembelianDetail_model, PembelianMaster_model, Pemasok_model};

class Pembelian extends Controller
{
    public function index(){
        $nobuk = "PNJ".date('dmYHis');
        $pelanggan = Pemasok_model::all();
        $persediaan = Persediaan_model::all();
        $pembelian = PembelianDetail_model::all();

        return view('master.pembelian.index', compact('nobuk', 'pelanggan', 'persediaan', 'pembelian'));
    }

    public function editBeli(){

    }

    public function store(){
        Request()->validate([
            'qty' => 'required',
            'harga' => 'required',
            'barang' => 'required'
        ]);

        PembelianMaster_model::create([
            'nobuk' => Request()->nobuk,
            'id_pem' => Request()->pembeli,
            'keterangan' => Request()->keterangan
        ]);

        PembelianDetail_model::create([
            'nobuk' => Request()->nobuk,
            'id_stok' => Request()->barang,
            'qty' => Request()->qty,
            'harga' => Request()->harga,
            'total' => Request()->harga * Request()->qty,
        ]);

        return redirect('pembelian');
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        PembelianDetail_model::findOrFail($id)->delete();
        return redirect('pembelian');
    }
}

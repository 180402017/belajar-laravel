<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasok_model;

class Pemasok extends Controller{
    public function index(){
        $pemasok = Pemasok_model::all();

        return view('master.pemasok.index', compact('pemasok'));
    }

    public function create(){
        return view('master.pemasok.tambah');
    }

    public function store(){
        $this->_validate();

        Pemasok_model::create([
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'alamat' => Request()->alamat,
            'no_telp' => Request()->telp,
            'nama_pimpinan' => Request()->pimpinan,
            'nama_admin' => Request()->admin
        ]);

        return redirect('pemasok')->with('pesan', 'Berhasil ditambahkan');
    }

    public function edit($id){
        $pemasok = Pemasok_model::findOrFail($id);
        return view('master.pemasok.edit', compact('pemasok'));
    }

    public function update($id){
        $this->_validate();

        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'alamat' => Request()->alamat,
            'no_telp' => Request()->telp,
            'nama_pimpinan' => Request()->pimpinan,
            'nama_admin' => Request()->admin
        ];

        Pemasok_model::whereId($id)->update($data);
        return redirect('pemasok')->with('pesan', 'Berhasil diubah');
    }

    public function destroy($id){
        Pemasok_model::findOrFail($id)->delete();
        return redirect('pemasok')->with('pesan', 'Berhasil diubah');
    }

    private function _validate(){
        request()->validate([
            'kode' => 'required|min:3|max:5',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required|max:12',
            'pimpinan' => 'required',
            'admin' => 'required',
        ], 
        [
            'kode.required' => 'Kode wajib diisi',
            'kode.min' => 'Minimal 3 karakter',
            'kode.max' => 'Maximal 5 karakter',
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'telp.required' => 'Telp wajib diisi',
            'telp.max' => 'Maximal 12 karakter',
            'pimpinan.required' => 'Nama pimpinan wajib diisi',
            'admin.required' => 'Nama admin wajib diisi'
        ]);
    }
}

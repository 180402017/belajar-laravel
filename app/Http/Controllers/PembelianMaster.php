<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{PembelianMaster_model, Pelanggan_model, Persediaan_model, PembelianDetail_model, Pemasok_model};
use PDF;

class PembelianMaster extends Controller
{
	public function __construct(){
		$this->master = new PembelianMaster_model;
		$this->pembelian = new PembelianDetail_model;
	}

	public function index(){
		$master = $this->master->get();

		return view('master.pembelian.detail', compact('master'));
	}

	public function edit($nobuk){
		$detail = $this->master->getByNobuk($nobuk);
		$persediaan = Persediaan_model::all();
		$pembelian = PembelianDetail_model::all();
		$pelanggan = Pemasok_model::all();

		return view('master.pembelian.edit', compact('detail', 'pelanggan', 'persediaan', 'pembelian'));
	}

	public function invoice($nobuk){
		$detail = $this->master->getByNobuk($nobuk);
		$pembelian = PembelianDetail_model::all();

		return view('master.pembelian.invoice', compact('detail', 'pembelian'));
	}

	public function print($nobuk){
		$detail = $this->master->getByNobuk($nobuk);
		$pembelian = PembelianMaster_model::all();
		$pdf = PDF::loadview('master.pembelian.invoice', compact('detail', 'pembelian'))->setPaper('A4','potrait');
		return $pdf->stream();
	}

}

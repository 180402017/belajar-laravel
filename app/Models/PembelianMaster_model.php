<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembelianMaster_model extends Model
{
	protected $fillable = ['nobuk', 'id_pem', 'keterangan'];
	protected $table = 'tbl_master_beli';

	public function get(){
		$query = DB::table('tbl_master_beli')
		->join('tbl_pemasok', 'tbl_pemasok.id', '=', 'tbl_master_beli.id_pem')
		->get();
		return $query;
	}

	public function getByNobuk($nobuk){
		$query = DB::table('tbl_master_beli')
		->join('tbl_pemasok', 'tbl_pemasok.id', '=', 'tbl_master_beli.id_pem')
		->where('nobuk', $nobuk)
		->first();
		return $query;
	}
}

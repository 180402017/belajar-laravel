<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembelianDetail_model extends Model
{
	protected $fillable = ['nobuk', 'id_stok', 'qty', 'harga', 'total'];
	protected $table = 'tbl_detail_beli';

	public function persediaan()
    {
        return $this->belongsTo('App\Models\Persediaan_model', 'id_stok');
    }

    public function getPersediaanByNobuk($nobuk){
    	$query = DB::table('tbl_detail_beli')
    	->join('tbl_perseidaan', 'tbl_perseidaan.id', '=', 'tbl_detail_beli.id_stok')
    	->where('nobuk', $nobuk)
    	->get();
    	return $query;
    }
}

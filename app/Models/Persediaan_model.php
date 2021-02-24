<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Persediaan_model extends Model
{
	protected $fillable = ['kode', 'nama', 'id_satuan', 'harga_jual', 'harga_rata_rata'];
	protected $table = 'tbl_persediaan';

	public function pembelianDetail()
    {
        return $this->hasMany('App\Models\PembelianDetail_model');
    }
}

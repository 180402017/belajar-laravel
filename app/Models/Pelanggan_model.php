<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan_model extends Model
{
	protected $fillable = ['kode', 'nama', 'alamat', 'no_telp', 'nama_pimpinan', 'nama_admin'];
	protected $table = 'tbl_pelanggan';
}

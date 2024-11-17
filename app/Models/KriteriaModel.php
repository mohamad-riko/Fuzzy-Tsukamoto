<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KriteriaModel extends Model
{
    public function allData()
    {
    	return DB::table('tbl_kriteria')->get();
    }
    public function detailData($id_kriteria)
    {
    	return DB::table('tbl_kriteria')->where('id_kriteria',$id_kriteria)->first();
    }

}

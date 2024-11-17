<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PerhitunganModel extends Model
{
      public function allData()
    {

    	return DB::table('tbl_perhitungan')->get();
    }

     public function detailData($id_perhitungan)
    {
    	return DB::table('tbl_perhitungan')->where('id_perhitungan',$id_perhitungan)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_perhitungan')->insert($data);
    }
}

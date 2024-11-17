<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HimpunanModel extends Model
{
    public function allData()
    {
    	return DB::table('tbl_himpunan')->get();
    }

    public function detailData($id_variabel_himpunan)
    {
    	return DB::table('tbl_himpunan')->where('id_variabel_himpunan',$id_variabel_himpunan)->first();
    }
     public function addData($data)
    {
        DB::table('tbl_himpunan')->insert($data);
    }

    public function editData($id_variabel_himpunan, $data)
    {
    	DB::table('tbl_himpunan')
        ->where('id_variabel_himpunan', $id_variabel_himpunan)
        ->update($data);
    }
   public function deleteData($id_variabel_himpunan)
    {
        DB::table('tbl_himpunan')->where('id_variabel_himpunan',$id_variabel_himpunan)->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AturanModel extends Model
{
    public function allData()
    {

    	return DB::table('tbl_aturan')->Paginate(8);
    }

    public function detailData($id_aturan)
    {
    	return DB::table('tbl_aturan')->where('id_aturan',$id_aturan)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_aturan')->insert($data);
    }

    public function editData($id_aturan, $data)
    {
    	DB::table('tbl_aturan')
        ->where('id_aturan', $id_aturan)
        ->update($data);
    }
    public function deleteData($id_aturan)
    {
        DB::table('tbl_aturan')->where('id_aturan',$id_aturan)->delete();
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatadiriModel extends Model
{
    public function allData()
    {
    	return DB::table('tbl_pengajuan')->get();
    }

    public function detailData($id_aturan)
    {
    }

    public function addData($data)
    {
        DB::table('tbl_pengajuan')->insert($data);
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


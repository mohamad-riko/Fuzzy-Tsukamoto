<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PengajuanModel extends Model
{
    public function allData()
    {
    	return DB::table('tbl_pengajuan')->get();
    }
  
    public function detailData($id_pengajuan)
    {
    	return DB::table('tbl_pengajuan')->where('id_pengajuan')->first();
    }

    public function addData($data)
    {
        DB::table('tbl_pengajuan')->insert($data);
    }

    public function editData($id_pengajuan, $data)
    {
    	DB::table('tbl_pengajuan')
        ->where('$id_pengajuan', $id_pengajuan)
        ->update($data);
    }
    public function deleteData($id_pengajuan)
    {
        DB::table('tbl_pengajuan')->where('id$id_pengajuan',$id_pengajuan)->delete();
    }
}

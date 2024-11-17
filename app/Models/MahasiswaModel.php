<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MahasiswaModel extends Model
{
    public function allData()
    {
    	return DB::table('tbl_mahasiswa')->get();
    }

    public function detailData($id_mahasiswa)
    {
    	return DB::table('tbl_mahasiswa')->where('id_mahasiswa',$id_mahasiswa)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_mahasiswa')->insert($data);
    }

    public function editData($id_mahasiswa,$data)
    {
    	DB::table('tbl_mahasiswa')->where('id_mahasiswa',$id_mahasiswa)->update($data);
    }
    public function deleteData($id_mahasiswa)
    {
        DB::table('tbl_mahasiswa')->where('id_mahasiswa',$id_mahasiswa)->delete();
    }
}


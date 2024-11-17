<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;

class PengajuanController extends Controller
{
    public function __construct()
    {
        $this->PengajuanModel = new PengajuanModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data=[
            'pengajuan'=> $this->PengajuanModel->allData(),
        ];
        return view ('v_pengajuan', $data);

    }
    //MELIHAT DETAIL//
    public function detail($id_pengajuan)
    {
        if (!$this->PengajuanModel->detailData($id_pengajuan)) {
            abort(404);
        }
        $data=[
            'pengajuan'=> $this->PengajuanModel->detailData($id_pengajuan),
        ];
        return view ('v_detailpengajuan', $data);
    }

    //MENAMBAH DATA//
    public function add()
    {
        return view('v_addpengajuan');
    }


    public function insert()
    {
        Request()->validate([
		'no_pend' => 'required',        
		'po' => 'required',
        'jt' => 'required',
        'rr' => 'required',
        
    ],
    [
        'no_pend.required'=> 'Wajib diisi !!',
        'no_pend.unique'=> 'nomor pendaftar sudah ada !!',
        'no_pend.min'=> 'min 6 karakter !!',
        'no_pend.max'=> 'max 6 karakter !!',
        'nama.required'=> 'Wajib diisi !!',
        'nama.unique'=> 'nama pendaftar sudah ada !!',
        'po.required'=> 'Wajib diisi !!',
        'jt.required'=> 'Wajib diisi !!',
		'rr.required'=> 'Wajib diisi !!',

    ]);

        $data = [
		'no_pend'=> Request()->no_pend,
        'po' => Request()->po,
        'jt' => Request()->jt,
        'rr' => Request()->rr,        

        ];

        $this->PengajuanModel->addData($data);
        return redirect()->route('pengajuan')->with('pesan','data Berhasil Ditambah !!');

    }

    //MENGEDIT DATA/
    public function edit($id_pengajuan)
    {
        if (!$this->PengajuanModel->detailData($id_pengajuan)) {
            abort(404);
        }
        $data=[
            'pengajuan'=> $this->PengajuanModel->detailData($id_pengajuan),
        ];
        return view('v_editpengajuan', $data);
    }

    public function update($id_pengajuan)
    {
        Request()->validate([
        'po' => 'required|in:Rendah,Sedang,Tinggi',
        'jt' => 'required|in:Sedikit,Sedang,Banyak',
        'rr' => 'required|in:Rendah,Sedang,Tinggi',
        'kategori' => 'required|in:Kategori 1,Kategori 2,Kategori 3,Kategori 4',
        
    ],
    [
        
        'po.in'=> 'Harus sesuai dengan list yg tersedia !!',
        'jt.required'=> 'Wajib diisi !!',
        'rr.required'=> 'Wajib diisi !!',
        'kategori.in' =>'Harus sesuai dengan kategori yg tersedia',

    ]);

        $data = [
        'po' => Request()->po,
        'jt' => Request()->jt,
        'rr' => Request()->rr,
        'kategori' => Request()->kategori,
        

        ];

        $this->PengajuanModel->editData($id_pengajuan, $data);
        
        return redirect()->route('pengajuan')->with('pesan','data Berhasil Di Update !!');

    }
    public function delete($id_pengajuan)
	{

		$this->PengajuanModel->deleteData($id_pengajuan);
		return redirect()->route('pengajuan')->with('pesan','data Berhasil Dihapus !!');
	}
    
}

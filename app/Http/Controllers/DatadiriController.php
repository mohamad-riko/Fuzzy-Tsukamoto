<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatadiriModel;

class DatadiriController extends Controller
{
   
	public function __construct()
    {
        $this->DatadiriModel = new DatadiriModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data=[
            'datadiri'=> $this->DatadiriModel->allData(),
        ];
        return view ('v_datadiri', $data);

    }
    //MELIHAT DETAIL//
    public function detail($id_pengajuan)
    {
        if (!$this->DatadiriModel->detailData($id_pengajuan)) {
            abort(404);
        }
        $data=[
            'datadiri'=> $this->DatadiriModel->detailData($id_pengajuan),
        ];
        return view ('v_detaildatadiri', $data);
    }

    //MENAMBAH DATA//
    public function add()
    {
        return view('v_adddatadiri');
    }


    public function insert()
    {
        Request()->validate([
        'po' => 'required',
        'jt' => 'required',
        'rr' => 'required',
        'kategori' => 'required',
        
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

    ]);

        $data = [
        'po' => Request()->po,
        'jt' => Request()->jt,
        'rr' => Request()->rr,
        'kategori' => Request()->kategori,
        

        ];

        $this->AturanModel->addData($data);
        return redirect()->route('aturan')->with('pesan','data Berhasil Ditambah !!');

    }

    //MENGEDIT DATA/
    public function edit($id_aturan)
    {
        if (!$this->AturanModel->detailData($id_aturan)) {
            abort(404);
        }
        $data=[
            'aturan'=> $this->AturanModel->detailData($id_aturan),
        ];
        return view('v_editaturan', $data);
    }

    public function update($id_aturan)
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

        $this->AturanModel->editData($id_aturan, $data);
        
        return redirect()->route('aturan')->with('pesan','data Berhasil Di Update !!');

    }
    public function delete($id_aturan)
	{

		$this->AturanModel->deleteData($id_aturan);
		return redirect()->route('aturan')->with('pesan','data Berhasil Dihapus !!');
	}
    

}

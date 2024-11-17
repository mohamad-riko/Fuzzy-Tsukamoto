<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaModel;

class KriteriaController extends Controller
{
    public function __construct()
    {
        $this->KriteriaModel = new KriteriaModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data=[
            'kriteria'=> $this->KriteriaModel->allData(),
        ];
        return view ('v_kriteria', $data);

    }

    //MELIHAT DETAIL//
    public function detail($id_kriteria)
    {
        if (!$this->KriteriaModel->detailData($id_kriteria)) {
            abort(404);
        }
        $data=[
            'kriteria'=> $this->KriteriaModel->detailData($id_kriteria),
        ];
        return view ('v_detailkriteria', $data);
    }

    //MENAMBAH DATA//
    public function add()
    {
        return view('v_addkriteria');
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


}

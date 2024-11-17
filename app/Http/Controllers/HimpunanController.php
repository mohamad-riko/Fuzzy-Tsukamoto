<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HimpunanModel;

class HimpunanController extends Controller
{
       public function __construct()
    {
        $this->HimpunanModel = new HimpunanModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data=[
            'himpunan'=> $this->HimpunanModel->allData(),
        ];
        return view ('v_himpunan', $data);

    }
    //detai//

     //MENAMBAH DATA//
    public function add()
    {
        return view('v_addhimpunan');
    }


    public function insert()
    {
        Request()->validate([
        'id_variabel' => 'required',
        'kode' => 'required',
        'nama_himpunan' => 'required',
        'range' => 'required',
        'kurva' => 'required',
        
    ],
    [
        'id_variabel'=> 'Wajib diisi !!',
        'kode'=> 'Wajib diisi !!',
        'kode.max'=> 'max 2 karakter !!',
        'kode.min'=> 'min 2 karakter !!',
        'nama_himpunan'=> 'Wajib diisi !!',
        'range'=> 'Wajib diisi !!',
        'kurva'=> 'Wajib diisi !!',

    ]);

        $data = [
        'id_variabel' => Request()->id_variabel,
        'kode' => Request()->kode,
        'nama_himpunan' => Request()->nama_himpunan,
        'range' => Request()->range,
        'kurva' => Request()->kurva,
        

        ];

        $this->HimpunanModel->addData($data);
        return redirect()->route('himpunan')->with('pesan','data Berhasil Ditambah !!');

    }

    //MENGEDIT DATA/
    public function edit($id_variabel_himpunan)
    {
       if (!$this->HimpunanModel->detailData($id_variabel_himpunan)) {
            abort(404);
        }
        $data=[
           'tbl_himpunan'=> $this->HimpunanModel->detailData($id_variabel_himpunan),
        ];
        return view('v_edithimpunan');
    }

    public function update($id_variabel_himpunan)
    {
        Request()->validate([
        'id_variabel' => 'required',
        'kode' => 'required',
        'himpunan' => 'required',
        'range' => 'required',
        'kurva' => 'required',
        
    ],
    [
        'id_variabel.required'=>'wajib diisi !!!',
        'kode.required'=>'wajib diisi !!!', 
        'himpunan.required'=>'wajib diisi !!!', 
        'range.required'=>'wajib diisi !!!', 
        'kurva.required'=>'wajib diisi !!!', 

    ]);

        $data = [
        'id_variabel' => Request()->id_variabel,
        'kode' => Request()->kode,
        'himpunan' => Request()->himpunan,
        'range' => Request()->range,
        'kurva' => Request()->kurva,
        

        ];

        $this->HimpunanModel->editData($id_variabel_himpunan, $data);
        
        return redirect()->route('himpunan')->with('pesan','data Berhasil Di Update !!');

    }

    public function delete($id_variabel_himpunan)
    {

        $this->HimpunanModel->deleteData($id_variabel_himpunan);
        return redirect()->route('himpunan')->with('pesan','data Berhasil Dihapus !!');
    }

}

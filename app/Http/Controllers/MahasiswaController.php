<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;


class MahasiswaController extends Controller
{
	public function __construct()
	{
		$this->MahasiswaModel = new MahasiswaModel();
		$this->middleware('auth');
	}

	public function index()
	{

		$data=[
			'mahasiswa'=> $this->MahasiswaModel->allData(),
		];
		return view ('v_mahasiswa', $data);

	}

	//MELIHAT DETAIL//
	public function detail($id_mahasiswa)
	{
		if (!$this->MahasiswaModel->detailData($id_mahasiswa)) {
			abort(404);
		}
		$data=[
			'mahasiswa'=> $this->MahasiswaModel->detailData($id_mahasiswa),
		];
		return view ('v_detailmahasiswa', $data);
	}

	//MENAMBAH DATA//
	public function add()
	{
		return view('v_addmahasiswa');
	}

	public function insert()
	{
		Request()->validate([
        'no_pend' => 'required|unique:tbl_mahasiswa,no_pend|min:6|max:6',
        'nama' => 'required',
        'po' => 'required',
        'jt' => 'required',
        'ur' => 'required',
        'rl' => 'required',
        'rp' => 'required',
        'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png|max:2022',
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
    	'ur.required'=> 'Wajib diisi !!',
    	'rl.required'=> 'Wajib diisi !!',
    	'rp.required'=> 'Wajib diisi !!',
    	'foto_mahasiswa.required'=> 'Harap Mengunggah foto !!',

    	
    
    ]);

		//upload Gambar// 
		$file = Request()->foto_mahasiswa;
		$fileName = Request()->no_pend.'.'.$file->extension();
		$file->move(public_path('foto_mahasiswa'), $fileName);

		$data = [
		'no_pend' => Request()->no_pend,
		'nama' => Request()->nama,
		'po' => Request()->po,
		'jt' => Request()->jt,
		'ur' => Request()->ur,
		'rl' => Request()->rl,
		'rp' => Request()->rp,
		'foto_mahasiswa' => $fileName,

		];

		$this->MahasiswaModel->addData($data);
		return redirect()->route('mahasiswa')->with('pesan','data Berhasil Ditambah !!');

	}


	//MENGEDIT DATA/
	public function edit($id_mahasiswa)
	{
		if (!$this->MahasiswaModel->detailData($id_mahasiswa)) {
			abort(404);
		}
		$data=[
			'mahasiswa'=> $this->MahasiswaModel->detailData($id_mahasiswa),
		];
		return view('v_editmahasiswa',$data);
	}


	public function update($id_mahasiswa)
	{
		Request()->validate([
        'no_pend' => 'required|min:6|max:6',
        'nama' => 'required',
        'po' => 'required',
        'jt' => 'required',
        'ur' => 'required',
        'rl' => 'required',
        'rp' => 'required',
        'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png|max:2022',
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
    	'ur.required'=> 'Wajib diisi !!',
    	'rl.required'=> 'Wajib diisi !!',
    	'rp.required'=> 'Wajib diisi !!',
    	'foto_mahasiswa.required'=> 'Harap Mengunggah foto !!',

    	
    
    ]);

		//upload Gambar// 
		$file = Request()->foto_mahasiswa;
		$fileName = Request()->no_pend.'.'.$file->extension();
		$file->move(public_path('foto_mahasiswa'), $fileName);

		$data = [
		'no_pend' => Request()->no_pend,
		'nama' => Request()->nama,
		'po' => Request()->po,
		'jt' => Request()->jt,
		'ur' => Request()->ur,
		'rl' => Request()->rl,
		'rp' => Request()->rp,
		'foto_mahasiswa' => $fileName,

		];

		$this->MahasiswaModel->addData($id_mahasiswa, $data);
		return redirect()->route('mahasiswa')->with('pesan','data Berhasil update !!');
	}
	public function delete($id_mahasiswa)
	{
		$mahasiswa = $this->MahasiswaModel->detailData($id_mahasiswa);
		if ($mahasiswa->foto_mahasiswa <> "") {
			unlink(public_path('foto_mahasiswa').'/'. $mahasiswa->foto_mahasiswa);
		}

		$this->MahasiswaModel->deleteData($id_mahasiswa);
		return redirect()->route('mahasiswa')->with('pesan','data Berhasil Dihapus !!');
	}

}

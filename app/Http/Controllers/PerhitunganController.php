<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerhitunganModel;
use Techarea\Phuzzy\Phuzzy;

class PerhitunganController extends Controller
{
    public function __construct()
    {
        $this->PerhitunganModel = new PerhitunganModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'perhitungan' => $this->PerhitunganModel->allData(),
        ];

        return view('v_perhitungan', $data);
    }
    //MELIHAT DETAIL//
    public function detail($id_perhitungan)
    {
        if (!$this->PerhitunganModel->detailData($id_perhitungan)) {
            abort(404);
        }
        $data = [
            'perhitungan' => $this->PerhitunganModel->detailData($id_perhitungan),
        ];
        return view('v_detailperhitungan', $data);
    }

    //MENAMBAH DATA//
    public function add()
    {
        return view('v_addperhitungan');
    }

    public function insert()
    {
        Request()->validate(
            [
                'no_pendaftaran' => 'required',
                'nama' => 'required',
                'po' => 'required',
                'jt' => 'required',
                'rr' => 'required',


            ],
            [
                'no_pendaftaran' => 'Wajib diisi !!',
                'nama' => 'Wajib diisi !!',
                'po' => 'max 2 karakter !!',
                'jt' => 'min 2 karakter !!',
                'rr' => 'Wajib diisi !!',



            ]
        );
        //perhitungan 
        $phuzzy = new Phuzzy;

        $phuzzy->clearMembers();

        $phuzzy->setInputNames([
            'penghasilan_orang_tua',
            'jumlah_anak',
            'rekening_rumah'
        ]);

        $phuzzy->setOutputNames(['kategori_ukt']);

        $phuzzy->addMember('penghasilan_orang_tua', 'rendah', 0, 500, 1500, 'LEFT_INFINITY');
        $phuzzy->addMember('penghasilan_orang_tua', 'sedang', 1000, 2250, 3500, 'TRIANGLE');
        $phuzzy->addMember('penghasilan_orang_tua', 'tinggi', 2500, 4000, 5000, 'RIGHT_INFINITY');

        $phuzzy->addMember('jumlah_anak', 'sedikit', 0, 1, 3, 'LEFT_INFINITY');
        $phuzzy->addMember('jumlah_anak', 'sedang', 2, 3, 4, 'TRIANGLE');
        $phuzzy->addMember('jumlah_anak', 'banyak', 3, 5, 6, 'RIGHT_INFINITY');

        $phuzzy->addMember('rekening_rumah', 'rendah', 0, 100, 200, 'LEFT_INFINITY');
        $phuzzy->addMember('rekening_rumah', 'sedang', 100, 200, 300, 'TRIANGLE');
        $phuzzy->addMember('rekening_rumah', 'tinggi', 200, 300, 400, 'RIGHT_INFINITY');

        $phuzzy->addMember('kategori_ukt', 'satu', 500, 500, 1500, 'LEFT_INFINITY');
        $phuzzy->addMember('kategori_ukt', 'dua', 500, 1500, 2500, 'TRIANGLE');
        $phuzzy->addMember('kategori_ukt', 'tiga', 1500, 2500, 3500, 'TRIANGLE');
        $phuzzy->addMember('kategori_ukt', 'empat', 2500, 3500, 4500, 'TRIANGLE');
        $phuzzy->addMember('kategori_ukt', 'lima', 3500, 4500, 4500, 'RIGHT_INFINITY');

        $phuzzy->clearRules();

        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.banyak AND rekening_rumah.tinggi THEN kategori_ukt.satu');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.banyak AND rekening_rumah.sedang THEN kategori_ukt.satu');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.banyak AND rekening_rumah.rendah THEN kategori_ukt.satu');

        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedang AND rekening_rumah.tinggi THEN kategori_ukt.satu');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedang AND rekening_rumah.sedang THEN kategori_ukt.satu');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedang AND rekening_rumah.rendah THEN kategori_ukt.satu');

        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedikit AND rekening_rumah.tinggi THEN kategori_ukt.dua');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedikit AND rekening_rumah.sedang THEN kategori_ukt.dua');
        $phuzzy->addRule('IF penghasilan_orang_tua.rendah AND jumlah_anak.sedikit AND rekening_rumah.rendah THEN kategori_ukt.dua');

        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.banyak AND rekening_rumah.tinggi THEN kategori_ukt.dua');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.banyak AND rekening_rumah.sedang THEN kategori_ukt.dua');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.banyak AND rekening_rumah.rendah THEN kategori_ukt.tiga');

        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedang AND rekening_rumah.tinggi THEN kategori_ukt.tiga');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedang AND rekening_rumah.sedang THEN kategori_ukt.tiga');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedang AND rekening_rumah.rendah THEN kategori_ukt.tiga');

        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedikit AND rekening_rumah.tinggi THEN kategori_ukt.tiga');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedikit AND rekening_rumah.sedang THEN kategori_ukt.empat');
        $phuzzy->addRule('IF penghasilan_orang_tua.sedang AND jumlah_anak.sedikit AND rekening_rumah.rendah THEN kategori_ukt.empat');

        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.banyak AND rekening_rumah.tinggi THEN kategori_ukt.empat');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.banyak AND rekening_rumah.sedang THEN kategori_ukt.empat');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.banyak AND rekening_rumah.rendah THEN kategori_ukt.emapt');

        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedang AND rekening_rumah.tinggi THEN kategori_ukt.empat');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedang AND rekening_rumah.sedang THEN kategori_ukt.lima');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedang AND rekening_rumah.rendah THEN kategori_ukt.lima');

        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedikit AND rekening_rumah.tinggi THEN kategori_ukt.lima');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedikit AND rekening_rumah.sedang THEN kategori_ukt.lima');
        $phuzzy->addRule('IF penghasilan_orang_tua.tinggi AND jumlah_anak.sedikit AND rekening_rumah.rendah THEN kategori_ukt.lima');


        $phuzzy->setRealInput('penghasilan_orang_tua', (Request()->po / 1000)); // angka 4800 bisa diganti $request->penghasilan_orang_tua
        $phuzzy->setRealInput('jumlah_anak', Request()->jt); // angka 1  bisa diganti $request->jumlah_anak
        $phuzzy->setRealInput('rekening_rumah', (Request()->rr / 1000)); // angka 200 bisa diganti $request->rekening_rumah

        $result = $phuzzy->Execute();

        // Dilempar kedalam return view



        $data = [
            'no_pendaftaran' => Request()->no_pendaftaran,
            'nama' => Request()->nama,
            'po' => Request()->po,
            'jt' => Request()->jt,
            'rr' => Request()->rr,
            'ukt' => ($result["kategori_ukt"]*1000),


        ];

        $this->PerhitunganModel->addData($data);
        return redirect()->route('perhitungan')->with('pesan', 'data Berhasil Ditambah !!');
    }
}

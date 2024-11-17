<?php 

require __DIR__ . '/vendor/autoload.php';
 // awal
$phuzzy = new Techarea\Phuzzy\Phuzzy;

$phuzzy->clearMembers();

$phuzzy->setInputNames([
    'penghasilan_orang_tua',
    'jumlah_anak',
    'rekening_rumah'
]);

$phuzzy->setOutputNames(['kategori_ukt']);

$phuzzy->addMember('penghasilan_orang_tua','rendah', 0,500,1500, 'LEFT_INFINITY');
$phuzzy->addMember('penghasilan_orang_tua','sedang', 1000,2250,3500, 'TRIANGLE');
$phuzzy->addMember('penghasilan_orang_tua','tinggi', 2500,4000,5000, 'RIGHT_INFINITY');

$phuzzy->addMember('jumlah_anak','sedikit', 0,1,3, 'LEFT_INFINITY');
$phuzzy->addMember('jumlah_anak','sedang', 2,3,4, 'TRIANGLE');
$phuzzy->addMember('jumlah_anak','banyak', 3,5,6, 'RIGHT_INFINITY');

$phuzzy->addMember('rekening_rumah','rendah', 0,100,200, 'LEFT_INFINITY');
$phuzzy->addMember('rekening_rumah','sedang', 100,200,300, 'TRIANGLE');
$phuzzy->addMember('rekening_rumah','tinggi', 200,300,400, 'RIGHT_INFINITY');

$phuzzy->addMember('kategori_ukt','satu', 500,500,1500, 'LEFT_INFINITY');
$phuzzy->addMember('kategori_ukt','dua', 500,1500,2500, 'TRIANGLE');
$phuzzy->addMember('kategori_ukt','tiga', 1500,2500,3500, 'TRIANGLE');
$phuzzy->addMember('kategori_ukt','empat', 2500,3500,4500, 'TRIANGLE');
$phuzzy->addMember('kategori_ukt','lima', 3500,4500,4500, 'RIGHT_INFINITY');

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


$phuzzy->setRealInput('penghasilan_orang_tua',4800); // angka 4800 bisa diganti $request->penghasilan_orang_tua
$phuzzy->setRealInput('jumlah_anak', 1); // angka 1  bisa diganti $request->jumlah_anak
$phuzzy->setRealInput('rekening_rumah',200); // angka 200 bisa diganti $request->rekening_rumah

$result = $phuzzy->Execute();

echo $result["kategori_ukt"]; // Dilempar kedalam return view

//akhir
?>
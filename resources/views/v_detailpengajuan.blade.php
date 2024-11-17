@extends('layout.v_template')
@section('title','Detail Pengajuan')
@section('content')

<div class="box">
	<div class="box-header with-border">

<table class="table">
	<tr>
		<th width="180px">No Pendaftaran</th>
		<th width="30px">:</th>
		<th>{{ $pengajuan->no_pend}}</th>
	</tr>

<tr>
		<th width="180px">Nama Mahasiswa</th>
		<th width="30px">:</th>
		<th>{{ $pengajuan->nama}}</th>
	</tr>

	<tr>
		<th width="180px">Penghasilan Orang Tua</th>
		<th width="30px">:</th>
		<th>{{ $pengajuan->po }}</th>
	</tr>

	<tr>
		<th width="150px">Jumlah Tanggungan</th>
		<th width="30px">:</th>
		<th>{{ $pengajuan->jt }}</th>
	</tr>

	<tr>
		<th width="150px">Rekening Rumah</th>
		<th width="30px">:</th>
		<th>{{ $pengajuan->rr }}</th>
	</tr>
	
	<tr> 
		<a href="/pengajuan" class="btn btn-success btn-sm">Kembali</a>
	</tr>

</table>

	</div>
</div>

@endsection
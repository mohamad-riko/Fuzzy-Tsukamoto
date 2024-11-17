@extends('layout.v_template')
@section('title','Detail')
@section('content')

<div class="box">
	<div class="box-header with-border">

<table class="table">
	<tr>
		<th width="180px">Penghasilan Orang Tua</th>
		<th width="30px">:</th>
		<th>{{ $aturan->po }}</th>
	</tr>

	<tr>
		<th width="150px">Jumlah Tanggungan</th>
		<th width="30px">:</th>
		<th>{{ $aturan->jt }}</th>
	</tr>

	<tr>
		<th width="150px">Rekening Rumah</th>
		<th width="30px">:</th>
		<th>{{ $aturan->rr }}</th>
	</tr>

    <tr>
		<th width="150px">Kategori UKT</th>
		<th width="30px">:</th>
		<th>{{ $aturan->kategori }}</th>
	</tr>

	
	<tr> 
		<a href="/aturan" class="btn btn-success btn-sm">Kembali</a>
	</tr>

</table>

	</div>
</div>

@endsection
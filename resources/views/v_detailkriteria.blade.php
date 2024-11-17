@extends('layout.v_template')
@section('title','Detail')
@section('content')

<table class="table">
	<tr>
		<th width="180px">Nama</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->nama }}</th>
	</tr>

	<tr>
		<th width="150px">Batas Bawah</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->bb }}</th>
	</tr>

	<tr>
		<th width="150px">Batas Tengah</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->bt }}</th>
	</tr>

	<tr>
		<th width="150px">Batas Atas</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->ba }}</th>
	</tr>

	<tr>
		<th width="150px">Rekening PDAM</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->nb }}</th>
	</tr>

    <tr>
		<th width="150px">Rekening PDAM</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->nt }}</th>
	</tr>

    <tr>
		<th width="150px">Rekening PDAM</th>
		<th width="30px">:</th>
		<th>{{ $kriteria->na }}</th>
	</tr>

	
	<tr> 
		<a href="/kriteria" class="btn btn-success btn-sm">Kembali</a>
	</tr>

</table>


@endsection
@extends('layout.v_template')
@section('title','ADMIN-PERHITUNGAN')


@section('content')
<div class="box">
	<div class="box-header with-border">
		<a href="/perhitungan/add" class="btn btn-primary btn-sm ">Tambah Perhitungan</a> <br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>No Pendafatran</th>
			<th>Nama Mahasiswa </th>
			<th>Penghasilan Orang Tua</th>
			<th>Jumlah Tanggungan</th>
			<th>Rekening Rumah</th>
			<th>UKT</th>
			<th>Aksi</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1;  ?>
		@foreach ($perhitungan as $data)
			<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $data->no_pendaftaran }}</td>
			<td>{{ $data->nama }}</td>
			<td>{{ $data->po }}</td>
			<td>{{ $data->jt }}</td>
			<td>{{ $data->rr }}</td>
			<td>{{ $data->ukt }}</td>
			<td>
				
				<a href="/perhitungan/edit/{{ $data->id_perhitungan }}" class="btn btn-sm btn-warning">
				Edit</a>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_perhitungan}}">
				  	Delete
              </button>
			</td>
			</tr>
		
		@endforeach
	</tbody>
	</table>

@endsection
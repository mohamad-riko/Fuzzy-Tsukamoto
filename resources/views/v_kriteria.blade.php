@extends('layout.v_template')
@section('title','ADMIN-KRITERIA')


@section('content')
<div class="box">
	<div class="box-header with-border">

<a href="/kriteria/add" class="btn btn-primary btn-sm ">Tambah Kriteria</a> <br>
	
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
	</button>
    <h4><i class="icon fa fa-check"></i> succes!</h4>
		{{ (session('pesan')) }}
    </div>
	@endif

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kriteria</th>
			<th>Batas Bawah</th>
			<th>Batas Tengah</th>
			<th>Batas Atas</th>
			<th>Nilai Bawah </th>
			<th>Nilai Tengah</th>
			<th>Nilai Atas </th>
            <th>Aksi</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1;  ?>
		@foreach ($kriteria as $data)
			<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $data->nama }}</td>
			<td>{{ $data->bb }}</td>
			<td>{{ $data->bt }}</td>
			<td>{{ $data->ba }}</td>
			<td>{{ $data->nb }}</td>
            <td>{{ $data->nt }}</td>
            <td>{{ $data->na }}</td>
			<td>
				<a href="/kriteria/detail/{{ $data->id_kriteria}}" class="btn btn-sm btn-success">
				Detail</a>
				<a href="/kriteria/edit/{{ $data->id_kriteria}}" class="btn btn-sm btn-warning">
				Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_kriteria}}">
				  	Delete
              </button>
			</td>
			</tr>
		
		@endforeach
	</tbody>
	</table>

@foreach ($kriteria as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_kriteria}}">
	<div class="modal-dialog modal-xl">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title">Delete</h4>
		</div>
		<div class="modal-body">
		  <p>Apakah anda yakin ingin menghapus data ini ...??</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
		  <a href="/kriteria/delete/{{ $data->id_kriteria}}" class="btn btn-outline">Yes</a>
		</div>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
  </div>
@endforeach
</div>
</div>
@endsection
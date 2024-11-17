@extends('layout.v_template')
@section('title','Data Himpunan')


@section('content')
<div class="box">
	<div class="box-header with-border">

<a href="/himpunan/add" class="btn btn-primary btn-sm ">Tambah Himpunan</a> <br>
	
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
			<th>Variabel</th>
			<th>Kode </th>
			<th>Himpunan</th>
			<th>Range</th>
			<th>Kurva</th>
			<th>Aksi</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		<?php $no=1;  ?>
		@foreach ($himpunan as $data)
			<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $data->id_variabel }}</td>
			<td>{{ $data->kode }}</td>
			<td>{{ $data->nama_himpunan }}</td>
			<td>{{ $data->range }}</td>
			<td>{{ $data->kurva }}</td>
			<td>
				
				<a href="/himpunan/edit/{{ $data->id_variabel_himpunan }}" class="btn btn-sm btn-warning">
				Edit</a>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_variabel_himpunan}}">
				  	Delete
              </button>
			</td>
			</tr>
		
		@endforeach
	</tbody>
	</table>

@foreach ($himpunan as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_variabel_himpunan}}">
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
		  <a href="/himpunan/delete/{{ $data->id_variabel_himpunan }}" class="btn btn-outline">Yes</a>
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
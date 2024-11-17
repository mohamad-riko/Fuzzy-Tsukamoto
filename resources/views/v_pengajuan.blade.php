@extends('layout.v_template')
@section('title','ADMIN-PENGAJUAN')


@section('content')
<div class="box">
	<div class="box-header with-border">

<a href="/pengajuan/add" class="btn btn-primary btn-sm ">Tambah </a> <br>
	
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
			<th><center>No</center> </th>
            <th><center>No Pend</center> </th>
            <th><center>Nama Mahasiswa</center> </th>
			<th><center>Penghasilan Orang Tua</center></th>
			<th><center>Jumlah Tanggungan</center> </th>
			<th><center>Rekening Rumah</center></th>
			<th><center>Aksi</center> </th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;  ?>
		@foreach ($pengajuan as $data)
			<tr>
			<td>
				<center>{{ $no++ }}</center>
			</td>
            <td>
            	<center>{{ $data->no_pend }}</center>
            </td>
            <td>
            	<center>{{ $data->nama}}</center>
            </td>
			<td>
				<center>{{ $data->po }}</center>
			</td>
			<td>
				<center>{{ $data->jt }} </center>
			</td>
			<td>
				<center>{{ $data->rr }}</center>
				</td>
			<td>
				<a href="/pengajuan/detail/{{ $data->id_pengajuan}}" class="btn btn-sm btn-success">
				Detail</a>
				<a href="/pengajuan/edit/{{ $data->id_pengajuan}}" class="btn btn-sm btn-warning">
				Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_pengajuan}}">
				  	Delete
              </button>
			</td>
			</tr>
		
		@endforeach
	</tbody>
	</table>

@foreach ($pengajuan as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_pengajuan}}">
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
		  <a href="/pengajuan/delete/{{ $data->id_pengajuan }}" class="btn btn-outline">Yes</a>
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
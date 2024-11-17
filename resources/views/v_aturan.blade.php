@extends('layout.v_template')
@section('title','ADMIN-RULE ATAU ATURAN')


@section('content')
<div class="box">
	<div class="box-header with-border">

<a href="/aturan/add" class="btn btn-primary btn-sm ">Tambah Aturan</a> <br>
	
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
			<th>Penghasilan Orang Tua</th>
			<th>Jumlah Tanggungan </th>
			<th>Rekening Rumah</th>
			<th>Kategori UKT</th>
			<th>Aksi</th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		@foreach ($aturan as $key => $data)
			<tr>
			<td>{{ $aturan->firstItem() + $key }}</td>
			<td>{{ $data->po }}</td>
			<td>{{ $data->jt }}</td>
			<td>{{ $data->rr }}</td>
			<td>{{ $data->kategori }}</td>
			<td>
				<a href="/aturan/detail/{{ $data->id_aturan}}" class="btn btn-sm btn-success">
				Detail</a>
				<a href="/aturan/edit/{{ $data->id_aturan}}" class="btn btn-sm btn-warning">
				Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_aturan}}">
				  	Delete
              </button>
			</td>
			</tr>
		
		@endforeach
	</tbody>
	</table>
	<div>
		Showing
		{{ $aturan->firstItem() }}
		of
		{{ $aturan->lastItem() }}
	</div>
	<div class="pull-right">
		{{ $aturan->links()}}
		</div>


@foreach ($aturan as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_aturan}}">
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
		  <a href="/aturan/delete/{{ $data->id_aturan }}" class="btn btn-outline">Yes</a>
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
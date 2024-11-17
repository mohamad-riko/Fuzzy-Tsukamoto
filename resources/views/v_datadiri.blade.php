@extends('layout.v_template')
@section('title','Data Diri User')


@section('content')
<div class="box">
	<div class="box-header with-border">

<a href="/datadiri/add" class="btn btn-primary btn-sm ">Tambah Data</a> <br>
	
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
	</button>
    <h4><i class="icon fa fa-check"></i> succes!</h4>
		{{ (session('pesan')) }}
    </div>
	@endif
    </div>
</div>


@endsection
  
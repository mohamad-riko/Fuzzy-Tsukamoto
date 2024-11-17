@extends('layout.v_template')
@section('title','Add pengajuan')
@section('content')

<form action="/pengajuan/insert" method="POST" enctype="multipart/form-data"> 
	@csrf 
	
		<div class="content">
			<div class="row">
				<div class="col-sm-6"> 		

                <div class="form-group">
						  <label for="inputNoPendaftaran">Nomor Pendaftaran</label>
						  <div class="text-danger">
						@error('no_pend')
							{{ $message }}
						@enderror
	
					<div class="form-group">
						  <label for="inputPenghasilanOrangTua">Penghasilan Tua</label>
						  <div class="text-danger">
						@error('po')
							{{ $message }}
						@enderror
									
					<div class="form-group">
						  <label for="JumlahTanggungan">Jumlah Tanggungan</label>
						  <div class="text-danger">
						@error('jt')
							{{ $message }}
						@enderror
					

					<div class="form-group">
						  <label for="RekeningRumah">Rekening Rumah</label>
						  <div class="text-danger">
						@error('rr')
							{{ $message }}
						@enderror
                        
					
						<button class="btn btn-primary btn-sm">Simpan</button>
						<a href="/pengajuan" class="btn btn-success btn-sm">Kembali</a>
	
					</div>	
				</div>
				
				</div> 
			</div>
		</div>
	
	</form>
	

@endsection
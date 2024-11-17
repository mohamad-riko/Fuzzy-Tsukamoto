@extends('layout.v_template')
@section('title','TAMBAH HIMPUNAN')
@section('content')

<form action="/perhitungan/insert/" method="POST" enctype="multipart/form-data"> 
@csrf
	<div class="content">
			<div class="row">
				<div class="col-sm-6"> 		
	
					<div class="form-group">
						<label>No Pendaftaran</label>
							<input name="no_pendaftaran" class="form-control">
					</div>	

					<div class="form-group">
						<label>Nama Mahasiswa</label>
							<input name="nama" class="form-control">
					</div>	

					<div class="form-group">
						<label>Penghasilan Orang Tua </label>
							<input name="po" class="form-control">
					</div>				
				
					
					<div class="form-group">
						<label>Jumlah Tanggungan</label>
							<input name="jt" class="form-control">
					</div>			


					<div class="form-group">
						<label>Rekening Rumah</label>
							<input name="rr" class="form-control">
					</div>				
					
						<button class="btn btn-primary btn-sm">Simpan</button>
						<a href="/aturan" class="btn btn-success btn-sm">Kembali</a>
	
					</div>	
				</div>
				
				</div> 
			</div>
		</div>
	
	</form>

	
@endsection
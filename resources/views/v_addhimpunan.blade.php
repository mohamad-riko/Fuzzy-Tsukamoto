@extends('layout.v_template')
@section('title','TAMBAH HIMPUNAN')
@section('content')

<form action="/himpunan/insert/" method="POST" enctype="multipart/form-data"> 
@csrf
	<div class="content">
			<div class="row">
				<div class="col-sm-6"> 		
	
					<div class="form-group">
						  <label for="inputVariabel">Variabel</label>
						  <div class="text-danger">
						@error('id_variabel')
							{{ $message }}
						@enderror
						<select id="inputVariabel" class="form-control" name="id_variabel" class="form-control" value="{{old('id_variabel')}}">
									<option>{{ old('id_variabel')}}</option>
										<option>Penghasilan Orang Tua</option>
									   <option>Jumlah Tanggungan</option>			       					
									   <option>Rekening Rumah</option>
						 </select>
						 </div>
						</div>
					
					<div class="form-group">
						  <label for="Kode">Kode</label>
						  <div class="text-danger">
						@error('kode')
							{{ $message }}
						@enderror
						<select id="Kode" class="form-control" name="kode" class="form-control" value="{{old('kode')}}">
									<option>{{ old('kode')}}</option>
										<option>SD</option>
										<option>RD</option>
									   <option>TG</option>			       							 
									   <option>BK</option>
						 </select>
						 </div>
						</div>

							<div class="form-group">
						  <label for="Himpunan">Himpunan</label>
						  <div class="text-danger">
						@error('himpunan')
							{{ $message }}
						@enderror
						<select id="Himpunan" class="form-control" name="himpunan" class="form-control" value="{{old('himpunan')}}">
									<option>{{ old('himpunan')}}</option>
										<option>Rendah</option>
										<option>Sedang</option>
										<option>Sedikit</option>
									   <option>Banyak</option>			       							 
									   <option>Tinggi</option>
						 </select>
						 </div>
						</div>
	
					<div class="form-group">
						<label>Range</label>
							<input name="range" class="form-control">
								</div>	

					<div class="form-group">
						<label for="Himpunan">Kurva</label>
							  <div class="text-danger">
						@error('kurva')
							{{ $message }}
						@enderror
							<select id="kurva" class="form-control" name="kurva" class="form-control" value="{{old('kurva')}}">
									<option>{{ old('kurva')}}</option>
									<option>Linear Turun</option>
									<option>Segitia</option>
									<option>Linier Turun</option>
									
						 </select>
						 </div>
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
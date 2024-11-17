@extends('layout.v_template')
@section('title','Add Aturan')
@section('content')

<form action="/aturan/insert" method="POST" enctype="multipart/form-data"> 
	@csrf 
	
		<div class="content">
			<div class="row">
				<div class="col-sm-6"> 		
	
					<div class="form-group">
						  <label for="inputPenghasilanOrangTua">Penghasilan Tua</label>
						  <div class="text-danger">
						@error('po')
							{{ $message }}
						@enderror
						<select id="inputPenghasilanOrangTua" class="form-control" name="po" class="form-control" value="{{old('po')}}">
									<option>{{ old('po')}}</option>
										<option>Rendah</option>
									   <option>Sedang</option>			       							 
									   <option>Tinggi</option>
						 </select>
						 </div>
						</div>
					
					<div class="form-group">
						  <label for="JumlahTanggungan">Jumlah Tanggungan</label>
						  <div class="text-danger">
						@error('jt')
							{{ $message }}
						@enderror
						<select id="JumlahTanggungan" class="form-control" name="jt" class="form-control" value="{{old('jt')}}">
									<option>{{ old('jt')}}</option>
										<option>Sedikit</option>
									   <option>Sedang</option>			       							 
									   <option>Banyak</option>
						 </select>
						 </div>
						</div>

							<div class="form-group">
						  <label for="RekeningRumah">Rekening Rumah</label>
						  <div class="text-danger">
						@error('rr')
							{{ $message }}
						@enderror
						<select id="RekeningRumah" class="form-control" name="rr" class="form-control" value="{{old('jt')}}">
									<option>{{ old('rr')}}</option>
										<option>Rendah</option>
									   <option>Sedang</option>			       							 
									   <option>Tinggi</option>
						 </select>
						 </div>
						</div>
	

	
							<div class="form-group">
						  <label for="KategoriUKT">Kategori UKT</label>
						  <div class="text-danger">
						@error('kategori')
							{{ $message }}
						@enderror
						<select id="KategoriUKT" class="form-control" name="kategori" class="form-control" value="{{old('kategori')}}">
									<option>{{ old('kategori')}}</option>
										<option>Kategori 1</option>
									   <option>Kategori 2</option>
									   <option>Kategori 3</option>
									   <option>Kategori 4</option>		
									   <option>Kategori 5</option>	      							
									   <option>Kategori 3</option>
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
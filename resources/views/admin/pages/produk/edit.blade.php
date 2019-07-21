@extends('admin.main')
@section('title','Edit Produk')
@section('content')
<h1>Produk <small>Edit</small></h1>
<hr>

<div class="row">
	<div class="col-md-6 mb-3">
		<form method="post" action="{{ route('admin.produk.edit',['id'=>$rc->id]) }}">
		{{ csrf_field() }}
		<div class="card">
			<div class="card-header">
				<h5>Ubah Data Produk</h5>
			</div><!-- End Card Header -->

			<div class="card-body">
				
				<!-- Input gambar -->
				<div class="form-group form-label-group">
				<img src="{{url('storage/gambar-produk/'.$rc->gambar_produk)}}"
				width="100" align="middle">
				<a href="#"
				class="btn btn-info">
					<i class="fa fa-image">Ubah Gambar</i>
				</a>
				</div>

				<!-- Input kode produk -->
				<div class="form-group form-label-group">
				<input type="text" name="kode"
				class="form-control {{$errors->has('kode')?'is-invalid':''}}"
				value="{{ old('kode',$rc->kode_produk) }}"
				id="iKode" placeholder="Kode Produk" required>
				<label for="iKode">Kode Produk</label>
				@if($errors->has('kode'))
				<div class="invalid-feedback">{{$errors->first('kode')}}</div>
				@endif
				</div>

				<!-- Input nama produk -->
				<div class="form-group form-label-group">
					<input type="text" name="nama_produk"
					class="form-control {{$errors->has('nama_produk')?'is-invalid':''}}"
					value="{{ old('nama_produk',$rc->nama_produk) }}"
					id="iNamaProduk" placeholder="Nama Produk" required>
					<label for="iNamaProduk">Nama Produk</label>
					@if($errors->has('nama_produk'))
					<div class="invalid-feedback">{{$errors->first('nama_produk')}}</div>
					@endif
				</div>

				<!-- Input harga -->
				<div class="form-group form-label-group">
				<input type="number" name="harga"
				class="form-control {{$errors->has('harga')?'is-invalid':''}}"
				value="{{ old('harga',$rc->harga) }}"
				id="iHarga" placeholder="Harga" required>
				<label for="iHarga">Harga</label>
				@if($errors->has('harga'))
				<div class="invalid-feedback">{{$errors->first('harga')}}</div>
				@endif
				</div>

				<!-- Input kode stok -->
				<div class="form-group form-label-group">
				<input type="number" name="stok"
				class="form-control {{$errors->has('stok')?'is-invalid':''}}"
				value="{{ old('stok',$rc->stok) }}"
				id="iStok" placeholder="Stok" required>
				<label for="iStok">Stok</label>
				@if($errors->has('stok'))
				<div class="invalid-feedback">{{$errors->first('stok')}}</div>
				@endif
				</div>

				<!-- Input kategori -->
				<div class="form-group">
					<select name="kategori"
					class="form-control {{$errors->has('kategori')?'is-invalid':''}}"
					required>
					<?php
					$val = old('kategori',$rc->id_kategori);
					?>
					<option value="-">Pilih Kategori :</option>
					@foreach(\App\Kategori::orderBy('nama_kategori','asc')->get() as $d)
					<option value="{{ $d->id }}" {{$val==$d->id?'selected':''}}> 
						{{ $d->nama_kategori }}
					</option>
					@endforeach
					</select>
					@if($errors->has('kategori'))
				<div class="invalid-feedback">{{$errors->first('kategori')}}</div>
				@endif
				</div>

			</div><!-- End Card Body -->

			<div class="card-footer">
				<button class="btn btn-primary" type="submit">Update</button>
			</div><!-- End Card Footer -->

		</div><!-- End Card -->
		</form>

	</div>
	
</div><!-- End Row -->
@endsection



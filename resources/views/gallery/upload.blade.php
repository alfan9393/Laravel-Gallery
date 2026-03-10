@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow-sm">

<div class="card-header bg-dark text-white">
<h5 class="mb-0">Upload Foto</h5>
</div>

<div class="card-body">

<form action="{{ route('foto.tambah') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label class="form-label">Judul Foto</label>
<input type="text" name="judul" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Deskripsi</label>
<textarea name="deskripsi" class="form-control" rows="3"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Pilih Album</label>

<select name="albumid" class="form-control" required>

@foreach($album as $a)

<option value="{{ $a->AlbumID }}">
{{ $a->NamaAlbum }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label class="form-label">File Foto</label>
<input type="file" name="foto" class="form-control" accept="image/*" required>
</div>

<div class="d-flex justify-content-between">

<a href="/" class="btn btn-secondary">
Kembali
</a>

<button type="submit" class="btn btn-success">
Upload Foto
</button>

</div>

</form>

</div>

</div>

</div>

</div>

@endsection
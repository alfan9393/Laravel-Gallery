@extends('layouts.app')

@section('content')

<h3 class="mb-4">Edit Foto</h3>

<div class="card p-4">

<form action="{{ route('foto.edit',$foto->FotoID) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
<label>Judul Foto</label>
<input type="text" name="judul" class="form-control" value="{{ $foto->JudulFoto }}" required>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control">{{ $foto->DeskripsiFoto }}</textarea>
</div>

<div class="mb-3">
<label>Ganti Foto (Opsional)</label>
<input type="file" name="foto" class="form-control">
</div>

<button class="btn btn-success">Update Foto</button> <a href="/" class="btn btn-secondary">Kembali</a>

</form>

</div>

@endsection

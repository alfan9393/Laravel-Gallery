@extends('layouts.app')

@section('content')

<style>

.comment-box{
    max-height:120px;
    overflow-y:auto;
    font-size:14px;
}

.comment-item{
    background:#f8f9fa;
    padding:5px 8px;
    border-radius:8px;
    margin-bottom:4px;
}

</style>

<h3 class="mb-4">Galeri Foto</h3>

<div class="row">

@foreach($foto as $f)

<div class="col-md-3 mb-4">

<div class="card shadow-sm border-0">

<img src="{{ asset('foto/'.$f->LokasiFile) }}" class="card-img-top">

<div class="card-body">

<h6 class="fw-bold mb-1">
{{ $f->JudulFoto }}
</h6>

<p class="text-muted small mb-2">
{{ $f->DeskripsiFoto }}
</p>

<div class="comment-box mb-2">

@forelse($f->komentar as $k)

<div class="comment-item">

<b>{{ $k->user->Username ?? '-' }}</b> :

{{ $k->IsiKomentar }}

@if(session('role') == 'admin')

<form action="{{ route('komentar.hapus',$k->KomentarID) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Hapus
</button>

</form>

@endif

</div>

@empty

<small class="text-muted">
Belum ada komentar
</small>

@endforelse

</div>

<form action="{{ route('komentar.tambah') }}" method="POST">

@csrf

<input type="hidden" name="fotoid" value="{{ $f->FotoID }}">

<div class="input-group input-group-sm">

<input
type="text"
name="komentar"
class="form-control"
placeholder="Tambah komentar..."
required
>

<button type="submit" class="btn btn-primary">
Kirim
</button>

</div>

</form>

@if(session('role') == 'admin')

<hr>

<a href="{{ route('foto.formEdit',$f->FotoID) }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('foto.hapus',$f->FotoID) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger btn-sm">
Hapus
</button>

</form>

@endif

</div>

</div>

</div>

@endforeach

</div>

@endsection
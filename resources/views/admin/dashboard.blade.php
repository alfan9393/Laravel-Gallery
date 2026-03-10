@extends('layouts.app')

@section('content')

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">

@foreach($foto as $f)

<div class="col-md-3 mb-4">

<div class="card shadow-sm">

<img src="{{ asset('foto/'.$f->LokasiFile) }}" class="card-img-top">

<div class="card-body">

<h6 class="fw-bold">
{{ $f->JudulFoto }}
</h6>

<p class="small text-muted">
{{ $f->DeskripsiFoto }}
</p>

</div>

</div>

</div>

@endforeach

</div>

@endsection
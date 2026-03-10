<!DOCTYPE html>

<html>
<head>
<title>Galeri</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.navbar{
box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card{
border:none;
border-radius:10px;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

.gallery-img{
height:200px;
object-fit:cover;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="/">Galeri</a>

<ul class="navbar-nav ms-auto">

@if(session('role') == 'admin')

<li class="nav-item">
<a class="nav-link" href="/admin">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/">Galeri</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/upload">Upload Foto</a>
</li>

@else

<li class="nav-item">
<a class="nav-link" href="/user">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/">Galeri</a>
</li>

@endif

<li class="nav-item">
<a class="nav-link text-warning" href="/logout">Logout</a>
</li>

</ul>

</div>

</nav>

<div class="container mt-4">

@yield('content')

</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.register-card{
max-width:450px;
margin:auto;
margin-top:80px;
border-radius:10px;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

</style>

</head>
<body>

<div class="container">

<div class="card register-card p-4">

<h4 class="text-center mb-3">Register</h4>

<form method="POST" action="/register">
@csrf

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Nama Lengkap</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-dark w-100">
Register
</button>

</form>

<div class="text-center mt-3">
Sudah punya akun?
<a href="/login">Login</a>
</div>

</div>

</div>

</body>
</html>
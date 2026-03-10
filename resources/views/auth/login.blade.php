<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.login-card{
max-width:400px;
margin:auto;
margin-top:120px;
border-radius:10px;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

</style>

</head>
<body>

<div class="container">

<div class="card login-card p-4">

<h4 class="text-center mb-3">Login</h4>

@if(session('error'))
<div class="alert alert-danger">
{{session('error')}}
</div>
@endif

<form method="POST" action="/login">
@csrf

<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" class="btn btn-dark w-100">
Login
</button>

</form>

<div class="text-center mt-3">
Belum punya akun?
<a href="/register">Register</a>
</div>

</div>

</div>

</body>
</html>
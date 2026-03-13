<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<title>Admin Login</title>

<style>

body{
margin:0;
font-family:Arial, Helvetica, sans-serif;
background:#020617;
display:flex;
align-items:center;
justify-content:center;
height:100vh;
}

/* LOGIN CARD */

.login-card{
width:420px;
background:#132c45;
padding:45px;
border-radius:18px;
box-shadow:0 10px 40px rgba(0,0,0,0.6);
}

/* TITLE */

.login-title{
text-align:center;
font-size:32px;
margin-bottom:35px;
color:#2dd4bf;
}

/* LABEL */

.form-group{
margin-bottom:20px;
}

label{
display:block;
margin-bottom:6px;
color:#94a3b8;
font-size:14px;
}

/* INPUT */

input[type="email"],
input[type="password"]{
width:100%;
padding:12px;
border-radius:8px;
border:1px solid rgba(255,255,255,0.08);
background:#020617;
color:white;
font-size:14px;
}

input:focus{
outline:none;
border-color:#38bdf8;
box-shadow:0 0 10px rgba(56,189,248,0.5);
}

/* REMEMBER ROW */

.remember-row{
display:flex;
align-items:center;
justify-content:space-between;
margin-top:10px;
}

.remember{
display:flex;
align-items:center;
gap:8px;
color:#94a3b8;
font-size:14px;
}

/* BUTTON */

button{
background:linear-gradient(90deg,#2dd4bf,#22d3ee);
border:none;
padding:10px 22px;
border-radius:8px;
color:white;
cursor:pointer;
font-weight:600;
transition:0.3s;
}

button:hover{
transform:translateY(-2px);
box-shadow:0 0 12px rgba(56,189,248,.7);
}

</style>

</head>

<body>

<div class="login-card">

<h2 class="login-title" >Admin Login</h2>

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="form-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<div class="remember-row">

<label class="remember">
<input type="checkbox" name="remember">
Remember me
</label>

<button type="submit">
Log In
</button>

</div>

</form>

</div>

</body>
</html>

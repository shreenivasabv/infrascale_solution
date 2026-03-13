<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Infrascale Admin</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{
background: radial-gradient(circle at top,#0f172a,#020617);
}

.glass-card{
background: rgba(255,255,255,0.05);
backdrop-filter: blur(12px);
border:1px solid rgba(255,255,255,0.08);
}

.sidebar-gradient{
background: linear-gradient(180deg,#020617,#0f172a);
}

.primary-btn{
background: linear-gradient(90deg,#2563eb,#06b6d4);
}

.primary-btn:hover{
opacity:.9;
}

.input-dark{
background:#020617;
border:1px solid #334155;
color:white;
}

.input-dark:focus{
border-color:#06b6d4;
outline:none;
}

</style>

</head>

<body class="text-white">

<div class="flex">

<!-- Sidebar -->

<aside class="w-64 sidebar-gradient text-white flex flex-col p-6 fixed h-screen border-r border-slate-800">

<div class="mb-10 flex justify-center border-b border-slate-800 pb-6">

<img
src="{{ asset('images/logo_main (1).png') }}"
alt="Infrascale"
class="w-100 object-contain">

</div>

<nav class="space-y-3 flex-1">

<a href="{{ route('admin.dashboard') }}"
class="block px-4 py-2 rounded hover:bg-slate-800 transition">
Dashboard
</a>

<a href="{{ route('admin.team') }}"
class="block px-4 py-2 rounded hover:bg-slate-800 transition">
Manage Team
</a>

<a href="{{ route('admin.services') }}"
class="block px-4 py-2 rounded hover:bg-slate-800 transition">
Manage Services
</a>

<a href="{{ route('admin.detailed.services') }}"
class="block px-4 py-2 rounded hover:bg-slate-800 transition">
Detailed Services
</a>

<a href="{{ route('admin.about') }}"
class="block px-4 py-2 rounded hover:bg-slate-800 transition">
Manage About
</a>

</nav>

<form method="POST" action="{{ route('logout') }}">
@csrf

<button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded mt-6">
Logout
</button>

</form>

</aside>


<!-- Main Content -->

<main class="flex-1 ml-64 p-10 min-h-screen overflow-y-auto">

@yield('content')

</main>

</div>

</body>
</html>
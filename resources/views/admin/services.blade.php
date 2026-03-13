@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-cyan-400">Add New Service</h1>

@if(session('success'))
<div class="bg-green-500/20 border border-green-500 text-green-300 p-3 mb-4 rounded">
{{ session('success') }}
</div>
@endif

<div class="glass-card p-6 rounded-xl shadow-lg mb-8">

<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">

@csrf

<div class="mb-4">
<label class="block font-semibold mb-2 text-slate-300">Service Title</label>

<input
type="text"
name="title"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

</div>

<div class="mb-4">

<label class="block font-semibold mb-2 text-slate-300">Category</label>

<select
name="category"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<option>Select a Category</option>

<option value="Virtualization">
Virtualization
</option>

<option value="Storage & Backup">
Storage & Backup
</option>

</select>

</div>

<div class="mb-4">

<label class="block font-semibold mb-2 text-slate-300">Description</label>

<textarea
name="description"
rows="5"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">
</textarea>

</div>

<div class="mb-6">

<label class="block font-semibold mb-2 text-slate-300">Upload Image</label>

<input
type="file"
name="image"
class="w-full p-2 bg-slate-900 border border-slate-700 rounded text-white">

</div>

<button class="primary-btn text-white px-6 py-2 rounded">

Upload & Add Service

</button>

</form>

</div>

@endsection
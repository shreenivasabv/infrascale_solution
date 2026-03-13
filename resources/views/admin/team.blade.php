@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-cyan-400">Manage Team</h1>

<div class="glass-card p-6 rounded-xl shadow-lg mb-10">

<form method="POST"
action="{{ route('admin.team.store') }}"
enctype="multipart/form-data"
class="grid grid-cols-3 gap-4">

@csrf

<input
type="text"
name="name"
placeholder="Name"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"
required>

<input
type="email"
name="email"
placeholder="Email Address"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<input
type="text"
name="designation"
placeholder="Designation"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"
required>

<input
type="text"
name="specialization"
placeholder="Specialization"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<input
type="text"
name="experience"
placeholder="Experience"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<input
type="text"
name="features"
placeholder="Features (comma separated)"
class="p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<input
type="file"
name="image"
class="p-2 bg-slate-900 border border-slate-700 rounded text-white col-span-3">

<button
class="primary-btn text-white py-2 rounded col-span-3">

Add Member

</button>

</form>

</div>

<div class="glass-card p-6 rounded-xl shadow-lg">

<table class="w-full text-slate-300">

<thead>

<tr class="border-b border-slate-700">

<th class="text-left py-2">Name</th>
<th class="text-left py-2">Designation</th>
<th class="text-left py-2">Actions</th>
<th class="text-left py-2">Image</th>

</tr>

</thead>

<tbody>

@foreach($members as $member)

<tr class="border-b border-slate-800">

<td class="py-3">{{ $member->name }}</td>

<td>{{ $member->designation }}</td>

<td>

<form method="POST" action="{{ route('admin.team.delete', $member->id) }}">

@csrf
@method('DELETE')

<button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded">

Delete

</button>

</form>

</td>

<td>

@if($member->image)

<img src="{{ asset($member->image) }}" width="60" class="rounded">

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-cyan-400">Manage About Page</h1>

<div class="glass-card p-6 rounded-xl shadow-lg">

@if(session('success'))
<div class="bg-green-500/20 border border-green-500 text-green-300 p-3 rounded mb-4">
{{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('admin.about.update') }}" class="space-y-6">
@csrf

<div>
<label class="block mb-2 font-semibold text-slate-300">Heading</label>

<input type="text"
name="heading"
value="{{ $about->heading }}"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"
placeholder="Enter heading">
</div>

<div>
<label class="block mb-2 font-semibold text-slate-300">Company Description</label>

<textarea
name="description"
rows="5"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">{{ $about->description }}</textarea>

</div>

<div>
<label class="block mb-2 font-semibold text-slate-300">Mission</label>

<textarea
name="mission"
rows="4"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">{{ $about->mission }}</textarea>

</div>

<div>
<label class="block mb-2 font-semibold text-slate-300">Vision</label>

<textarea
name="vision"
rows="4"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">{{ $about->vision }}</textarea>

</div>

<button class="primary-btn text-white px-6 py-2 rounded">
Save About Page
</button>

</form>

</div>

@endsection
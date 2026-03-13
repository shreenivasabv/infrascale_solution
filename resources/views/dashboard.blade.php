@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-cyan-400">
Admin Dashboard
</h1>

<div class="glass-card p-6 rounded-xl shadow-lg">

<h2 class="text-xl font-semibold mb-6 text-white">
User Queries
</h2>

@if($queries->count() > 0)

@foreach($queries as $query)

<div class="border border-slate-700 rounded-lg p-4 mb-4 bg-slate-900/40">

<div class="flex justify-between items-center mb-2">

<div>

<h3 class="font-semibold text-lg text-cyan-300">
{{ $query->name }}
</h3>

<p class="text-sm text-slate-400">

{{ $query->email }}

@if($query->environment)
| {{ $query->environment }}
@endif

</p>

</div>

<span class="text-sm text-slate-500">

{{ $query->created_at->format('d/m/Y') }}

</span>

</div>

<p class="text-slate-300 mb-3">
{{ $query->message }}
</p>

<form method="POST" action="{{ route('admin.query.delete', $query->id) }}">

@csrf
@method('DELETE')

<button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded">

Delete

</button>

</form>

</div>

@endforeach

@else

<p class="text-slate-400">
No queries available.
</p>

@endif

</div>

@endsection
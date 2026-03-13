@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-cyan-400">
Detailed Services
</h1>


@if(session('success'))
<div class="bg-green-500/20 border border-green-500 text-green-300 p-3 rounded mb-6">
{{ session('success') }}
</div>
@endif


<div class="glass-card p-6 rounded-xl shadow-lg mb-8">


<form method="POST" action="{{ route('admin.detailed.services.store') }}">

@csrf


<!-- TITLE -->

<label class="block font-semibold mb-2 text-slate-300">
Title
</label>

<input
name="title"
id="titleInput"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"
onkeyup="generateSlug()"
>


<!-- SLUG -->

<label class="block text-slate-300 mb-2 font-semibold">
Slug (unique)
</label>

<input
name="slug"
id="slugInput"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">


<!-- HERO -->

<label class="block text-slate-300 mb-2 font-semibold">
Hero Description
</label>

<textarea
name="hero_description"
rows="4"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"></textarea>



<!-- FULL DESCRIPTION -->

<label class="block text-slate-300 mb-2 font-semibold">
Full Description
</label>

<textarea
name="full_description"
rows="5"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"></textarea>



<!-- OVERVIEW -->

<label class="block text-slate-300 mb-2 font-semibold">
Overview
</label>

<textarea
name="overview"
rows="4"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400"></textarea>



<!-- ARCHITECTURE IMAGE -->

<label class="block text-slate-300 mb-2 font-semibold">
Architecture Image URL
</label>

<input
name="architecture_image"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">



<!-- TECHNOLOGIES -->

<label class="block text-slate-300 mb-2 font-semibold">
Services
</label>

<div class="flex gap-3 mb-3">

<input
id="technologyInput"
placeholder="Add technology"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<button
type="button"
onclick="addTechnology()"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

Add

</button>

</div>

<div id="technologyList" class="mb-6 space-y-2"></div>



<!-- BENEFITS -->

<label class="block text-slate-300 mb-2 font-semibold">
Benefits
</label>

<div class="flex gap-3 mb-3">

<input
id="benefitInput"
placeholder="Add benefit"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<button
type="button"
onclick="addBenefit()"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

Add

</button>

</div>

<div id="benefitList" class="mb-6 space-y-2"></div>



<!-- USE CASES -->

<label class="block text-slate-300 mb-2 font-semibold">
Use Cases
</label>

<div class="flex gap-3 mb-3">

<input
id="usecaseInput"
placeholder="Add use case"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">
<button
type="button"
onclick="addUseCase()"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

Add

</button>

</div>

<div id="usecaseList" class="mb-6 space-y-2"></div>



<!-- FAQ -->

<label class="block text-slate-300 mb-2 font-semibold">
FAQs
</label>

<div class="flex gap-3 mb-3">

<input
id="faqQuestion"
placeholder="Question"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<input
id="faqAnswer"
placeholder="Answer"
class="w-full p-3 rounded bg-slate-900 border border-slate-700 text-white focus:border-cyan-400">

<button
type="button"
onclick="addFAQ()"
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

Add FAQ

</button>

</div>

<div id="faqList" class="mb-6 space-y-2"></div>



<!-- SUBMIT -->

<button
class="w-full bg-gradient-to-r from-blue-600 to-cyan-500 hover:opacity-90 text-white py-3 rounded-lg font-semibold transition">

Add Detailed Service

</button>


</form>

</div>



<!-- JAVASCRIPT -->

<script>
document.querySelector("form").addEventListener("keypress", function(e){

if(e.key === "Enter"){
e.preventDefault();
}

});

function addTechnology(){

let input=document.getElementById("technologyInput")

let value=input.value.trim()

if(!value) return

let list=document.getElementById("technologyList")

let item=document.createElement("div")

item.className="flex justify-between bg-slate-800 border border-slate-700 p-2 rounded text-slate-200"

item.innerHTML=`
<span>${value}</span>

<button type="button"
class="text-red-400 hover:text-red-600"
onclick="this.parentElement.remove()">
Remove
</button>

<input type="hidden" name="technologies[]" value="${value}">
`

list.appendChild(item)

input.value=""

}



function addBenefit(){

let input=document.getElementById("benefitInput")

let value=input.value.trim()

if(!value) return

let list=document.getElementById("benefitList")

let item=document.createElement("div")

item.className="flex justify-between bg-slate-800 border border-slate-700 p-2 rounded text-slate-200"

item.innerHTML=`
<span>${value}</span>

<button type="button"
class="text-red-400 hover:text-red-600"
onclick="this.parentElement.remove()">
Remove
</button>

<input type="hidden" name="benefits[]" value="${value}">
`

list.appendChild(item)

input.value=""

}



function addUseCase(){

let input=document.getElementById("usecaseInput")

let value=input.value.trim()

if(!value) return

let list=document.getElementById("usecaseList")

let item=document.createElement("div")

item.className="flex justify-between bg-slate-800 border border-slate-700 p-2 rounded text-slate-200"

item.innerHTML=`
<span>${value}</span>

<button type="button"
class="text-red-400 hover:text-red-600"
onclick="this.parentElement.remove()">
Remove
</button>

<input type="hidden" name="use_cases[]" value="${value}">
`

list.appendChild(item)

input.value=""

}



function addFAQ(){

let q=document.getElementById("faqQuestion").value
let a=document.getElementById("faqAnswer").value

if(!q || !a) return

let list=document.getElementById("faqList")

let item=document.createElement("div")

item.className="flex justify-between bg-slate-800 border border-slate-700 p-3 rounded text-slate-200"

item.innerHTML=`
<div>
<strong>${q}</strong><br>
${a}
</div>

<button type="button"
class="text-red-400 hover:text-red-600"
onclick="this.parentElement.remove()">
Remove
</button>

<input type="hidden" name="faqs[][question]" value="${q}">
<input type="hidden" name="faqs[][answer]" value="${a}">
`

list.appendChild(item)

document.getElementById("faqQuestion").value=""
document.getElementById("faqAnswer").value=""

}

function generateSlug(){

let title=document.getElementById("titleInput").value;

let slug=title
.toLowerCase()
.replace(/[^\w ]+/g,'')
.replace(/ +/g,'-');

document.getElementById("slugInput").value=slug;

}

</script>

@endsection
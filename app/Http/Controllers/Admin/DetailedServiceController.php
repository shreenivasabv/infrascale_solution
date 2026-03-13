<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailedService;

class DetailedServiceController extends Controller
{

public function index()
{

$services = DetailedService::latest()->get();

return view(
'admin.detailed-services',
compact('services')
);

}

public function store(Request $request)
{

DetailedService::create([

'title' => $request->title,

'slug' => $request->slug,

'hero_description' => $request->hero_description,

'full_description' => $request->full_description,

'overview' => $request->overview,

'architecture_image' => $request->architecture_image,

'technologies' => $request->technologies,

'benefits' => $request->benefits,

'use_cases' => $request->use_cases,

'faqs' => $request->faqs

]);

return back()->with(
'success',
'Detailed Service Added Successfully'
);

}

}
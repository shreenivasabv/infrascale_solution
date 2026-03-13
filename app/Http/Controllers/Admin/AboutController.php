<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();

        $about->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'mission' => $request->mission,
            'vision' => $request->vision,
        ]);

        return redirect()->back()->with('success', 'About page updated successfully.');
    }
}
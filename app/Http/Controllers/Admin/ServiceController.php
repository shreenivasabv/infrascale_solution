<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();

            $image->move(public_path('uploads/services'), $filename);

            $imagePath = 'uploads/services/'.$filename;
        }

        Service::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->back()->with('success','Service Added Successfully');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();

        return redirect()->back()->with('success','Service Deleted');
    }
}
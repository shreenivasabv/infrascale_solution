<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::latest()->get();
        return view('admin.team', compact('members'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $destinationPath = public_path('uploads/team');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $file->move($destinationPath, $fileName);

        $imagePath = 'uploads/team/' . $fileName;
    }

    \App\Models\Team::create([
        'name' => $request->name,
        'email' => $request->email,
        'designation' => $request->designation,
        'specialization' => $request->specialization,
        'experience' => $request->experience,
        'features' => $request->features,
        'image' => $imagePath,
    ]);

    return redirect()->back();
}

    public function destroy($id)
    {
        Team::findOrFail($id)->delete();
        return redirect()->back();
    }
}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactQuery;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'environment' => 'required|string',
            'message' => 'required|string'
        ]);

        $contact = ContactQuery::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Contact submitted successfully',
            'data' => $contact
        ]);
    }
}
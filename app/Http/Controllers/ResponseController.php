<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ResponseController extends Controller
{
    public function create()
    {
        return view('response.create'); // Assuming you have a view for creating responses
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
            'points' => 'required',
        
        ]);

        Response::create($data);

        return redirect()->route('questions.index')
            ->with('success', 'Response created successfully.');
    }

    // Add more actions for index, edit, update, and delete as needed
}
?>
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormData;


class FormDataController extends Controller
{
    public function index()
{
    $formData = FormData::all(); // Retrieve all data from the database

    return view('Condidat.index', compact('formData'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'about_you' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
      
        $resumePath = $request->file('resume')->store('resumes');

        FormData::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'about_you' => $validatedData['about_you'],
            'resume_path' => $resumePath,
        ]);

        return redirect()->back()->with('success', 'Form data has been submitted successfully!');
    }

    public function show($id)
{
    $candidate = FormData::findOrFail($id);

    return view('Condidat.show', compact('candidate'));
}

public function edit($id)
{
    return view('Condidat.edit');
}

public function destroy($id)
{
    $candidate = FormData::findOrFail($id);
    $candidate->delete();

    return redirect()->route('data.index')->with('success', 'Candidate deleted successfully!');
}

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostic;

class DiagnosticsController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate and store the diagnostic data
        Diagnostic::create([
            'user_id' => auth()->id(),
            'question_id' => $request->question_id,
            'response_id' => $request->response_id,
        ]);

        return redirect()->back()->with('success', 'Diagnostic saved successfully');
    }
    public function index()
    {
        $diagnostics = Diagnostic::with(['user', 'question', 'response'])->get();

        return view('questions.diagnostics', compact('diagnostics'));
    }
    public function userIndex()
    {
        $userDiagnostics = Diagnostic::where('user_id', auth()->id())
            ->with(['user', 'question', 'response'])
            ->get();

        return view('entreprise.userdiagnostics', compact('userDiagnostics'));
    }
}

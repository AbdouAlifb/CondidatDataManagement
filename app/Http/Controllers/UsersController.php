<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Response;
class UsersController extends Controller
{
    //
    public function dashboard()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('questions.index');
        } else {
            $questions = Question::all(); // Retrieve all questions from the questions table
            $responses = Response::all(); // Retrieve all responses from the responses table
    
            return view('entreprise.dashboard', compact('questions', 'responses'));
        }
    }
}

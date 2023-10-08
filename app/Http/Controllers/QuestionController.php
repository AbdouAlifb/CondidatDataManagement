<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    
    public function create()
    {
        return view('questions.create'); // Show the create form
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
            'category' => 'required',
        ]);

        Question::create($data);

        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions')); // Show a list of questions
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question')); // Show the edit form
    }

    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'description' => 'required',
            'category' => 'required',
        ]);

        $question->update($data);

        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully.');
    }
}

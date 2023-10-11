<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostic;
use App\Models\Response;
use App\Models\Question;

class DiagnosticsController extends Controller
{
    //
    public function store(Request $request)
    {

        $response = Response::find($request->response_id) ;

        $points = $response->points;


        // Validate and store the diagnostic data
        Diagnostic::create([
            'user_id' => auth()->id(),
            'question_id' => $request->question_id,
            'response_id' => $request->response_id,
            'score'=>$points,
        ]);

        return redirect()->back()->with('success', 'Diagnostic saved successfully');
    }
    public function batchStore(Request $request)
    {
        $userResponses = $request->input('responses');
    
        foreach ($userResponses as $questionId => $responseId) {
            // Check if the question has already been answered
            if ($this->hasAnsweredQuestion(auth()->id(), $questionId)) {
                $question = Question::find($questionId); // You need to load the Question model
                return redirect()->back()->with('error', 'Question "'.$question->description.'" has already been answered.');
            }
    
            $response = Response::find($responseId);
    
            if ($response) {
                $points = $response->points;
    
                // Create diagnostic entries for each response
                Diagnostic::create([
                    'user_id' => auth()->id(),
                    'question_id' => $questionId,
                    'response_id' => $responseId,
                    'score' => $points,
                ]);
            }
        }
    
        return redirect()->route('diagnostics.userIndex');
    }
    


    public function hasAnsweredQuestion($userId, $questionId) {
        return Diagnostic::where('user_id', $userId)
            ->where('question_id', $questionId)
            ->exists();
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

    // Initialize an array to store category scores
    $categoryScores = [];

    foreach ($userDiagnostics as $diagnostic) {
        $category = $diagnostic->question->category; // Assuming 'category' is an attribute in your 'questions' table
        $responsePoints = $diagnostic->response->points;

        // Initialize the category score if it doesn't exist
        if (!isset($categoryScores[$category])) {
            $categoryScores[$category] = [
                'category' => $category,
                'userScore' => 0,
                'totalScore' => 0,
            ];
        }

        // Update the category scores
        $categoryScores[$category]['userScore'] += $responsePoints;
        $categoryScores[$category]['totalScore'] += 5; // Replace with the attribute holding the max points for the question
    }

    // Calculate the percentage scores
    foreach ($categoryScores as &$categoryScore) {
        $categoryScore['percentage'] = ($categoryScore['userScore'] / $categoryScore['totalScore']) * 100;
    }

    return view('entreprise.userdiagnostics', compact('categoryScores'));
}

    
}

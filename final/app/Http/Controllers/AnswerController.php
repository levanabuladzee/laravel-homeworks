<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(AddAnswerRequest $request, Question $question)
    {
        $validated = $request->validated();
        $answer = new Answer();
        $answer->body = $validated['answer'];
        $answer->user_id = Auth::id();
        $question->answers()->save($answer);
        return redirect()->action([QuestionController::class, 'show'], $question);
    }

    public function destroy(Answer $answer)
    {
        $question = $answer->question;
        $answer->delete();
        return redirect()->action([QuestionController::class, 'show'], $question);
    }
}

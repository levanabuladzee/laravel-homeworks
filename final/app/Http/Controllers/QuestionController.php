<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuestionRequest;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\QuestionAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with("user", 'tags')->get()->sortByDesc('created_at');
        return view("home")->with("questions", $questions);
    }

    public function store(AddQuestionRequest $request)
    {
        $validated = $request->validated();

        $question = new Question();
        $question->title = $validated['title'];
        $question->body = $validated['body'];
        $question->vote = 0;
        $question->user_id = Auth::id();
        $question->save();

        $data = [
            'questionId' => $question->id,
            'questionTitle' => $question->title
        ];

        $user = User::find(Auth::id());
        $user->notify(new QuestionAdded($data));

        for ($i = 1; $i <= 3; $i++) {
            if (!Tag::where('name', '=', $validated['tag-' . $i])->exists()) {
                $tag = new Tag();
                $tag->name = $validated['tag-' . $i];
                $tag->save();
                $question->tags()->attach($tag);
            } else {
                $tag = Tag::where('name', '=', $validated['tag-' . $i])->first();
                $question->tags()->attach($tag);
            }
        }
        return redirect()->action([QuestionController::class, 'index']);
    }

    public function upvote(Question $question) {
        $question->vote = $question->vote + 1;
        $question->save();
        return redirect()->action([QuestionController::class, 'index']);
    }

    public function downvote(Question $question) {
        $question->vote = $question->vote - 1;
        $question->save();
        return redirect()->action([QuestionController::class, 'index']);
    }

    public function tags(Tag $tag) {
        $questions = $tag->questions()->with("user", 'tags')->get()->sortByDesc('created_at');
        return view("home")->with("questions", $questions);
    }

    public function search(Request $request) {
        $questions = Question::with("user", 'tags')->where('title', 'like', '%' . $request->q)
            ->orWhere('title', 'like', $request->q . '%')
            ->orWhere('title', 'like', '%' . $request->q . '%')
            ->get()->sortByDesc('created_at');
        return view("home")->with("questions", $questions);
    }

    public function myQuestions() {
        $questions = Question::with("user", 'tags')->where('user_id', '=', Auth::id())->get()->sortByDesc('created_at');
        return view("my_questions")->with("questions", $questions);
    }

    public function userQuestions(User $user) {
        $questions = Question::with("user", 'tags')->where('user_id', '=', $user->id)->get()->sortByDesc('created_at');
        return view("home")->with("questions", $questions);
    }

    public function show(Question $question)
    {
        return view("show_question")->with("question", $question);
    }

    public function edit(Question $question) {
        return view("edit_question")->with("question", $question);
    }

    public function update(AddQuestionRequest $request, Question $question)
    {
        $validated = $request->validated();

        $question->title = $validated['title'];
        $question->body = $validated['body'];
        $question->save();
        $question->tags()->detach();

        for ($i = 1; $i <= 3; $i++) {
            if (!Tag::where('name', '=', $validated['tag-' . $i])->exists()) {
                $tag = new Tag();
                $tag->name = $validated['tag-' . $i];
                $tag->save();
                $question->tags()->attach($tag);
            } else {
                $tag = Tag::where('name', '=', $validated['tag-' . $i])->first();
                $question->tags()->attach($tag);
            }
        }
        return redirect()->action([QuestionController::class, 'myQuestions']);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->action([QuestionController::class, 'myQuestions']);
    }
}

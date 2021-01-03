<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:articles|min:5|max:100',
            'body' => 'required|string|min:5|max:2000'
        ]);

        $validated['user_id'] = $request->user()->id;

        return Article::create($validated);
    }

    public function show(Article $article): Article
    {
        return $article;
    }

    public function update(Request $request, Article $article): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:articles|min:5|max:100',
            'body' => 'required|string|min:5|max:2000'
        ]);

        $validated['user_id'] = $request->user()->id;

        $article->update($validated);

        return response()->json($article, 200);
    }

    public function destroy(Article $article): \Illuminate\Http\JsonResponse
    {
        $article->delete();

        return response()->json(null, 204);
    }
}

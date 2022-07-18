<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Ru2lat;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Dostizheniya;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->reverse();
        return view('admin.article.index', compact('articles'));
    }
    public function create()
    {
        return view('admin.article.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'title' => ['required'],
                'short_description' => ['required'],
                'image' => ['required', 'image'],
                'content' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        $validated['image'] = $data['image']->store('image', 'local');
        $validated['chpu'] = Ru2lat::convert($validated['title']);
        $validated['created_at'] = Carbon::now();
        Article::create($validated);
        return redirect()->route('admin.article.index');
    }
    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
        // dd($news);
    }
    public function update(Article $article, Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'title' => ['required'],
                'short_description' => ['required'],
                'image' => [],
                'content' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        $validated['chpu'] = Ru2lat::convert($validated['title']);
        if (isset($validated['image'])) {
            $validated['image'] = $data['image']->store('image', 'local');
        }
        Article::where('id', $article->id)->update($validated);
        return redirect()->route('admin.article.index');
    }
    public function delete(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}

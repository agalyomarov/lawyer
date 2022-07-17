<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Ru2lat;
use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all()->reverse();
        return view('admin.news.index', compact('news'));
    }
    public function create()
    {
        return view('admin.news.create');
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
                'media' => [],
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
        $uuid_image = Str::uuid();
        $validated['image'] = $data['image']->store('image', 'local');
        $validated['created_at'] = Carbon::now();
        News::create($validated);
        return redirect()->route('admin.news.index');
    }
}

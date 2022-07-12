<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
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
                'content' => ['required'],
                'media' => [],
                'publish' => []
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        dd($validated);
    }
}

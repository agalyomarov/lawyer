<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Ru2lat;
use App\Models\Dostizheniya;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DostController extends Controller
{
    public function index()
    {
        $dosts = Dostizheniya::all()->reverse();
        return view('admin.dost.index', compact('dosts'));
    }
    public function create()
    {
        return view('admin.dost.create');
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
        Dostizheniya::create($validated);
        return redirect()->route('admin.dost.index');
    }
    public function edit(Dostizheniya $dost)
    {
        return view('admin.dost.edit', compact('dost'));
        // dd($news);
    }
    public function update(Dostizheniya $dost, Request $request)
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
        Dostizheniya::where('id', $dost->id)->update($validated);
        return redirect()->route('admin.dost.index');
    }
    public function delete(Dostizheniya $dost)
    {
        $dost->delete();
        return redirect()->route('admin.dost.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Ru2lat;
use App\Models\Dostizheniya;
use App\Models\News;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all()->reverse();
        return view('admin.review.index', compact('reviews'));
    }
    public function create()
    {
        return view('admin.review.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'name' => ['required'],
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
        Review::create($validated);
        return redirect()->route('admin.review.index');
    }
    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
        // dd($news);
    }
    public function update(Review $review, Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'name' => ['required'],
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
        Review::where('id', $review->id)->update($validated);
        return redirect()->route('admin.review.index');
    }
    public function delete(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}

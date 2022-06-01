<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::where('enable', true)->orderBy('id', 'desc')->paginate(30);
        return view('admin.link.index', compact('links'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->get('link')) {
                Link::create(['link' => $request->get('link')]);
                return redirect()->route('admin.link.index');
            }
            return redirect()->route('admin.link.index');
        } catch (\Exception $e) {
            return redirect()->route('admin.link.index');
        }
    }

    public function delete(Link $link)
    {
        if ($link->enable == true) {
            $link->delete();
        }
        return redirect()->route('admin.link.index');
    }
    public function getCount()
    {
        $count = Link::where('enable', true)->count();
        return response()->json(['count' => $count]);
    }
}

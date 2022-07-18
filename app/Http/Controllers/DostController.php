<?php

namespace App\Http\Controllers;

use App\Models\Dostizheniya;
use Illuminate\Http\Request;

class DostController extends Controller
{
    public function index()
    {
        $dosts = Dostizheniya::paginate(9);
        return view('dost', compact('dosts'));
    }
    public function view($chpu)
    {
        $dost = Dostizheniya::where('chpu', $chpu)->first();
        $otherDosts = Dostizheniya::where('id', '!=', $dost->id)->inRandomOrder()->limit(3)->get();
        return view('dost_view', compact('dost', 'otherDosts'));
    }
}

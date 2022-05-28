<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('client_phone')) {
            $client = Client::where('phone', session('client_phone'))->first();
            $client_entries = DB::table('client_entry')->where('client_id', $client->id)->get();
            // dd($client_entries);
            return view('profile.index', compact('client'));
        }
        return redirect()->route('home');
    }
}

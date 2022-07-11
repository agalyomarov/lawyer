<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($service, Request $request)
    {
        $service = Service::where('chpu', $service)->first();
        return view('service', compact('service'));
    }
}

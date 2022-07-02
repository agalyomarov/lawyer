<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariableController extends Controller
{
    public function index()
    {
        $variable = DB::table('variable_email_send')->first();
        return view('admin.variable', compact('variable'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $variable = DB::table('variable_email_send')->where('id', 1)->first();
        if ($variable) {
            $variable = DB::table('variable_email_send')->update(['variable' => $data['variable']]);
        } else {
            $variable = DB::table('variable_email_send')->insert(['variable' => $data['variable']]);
        }
        return redirect()->route('admin.variable.index');
    }
}

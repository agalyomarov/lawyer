<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialityController extends Controller
{
    public function index()
    {
        return view('admin.speciality.index', ['specialities' => Speciality::all()]);
    }
    public function store(Request $request)
    {
        try {
            if ($request->title && $request->translate) {
                Speciality::create(['title' => $request->title, 'publishing' => $request->publishing, 'translate' => $request->translate]);
                return redirect()->route('admin.speciality.index');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function edit(Speciality $speciality, Request $request)
    {
        return view('admin.speciality.edit', compact('speciality'));
    }
    public function update(Speciality $speciality, Request $request)
    {
        try {
            if ($request->title && $request->translate) {
                $speciality->update(['title' => $request->title, 'publishing' => $request->publishing, 'translate' => $request->translate]);
                return redirect()->route('admin.speciality.index');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function delete(Speciality $speciality)
    {
        try {
            $speciality->delete();
            return redirect()->route('admin.speciality.index');
        } catch (\Exception $e) {
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Ru2lat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersonalStoreRequest;
use App\Http\Requests\Admin\PersonalUpdateRequest;
use App\Models\Personal;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PersonalController extends Controller
{
    public function index()
    {
        $personals = Personal::all();
        foreach ($personals as $personal) {
            foreach ($personal->speciality as $speciality) {
                $personal->specialities .= $speciality->title . ' , ';
            }
        }
        return view('admin.personal.index', compact('personals'));
    }
    public function create()
    {
        return view('admin.personal.create', ['specialities' => Speciality::all()]);
    }
    public function store(PersonalStoreRequest $request)
    {
        $data = $request->validated();
        try {
            $data['image'] = $data['image']->store('image', 'local');
            $data['chpu'] = Ru2lat::convert($data['fullname']);
            $specialities = $data['speciality'];
            unset($data['speciality']);
            DB::beginTransaction();
            $personal = Personal::create($data);
            foreach ($specialities as $key => $speciality_id) {
                DB::table('personal_speciality')->insert(['personal_id' => $personal->id, 'speciality_id' => $speciality_id]);
            }
            DB::commit();
            return redirect()->route('admin.personal.index');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function edit(Personal $personal)
    {
        foreach ($personal->speciality as $speciality) {
            $personal->specialities .= $speciality->title . ' , ';
        }
        return view('admin.personal.edit', ['personal' => $personal, 'specialities' => Speciality::all(), 'personal_speciality' => DB::table('personal_speciality')->get()->toArray()]);
    }
    public function update(Personal $personal, PersonalUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $old_image = $personal->image;
            if (!isset($data['publishing'])) {
                $data['publishing'] = false;
            }

            DB::table('personal_speciality')->where('personal_id', $personal->id)->delete();
            foreach ($data['speciality'] as $speciality) {
                DB::table('personal_speciality')->insert(['personal_id' => $personal->id, 'speciality_id' => $speciality]);
            }
            unset($data['speciality']);
            if (isset($data['image'])) {
                $data['image'] = $data['image']->store('image', 'local');
                Storage::delete($old_image);
            }
            $personal->update($data);
            DB::commit();
            return redirect()->route('admin.personal.index');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
    public function delete(Personal $personal)
    {
        try {
            DB::beginTransaction();
            DB::table('personal_speciality')->where('personal_id', $personal->id)->delete();
            Storage::delete($personal->image);
            $personal->delete();
            DB::commit();
            return redirect()->route('admin.personal.index');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->view('errors.500', [
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}

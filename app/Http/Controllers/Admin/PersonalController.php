<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Ru2lat;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersonalStoreRequest;
use App\Http\Requests\Admin\PersonalUpdateRequest;
use App\Models\Personal;
use App\Models\Service;
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
            foreach ($personal->specialities as $speciality) {
                $personal->personal_specialities .= $speciality->title . ' , ';
            }
        }
        return view('admin.personal.index', compact('personals'));
    }
    public function create()
    {
        return view('admin.personal.create', ['specialities' => Speciality::all(), 'services' => Service::all()]);
    }
    public function store(PersonalStoreRequest $request)
    {
        $data = $request->validated();
        try {
            $data['image'] = $data['image']->store('image', 'local');
            $data['chpu'] = Ru2lat::convert($data['fullname']);
            $specialities = $data['specialities'];
            unset($data['specialities']);
            $services = $data['services'];
            unset($data['services']);
            DB::beginTransaction();
            $personal = Personal::create($data);
            foreach ($specialities as $key => $speciality_id) {
                DB::table('personal_specialities')->insert(['personal_id' => $personal->id, 'speciality_id' => $speciality_id]);
            }
            foreach ($services as $key => $service_id) {
                DB::table('personal_services')->insert(['personal_id' => $personal->id, 'service_id' => $service_id]);
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
        foreach ($personal->specialities as $speciality) {
            $personal->personal_specialities .= $speciality->title . ' , ';
        }
        return view('admin.personal.edit', [
            'personal' => $personal,
            'specialities' => Speciality::all(),
            'services' => Service::all(),
        ]);
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
            DB::table('personal_specialities')->where('personal_id', $personal->id)->delete();
            foreach ($data['specialities'] as $speciality) {
                DB::table('personal_specialities')->insert(['personal_id' => $personal->id, 'speciality_id' => $speciality]);
            }
            DB::table('personal_services')->where('personal_id', $personal->id)->delete();
            foreach ($data['services'] as $service) {
                DB::table('personal_services')->insert(['personal_id' => $personal->id, 'service_id' => $service]);
            }

            unset($data['specialities']);
            unset($data['services']);
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
            DB::table('personal_specialities')->where('personal_id', $personal->id)->delete();
            DB::table('personal_entries')->where('personal_id', $personal->id)->delete();
            DB::table('personal_services')->where('personal_id', $personal->id)->delete();
            if (Storage::exists($personal->image)) {
                Storage::delete($personal->image);
            }
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

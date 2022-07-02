<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Service;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalsController extends Controller
{
    public function index(Request $request)
    {
        $qa = $request->query->get('qa');
        $personals = Personal::all();
        foreach ($personals as $key => $personal) {
            $personal_speciality = DB::table('personal_specialities')->where('personal_id', $personal->id)->first();
            $personals[$key]->speciality = Speciality::find($personal_speciality->speciality_id);
        }
        // dd($personals);
        if ($qa) {
            $new_personals = [];
            foreach ($personals as $key => $personal) {
                if ($personal->speciality->translate == $qa) {
                    array_push($new_personals, $personal);
                }
            }
            $personals = $new_personals;
        }
        return view('personals.index', compact('personals'));
    }

    public function viewPersonal($person)
    {
        $personal = Personal::where('chpu', $person)->first();
        $personal_speciality = DB::table('personal_specialities')->where('personal_id', $personal->id)->first();
        $speciality = Speciality::find($personal_speciality->speciality_id);
        // dd($speciality);
        return view('personals.view_personal', compact('personal', 'speciality'));
    }
}

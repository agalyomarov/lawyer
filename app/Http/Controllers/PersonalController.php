<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Personal;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function login(Request $request)
    {
        // $personal_entries=Personal::where('personal_id',)
        return view('personal.login');
    }

    public function index(Request $request)
    {
        $personal_entries = DB::table('personal_entries')->where('personal_id', session('personal_id'))->select('id')->get()->toArray();
        $ids_personal_entries = [];
        foreach ($personal_entries as $entry) {
            array_push($ids_personal_entries, $entry->id);
        }
        $client_entries = DB::table('client_entry')->whereIn('entry_id', $ids_personal_entries)->paginate(10);
        $entries = [];
        foreach ($client_entries as $index => $entry) {
            $entries[$index] = [];
            $entries[$index]['service'] = Service::find($entry->service_id);
            $entries[$index]['client'] = Client::find($entry->client_id);
            $entries[$index]['entry'] = DB::table('personal_entries')->where('id', $entry->entry_id)->first();
            $entries[$index]['entry']->entry_start_time = date('d.m.Y H:i', $entries[$index]['entry']->entry_start_time);
            $entries[$index]['status'] = $entry->status;
            $entries[$index]['payment_id'] = $entry->payment_id;
            $entries[$index]['entry_id'] = $entry->entry_id;
            $entries[$index]['service_id'] = $entry->service_id;
            $entries[$index]['client_id'] = $entry->client_id;
            $entries[$index]['link'] = $entry->link;
        }
        // dd($entries);

        // dd($client_entries);
        return view('personal.index', compact('entries'));
    }
    public function login_store(Request $request)
    {
        $data = $request->all();
        $personal = Personal::where('login', $data['login'])->first();
        if (!$personal) {
            return redirect()->back()->with('message', 'Не корректный логин');
        }
        if ($personal && $personal->password != $data['password']) {
            return redirect()->back()->with('message', 'Не корректный парол');
        }
        session(['personal_id' => $personal->id]);
        return redirect()->route('personal.index');
        // dd($check_login);
    }
    public function logout()
    {
        session(['personal_id' => '']);
        return redirect()->route('home');
    }
}

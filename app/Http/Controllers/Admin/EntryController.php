<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntryController extends Controller
{
    public function index()
    {
        return view('admin.entry.index', ['personals' => Personal::all()]);
    }
    public function create(Personal $personal)
    {
        $today = strtotime('today 00:00');
        $personal_entries = DB::table('personal_entries')->where('personal_id', $personal->id)->where('day', '>=', $today)->get()->groupBy('block')->toArray();
        return view('admin.entry.create', compact('personal', 'personal_entries'));
    }
    public function store(Personal $personal, Request $request)
    {
        try {
            $data = $request->json()->all();
            DB::beginTransaction();
            foreach ($data as $index => $block) {
                foreach ($block['days'] as $day) {
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block' => $block['block'], 'day' => strtotime($day), 'start' => $block['start'], 'end' => $block['end']]);
                }
            }
            DB::commit();
            return response()->json([], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([$e->getMessage()], 500);
        }
    }
}

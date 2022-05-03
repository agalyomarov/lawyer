<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entry;
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
        $personal_entries = DB::table('personal_entries')->where('personal_id', $personal->id)->where('day', '>=', $today)->get()->sortBy('block')->groupBy('block')->toArray();
        // dd($personal_entries);
        $entry_days = DB::table('personal_entries')->where('personal_id', $personal->id)->where('day', '>=', $today)->select('day')->get()->groupBy('day')->toArray();
        $days = null;
        foreach ($entry_days as $key => $day) {
            $days .= date('d.m.Y', intval($key)) . ',';
        }
        return view('admin.entry.create', compact('personal', 'personal_entries', 'days'));
    }
    public function store(Personal $personal, Request $request)
    {
        try {
            $data = $request->json()->all();
            DB::beginTransaction();
            $blocks = DB::table('personal_entries')->where('personal_id', $personal->id)->select('block')->orderBy('block', 'ASC')->get()->toArray();
            if ($blocks) {
                $countBlock = $blocks[count($blocks) - 1]->block + 1;
            } else {
                $countBlock = 0;
            }
            foreach ($data as $index => $block) {
                foreach ($block['days'] as $day) {
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block' => $countBlock, 'day' => strtotime($day), 'start' => $block['start'], 'end' => $block['end']]);
                }
            }
            DB::commit();
            return response()->json([], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([$e->getMessage()], 500);
        }
    }
    public function delete($block)
    {
        DB::table('personal_entries')->where('block', $block)->delete();
        return redirect()->back();
    }
}

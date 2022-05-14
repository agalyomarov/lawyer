<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Personal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EntryController extends Controller
{
    public function index()
    {
        return view('admin.entry.index', ['personals' => Personal::all()]);
    }
    public function create(Personal $personal)
    {
        return view('admin.entry.create', compact('personal'));
    }
    public function store(Personal $personal, Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->json()->all();
            $countBlock = 0;
            $blocks = DB::table('personal_entries')->where('personal_id', $personal->id)->select('block_count')->orderBy('block_count', 'DESC')->get()->toArray();
            if ($blocks) {
                $countBlock = intval($blocks[0]->block_count) + 1;
            }
            for ($i = $data['start_time']; $i <= $data['end_time'] - 3600; $i += 3600) {
                foreach ($data['dates'] as $date) {
                    if (DB::table('personal_entries')->where([
                        'personal_id' => $personal->id,
                        'day' => strtotime($date),
                        'entry_start_time' => intval(strtotime($date)) + intval($i),
                        'entry_end_time' => intval(strtotime($date)) + intval($i) + 3600,
                    ])->first()) {
                        return response()->json(['status' => 'dublicate', 'message' => [$date, gmdate('H:i', $i), gmdate('H:i', $i + 3600)]]);
                    } else {
                        DB::table('personal_entries')->insert([
                            'block_count' => $countBlock,
                            'personal_id' => $personal->id,
                            'block_start_time' => $data['start_time'],
                            'block_end_time' => $data['end_time'],
                            'day' => strtotime($date),
                            'entry_start_time' => intval(strtotime($date)) + $i,
                            'entry_end_time' => intval(strtotime($date)) + intval($i) + 3600,
                            'enable' => true,
                        ]);
                    }
                }
            }
            DB::commit();
            return response()->json(['status' => true, 'block_count' => $countBlock, 'personal_id' => $personal->id]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'false', 'message' => 'Произлошло серверная ощибка,пожалюста перезагрузите стариницу'], 500);
        }
    }
    public function update(Personal $personal, Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->json()->all();
            foreach ($data['dates'] as $key => $value) {
                $data['dates'][$key] = strtotime($value);
            }
            if (count($data['dates']) > 0) {
                DB::table('personal_entries')->where([
                    'personal_id' => $data['personal_id'],
                    'block_count' => $data['block_count'],
                ])->whereNotIn('day', $data['dates'])->delete();
            } else {
                DB::table('personal_entries')->where([
                    'personal_id' => $data['personal_id'],
                    'block_count' => $data['block_count'],
                ])->delete();
            }
            DB::commit();
            return response()->json(['status' => 'true']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'false', 'message' => 'Произлошло серверная ощибка,пожалюста перезагрузите стариницу'], 500);
        }
    }
}

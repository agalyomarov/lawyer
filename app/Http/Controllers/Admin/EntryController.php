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
        $savedDates = DB::table('personal_entries')->where(['personal_id' => $personal->id])->select('day')->get()->groupBy('day')->toArray();
        $allEntriesOfPersonalGroupByBlock = DB::table('personal_entries')->where('personal_id', $personal->id)->orderBy('block_count', 'desc')->orderBy('day', 'asc')->get()->groupBy(['block_count', 'day'])->toArray();
        $allEntriesOfPersonal = [];
        foreach ($allEntriesOfPersonalGroupByBlock as $block_count => $dates) {
            $allEntriesOfPersonal[$block_count] = ['dates' => [], 'block_start_time' => $dates[array_key_first($dates)][0]->block_start_time, 'block_end_time' => $dates[array_key_first($dates)][0]->block_end_time];
            foreach ($dates as $index => $entries) {
                $array = ['date' => date('d.m.Y', $index), 'disabled' => false, 'enable' => true];
                if ($index < strtotime(Carbon::now()->format('Y-m-d'))) {
                    $array['disabled'] = true;
                }
                foreach ($entries as $entry) {
                    if (!$entry->enable) {
                        $array['enable'] = false;
                    }
                }
                array_push($allEntriesOfPersonal[$block_count]['dates'], $array);
            }
        }
        // dd($allEntriesOfPersonal);
        // dd($allEntriesOfPersonalGroupByBlock);
        $countThisMonthDays = Carbon::now()->daysInMonth;
        $countNextMonthDays = Carbon::now()->addMonth()->daysInMonth;

        $startThisMonth = new Carbon('first day of this month');
        $endThisMonth = new Carbon('last day of this month');

        $startNextMonth = new Carbon('first day of next month');
        $endNextMonth = new Carbon('last day of next month');

        $nameThisMonth = Carbon::parse($startThisMonth)->translatedFormat('F');
        $nameNextMonth = Carbon::parse($startNextMonth)->translatedFormat('F');

        $countWeekThisMonth = date("W", strtotime($endThisMonth)) - date("W", strtotime($startThisMonth)) + 1;
        $countWeekNextMonth = date("W", strtotime($endNextMonth)) - date("W", strtotime($startNextMonth)) + 1;


        $startWeekDayThisMonth =  date("N", strtotime($startThisMonth));
        $endWeekDayThisMonth = date("N", strtotime($endThisMonth));

        $startWeekDayNextMonth =  date("N", strtotime($startNextMonth));
        $endWeekDayNextMonth = date("N", strtotime($endNextMonth));

        $thisMonth = ['name' => Str::ucfirst($nameThisMonth)];
        $nextMonth = ['name' => Str::ucfirst($nameNextMonth)];

        $thisMonth['year'] = date("Y", strtotime($startNextMonth));
        $nextMonth['year'] = date("Y", strtotime($startNextMonth));

        $dayOfThisMonth = 1;
        $dayOfNextMonth = 1;

        $currentDayToday = intval(Carbon::now()->format('d'));
        for ($i = 0; $i < $countWeekThisMonth; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($i == 0 && $j < $startWeekDayThisMonth - 1 || $i == $countWeekThisMonth - 1 && $j > $endWeekDayThisMonth - 1) {
                    $thisMonth['weeks'][$i][$j]['view'] = false;
                    $thisMonth['weeks'][$i][$j]['day'] = false;
                } else {
                    $thisMonth['weeks'][$i][$j]['view'] = true;
                    $thisMonth['weeks'][$i][$j]['day'] = $dayOfThisMonth;
                    $thisMonth['weeks'][$i][$j]['date'] = Carbon::parse($startThisMonth)->add('day', $dayOfThisMonth - 1)->format('d.m.Y');
                    if ($dayOfThisMonth >= $currentDayToday) {
                        $thisMonth['weeks'][$i][$j]['enable'] = true;
                    } else {
                        $thisMonth['weeks'][$i][$j]['enable'] = false;
                    }
                    if (isset($savedDates[strtotime($thisMonth['weeks'][$i][$j]['date'])])) {
                        $thisMonth['weeks'][$i][$j]['saved'] = true;
                    } else {
                        $thisMonth['weeks'][$i][$j]['saved'] = false;
                    }
                    $dayOfThisMonth++;
                }
            }
        }

        for ($i = 0; $i < $countWeekNextMonth; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($i == 0 && $j < $startWeekDayNextMonth - 1 || $i == $countWeekNextMonth - 1 && $j > $endWeekDayNextMonth - 1) {
                    $nextMonth['weeks'][$i][$j]['view'] = false;
                    $nextMonth['weeks'][$i][$j]['day'] = false;
                } else {
                    $nextMonth['weeks'][$i][$j]['view'] = true;
                    $nextMonth['weeks'][$i][$j]['day'] = $dayOfNextMonth;
                    $nextMonth['weeks'][$i][$j]['date'] = Carbon::parse($startNextMonth)->add('day', $dayOfNextMonth - 1)->format('d.m.Y');
                    $nextMonth['weeks'][$i][$j]['enable'] = true;
                    if (isset($savedDates[strtotime($nextMonth['weeks'][$i][$j]['date'])])) {
                        $nextMonth['weeks'][$i][$j]['saved'] = true;
                    } else {
                        $nextMonth['weeks'][$i][$j]['saved'] = false;
                    }
                    $dayOfNextMonth++;
                }
            }
        }
        return view('admin.entry.create', compact('personal', 'thisMonth', 'nextMonth', 'allEntriesOfPersonal'));
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Personal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;

class EntryController extends Controller
{
    public function index()
    {
        return view('admin.entry.index', ['personals' => Personal::all()]);
    }
    public function create(Personal $personal)
    {
        $nameThisMonth = Str::ucfirst(Carbon::now()->translatedFormat('F'));
        $nameNextMonth = Str::ucfirst(Carbon::now()->addMonthsNoOverflow()->translatedFormat('F'));
        $startThisMonth = Carbon::now()->startOfMonth()->format('d.m.Y');
        $startNextMonth = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->format('d.m.Y');
        $yearThisMonth = Carbon::now()->format('Y');
        $yearNextMonth = Carbon::now()->addMonthsNoOverflow()->format('Y');
        $countDayThisMonth = Carbon::now()->daysInMonth;
        $countDayNextMonth = Carbon::now()->addMonthsNoOverflow()->daysInMonth;
        $currentWeekDayStartThisMonth = Carbon::now()->startOfMonth()->dayOfWeekIso;
        $currentWeekDayStartNextMonth = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->dayOfWeekIso;
        $currentWeekDayStartNext2NextMonth = Carbon::now()->addMonthsNoOverflow()->addMonthsNoOverflow()->startOfMonth()->dayOfWeekIso;
        $countWeekThisMonth = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->format("W") + 1 - Carbon::now()->startOfMonth()->format("W");
        $countWeekNextMonth = Carbon::now()->startOfMonth()->addMonthsNoOverflow()->addMonthsNoOverflow()->format("W") + 1 - Carbon::now()->startOfMonth()->addMonthsNoOverflow()->format("W");
        $currentDayThisMonth = 1;
        $currentDayNextMonth = 1;
        $thisMonth = new stdClass();
        $nextMonth = new stdClass();
        $thisMonth->monthName = $nameThisMonth;
        $nextMonth->monthName = $nameNextMonth;
        $thisMonth->year = $yearThisMonth;
        $nextMonth->year = $yearNextMonth;

        for ($i = 1; $i <= $countWeekThisMonth; $i++) {
            $thisMonth->week[$i] = [];
            for ($j = 1; $j <= 7; $j++) {
                $thisMonth->week[$i][$j] = [];
                if ($i == 1 && $j >= $currentWeekDayStartThisMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');
                    $currentDayThisMonth++;
                } elseif ($i == $countWeekThisMonth  && $j < $currentWeekDayStartNextMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');
                    $currentDayThisMonth++;
                } elseif ($i != 1 && $i != $countWeekThisMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');
                    $currentDayThisMonth++;
                }
                if (isset($thisMonth->week[$i][$j]['currentDate']) && $thisMonth->week[$i][$j]['currentDate'] < Carbon::now()->format('d.m.Y')) {
                    $thisMonth->week[$i][$j]['isLastDate'] = true;
                }
            }
        }
        for ($i = 1; $i <= $countWeekNextMonth; $i++) {
            $nextMonth->week[$i] = [];
            for ($j = 1; $j <= 7; $j++) {
                $nextMonth->week[$i][$j] = [];
                if ($i == 1 && $j >= $currentWeekDayStartNextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');
                    $currentDayNextMonth++;
                }
                if ($i == $countWeekNextMonth  && $j < $currentWeekDayStartNext2NextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');
                    $currentDayNextMonth++;
                }
                if ($i != 1 && $i != $countWeekNextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');
                    $currentDayNextMonth++;
                }
            }
        }

        $allBlocks = DB::table('personal_entries')->where('personal_id', $personal->id)->select('block_count', 'block_start_time', 'block_end_time', 'entry_date', 'entry_enable')->get()->groupBy('block_count')->toArray();

        $blocks = [];
        foreach ($allBlocks as $block) {
            $blocks[$block[0]->block_count] = ['blockStartTime' => $block[0]->block_start_time, 'blockEndTime' => $block[0]->block_end_time];
            foreach ($block as $index => $blockData) {
                $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date] = ['enable' => $blockData->entry_enable];
                if ($blockData->entry_date < strtotime(Carbon::now()->format('d.m.Y'))) {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['lastDate'] = true;
                } else {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['lastDate'] = false;
                }
            }
        }

        $blocks = array_reverse($blocks, true);
        // dd($blocks);
        // dd($thisMonth);
        // dd($nextMonth);
        return view('admin.entry.create', compact('personal', 'thisMonth', 'nextMonth', 'blocks'));
    }
    public function store(Personal $personal, Request $request)
    {
        try {
            $dates = $request->get('selectedDates');
            $blockStartTime = $request->get('blockStartTime');
            $blockEndTime = $request->get('blockEndTime');
            if (count($dates) == 0) {
                return response()->json(['status' => 'validate', 'message' => 'Выберите даты']);
            } else if ($blockStartTime + 3600 > $blockEndTime) {
                return response()->json(['status' => 'validate', 'message' => 'Промежуточный время не корректный']);
            }
            $blockCount = DB::table('personal_entries')->where('personal_id', $personal->id)->get()->groupBy('block_count')->count() + 1;
            DB::beginTransaction();
            foreach ($dates as $date) {
                $date = strtotime($date);
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime])->count();
                    if (boolval($checkEntryIsHas)) {
                        return response()->json(['status' => 'validate', 'message' => 'Дынный не записовался в БД.Ест дубликат записа для дата ' . date('d.m.Y', $date) . ' ' . gmdate('H:i', $startTime)]);
                    }
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1]);
                }
            }
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function delete(Personal $personal, Request $request)
    {
        try {
            $blockCount = $request->get('blockCount');
            $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where('block_count', $blockCount)->where('entry_enable', false)->count();
            if ($checkEntryIsHas > 0) {
                return response()->json(['status' => 'validate', 'message' => 'В блоке есть активный записи']);
            }
            DB::beginTransaction();
            DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->delete();
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function update(Personal $personal, Request $request)
    {
        try {
            $dates = $request->get('selectedDates');
            $blockStartTime = $request->get('blockStartTime');
            $blockEndTime = $request->get('blockEndTime');
            if ($blockStartTime + 3600 > $blockEndTime) {
                return response()->json(['status' => 'validate', 'message' => 'Промежуточный время не корректный']);
            }
            $blockCount = $request->get('blockCount');
            DB::beginTransaction();
            DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1]);
            // foreach ($dates as $date) {
            //     $date = strtotime($date);
            //     for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
            //         $startTime = $date + $i;
            //         $endTime = $startTime + 3600;
            //         $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime])->count();
            //         if (boolval($checkEntryIsHas)) {
            //             return response()->json(['status' => 'validate', 'message' => 'Дынный не записовался в БД.Ест дубликат записа для дата ' . date('d.m.Y', $date) . ' ' . gmdate('H:i', $startTime)]);
            //         }
            //         DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1]);
            //     }
            // }
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
}

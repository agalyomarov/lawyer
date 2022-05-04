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
                    $dayOfNextMonth++;
                }
            }
        }
        // dd($nextMonth);
        return view('admin.entry.create', compact('personal', 'thisMonth', 'nextMonth'));
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

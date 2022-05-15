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

        // dd($thisMonth);
        // dd($nextMonth);
        return view('admin.entry.create', compact('personal', 'thisMonth', 'nextMonth'));
    }
    public function store(Personal $personal, Request $request)
    {
    }
    public function update(Personal $personal, Request $request)
    {
    }
}

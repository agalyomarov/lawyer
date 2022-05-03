<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $today = strtotime('today 00:00');
        $entries = DB::table('personal_entries')->where('day', '>=', $today)->get()->groupBy('day')->toArray();
        $allEntries = DB::table('personal_entries')->where('day', '>=', $today)->get()->toArray();
        // dd($entries);
        // dd(gmdate('H:i', $days[0]->start), gmdate('H:i', intval($days[0]->start) + 3600), gmdate('H:i', $days[0]->end),);

        // $aviableHours = [];
        foreach ($allEntries as $day) {
            if (!isset($aviableHours[$day->day])) {
                $aviableHours[$day->day] = [];
            }
            for ($i = intval($day->start); $i < intval($day->end); $i += 3600) {
                if (!in_array(gmdate('H:i', $i), $aviableHours[$day->day])) {
                    $aviableHours[$day->day][gmdate('H:i', $i)] = ['services' => []];
                    // array_push($aviableHours[$day->day], ['time' => gmdate('H:i', $i)]);
                }
            }
        }

        // dd($aviableHours);
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

        $dayOfThisMonth = 1;
        $dayOfNextMonth = 1;

        // dd($nameNextMonth);
        // dd($endWeekDayThisMonth);
        for ($i = 0; $i < $countWeekThisMonth; $i++) {
            for ($j = 0; $j < 7; $j++) {
                if ($i == 0 && $j < $startWeekDayThisMonth - 1 || $i == $countWeekThisMonth - 1 && $j > $endWeekDayThisMonth - 1) {
                    $thisMonth['weeks'][$i][$j]['view'] = false;
                    $thisMonth['weeks'][$i][$j]['day'] = false;
                } else {
                    $thisMonth['weeks'][$i][$j]['view'] = true;
                    $thisMonth['weeks'][$i][$j]['day'] = $dayOfThisMonth;
                    $thisMonth['weeks'][$i][$j]['date'] = strtotime($dayOfThisMonth . '.' . $startThisMonth->format('m.Y'));
                    if (isset($entries[$thisMonth['weeks'][$i][$j]['date']])) {
                        $thisMonth['weeks'][$i][$j]['entry'] = true;
                    } else {
                        $thisMonth['weeks'][$i][$j]['entry'] = false;
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
                    $nextMonth['weeks'][$i][$j]['date'] = strtotime($dayOfNextMonth . '.' . $startNextMonth->format('m.Y'));
                    $dayOfNextMonth++;
                }
            }
        }

        // dd($thisMonth);
        return view('home', compact('thisMonth', 'nextMonth'));
    }
}

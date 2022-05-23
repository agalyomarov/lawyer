<?php

namespace App\Http\Controllers;

use App\Helpers\DatePicker;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class MainController extends Controller
{
    public function index()
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
                    if (strtotime($thisMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $thisMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayThisMonth++;
                } elseif ($i == $countWeekThisMonth  && $j < $currentWeekDayStartNextMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');

                    if (strtotime($thisMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $thisMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayThisMonth++;
                } elseif ($i != 1 && $i != $countWeekThisMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');

                    if (strtotime($thisMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $thisMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayThisMonth++;
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

                    if (strtotime($nextMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $nextMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayNextMonth++;
                }
                if ($i == $countWeekNextMonth  && $j < $currentWeekDayStartNext2NextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');

                    if (strtotime($nextMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $nextMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayNextMonth++;
                }
                if ($i != 1 && $i != $countWeekNextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');

                    if (strtotime($nextMonth->week[$i][$j]['currentDate']) >= strtotime(Carbon::now()->format('d.m.Y'))) {
                        $getEntryForDate = DB::table('personal_entries')->where(['entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate']), 'entry_enable' => true])->first();
                        if ($getEntryForDate) {
                            $nextMonth->week[$i][$j]['entryDay'] = true;
                        }
                    }

                    $currentDayNextMonth++;
                }
            }
        }

        return view('home', compact('thisMonth', 'nextMonth'));
    }
    public function getentry(Request $request)
    {
        try {
            $data = $request->json()->all();    //Получает тела запроса
            // return response()->json($data);
            $today = strtotime('today 00:00');
            $allEntries = DB::table('personal_entries')->where('entry_date', '>=', $today)->get()->groupBy(['entry_date', 'entry_start_time'])->toArray();
            $allServices = DB::table('services')->get()->toArray();
            $allPersonals = DB::table('personals')->get()->toArray();

            $personals = [];
            foreach ($allPersonals as $personal) {
                $personals[$personal->id] = $personal;
            }
            $services = [];
            foreach ($allServices as $service) {
                $service->personals = [];
                $personalIds = DB::table('personal_services')->where('service_id', $service->id)->get();
                foreach ($personalIds as $personal) {
                    $service->personals[$personal->personal_id] = $personals[$personal->personal_id];
                }
                $services[$service->id] = $service;
            }
            $entriesList = [];
            foreach ($allEntries as $date => $times) {
                $date = date('d.m.Y', strval($date));
                $entriesList[$date] = [];
                foreach ($times as $time => $entries) {
                    $time = date('H', $time);
                    // echo $time;
                    $entriesList[$date][$time] = [];
                    foreach ($entries as $index => $entry) {
                        if ($entry->entry_enable) {
                            if (DB::table('personals')->where(['id' => $entry->personal_id, 'publishing' => true])) {
                                $services_id = DB::table('personal_services')->where('personal_id', $entry->personal_id)->get('service_id')->toArray();
                                foreach ($services_id as $service) {
                                    $entriesList[$date][$time][$service->service_id] = $services[$service->service_id];
                                    $entriesList[$date][$time][$service->service_id]->entry_id = $entry->id;
                                    // dd($services[$service->id]);
                                }
                            }
                        } else {
                            unset($entriesList[$date][$time]);
                        }
                    }
                }
            }
            // dd($personals);
            // dd($services);
            // dd(date("d.m.Y H:i", 1651986000));
            // dd(date("d.m.Y H:i", 1651957200));
            // dd($entriesList);
            // dd($allEntries);
            if ($data['get'] == 'enable_hourses') {
                $hourses = [];
                foreach ($entriesList[$data['date']] as $hour => $array) {
                    $hourses['time-' . $hour] = $hour . ':00';
                }
                return response()->json(['status' => true, 'hourses' => $hourses]);
            } elseif ($data['get'] == 'services') {
                $services = $entriesList[$data['date']][mb_substr($data['time'], 0, 2)];
                return response()->json(['status' => true, 'services' => $services]);
            } elseif ($data['get'] == 'personals') {
                $personals = $entriesList[$data['date']][mb_substr($data['time'], 0, 2)][$data['service_id']]->personals;
                foreach ($personals as $index => $personal) {
                    $personal_specialities = DB::table('personal_specialities')->where('personal_id', $personal->id)->select('speciality_id')->get()->toArray();
                    $specialities = '';
                    foreach ($personal_specialities as  $speciality) {
                        $specialities .= DB::table('specialities')->where('id', $speciality->speciality_id)->select('title')->first()->title . ',';
                        $specialities = substr($specialities, 0, -1);
                    }
                    $personals[$index]->specialities = $specialities;
                }
                return response()->json(['status' => true, 'personals' => $personals]);
            } elseif ($data['get'] == 'data_before_buy') {
                $body = [];
                $body['personal_id'] = $data['personal_id'];
                $body['service_id'] = $data['service_id'];
                $body['fullname'] = DB::table('personals')->where('id', $data['personal_id'])->select('fullname')->first()->fullname;
                $body['date'] = strtotime($data['date']);
                $body['day'] =  $data['date'];
                $body['time'] = $data['time'];
                $body['service'] = DB::table('services')->where('id', $data['service_id'])->select('title')->first()->title;
                $body['price'] = DB::table('services')->where('id', $data['service_id'])->select('price')->first()->price;
                return response()->json(['status' => true, 'body' => $body]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}

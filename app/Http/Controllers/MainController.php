<?php

namespace App\Http\Controllers;

use App\Helpers\DatePicker;
use App\Models\Client;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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

    public function verification(Request $request)
    {
        try {
            $data = $request->json()->all();
            if ($data['count'] == 1) {
                $code = rand(1111, 9999);
                $key = config('app.ucaller_security_key');
                $service_id = config('app.ucaller_service_id');
                $response = Http::get("https://api.ucaller.ru/v1.0/initCall?phone=" . $data['phone'] . "&code=" . $code . "&key=" . $key . "&voice=false&service_id=" . $service_id);
                if ($response->json()['status']) {
                    $check_phone = DB::table('verification_code')->where(['phone' => $data['phone']])->first();
                    if (!$check_phone) {
                        DB::table('verification_code')->insert(['phone' => $data['phone'], 'code' => $code]);
                    } else {
                        DB::table('verification_code')->where(['phone' => $data['phone']])->update(['code' => $code]);
                    }
                    return response()->json(['status' => true]);
                }
                return response()->json(['status' => false]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function verificationCheck(Request $request)
    {
        $data = $request->json()->all();
        try {
            $checkCode = DB::table('verification_code')->where(['phone' => $data['phone'], 'code' => $data['code']])->first();
            if ($checkCode) {
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function verificationStore(Request $request)
    {
        try {
            $data = $request->json()->all();
            DB::beginTransaction();
            $entry = DB::table('personal_entries')->where(['personal_id' => $data['personal_id'], 'entry_date' => $data['date'], 'entry_start_time' => strtotime(date('Y-m-d', $data['date']) . ' ' . $data['time'])])->first();
            $client = Client::where('phone', $data['client_phone'])->first();
            if (!$client) {
                $client = Client::create(['name' => $data['client_name'], 'email' => $data['client_email'], 'phone' => $data['client_phone']]);
            }
            DB::table('client_entry')->insert(['client_id' => $client->id, 'entry_id' => $entry->id, 'status' => 'not_buyed']);
            DB::table('personal_entries')->where(['personal_id' => $data['personal_id'], 'entry_date' => $data['date'], 'entry_start_time' => strtotime(date('Y-m-d', $data['date']) . ' ' . $data['time'])])->update(['entry_enable' => false]);
            DB::commit();
            $service = Service::where('id', $data['service_id'])->first();

            if ($data['type_buyed'] == 'not') {
                return response()->json(['status' => true, 'url' => 'profile']);
            }
            if ($data['type_buyed'] == 'yes') {
                return response()->json(['status' => true, 'url' => 'buy', 'price' => $service->price]);
            }
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}

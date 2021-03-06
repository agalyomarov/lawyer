<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Entry;
use App\Models\Personal;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;
use YooKassa\Client as YooKassaClient;

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

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $thisMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => true, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['entryBuyed'] = true;
                    }

                    $currentDayThisMonth++;
                } elseif ($i == $countWeekThisMonth  && $j < $currentWeekDayStartNextMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $thisMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => 1, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['entryBuyed'] = true;
                    }

                    $currentDayThisMonth++;
                } elseif ($i != 1 && $i != $countWeekThisMonth) {
                    $thisMonth->week[$i][$j]['simpleDay'] = true;
                    $thisMonth->week[$i][$j]['currentDay'] = $currentDayThisMonth;
                    $thisMonth->week[$i][$j]['currentDate'] = Carbon::now()->startOfMonth()->addDays($currentDayThisMonth - 1)->format('d.m.Y');

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $thisMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => 1, 'entry_date' => strtotime($thisMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $thisMonth->week[$i][$j]['entryBuyed'] = true;
                    }

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

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $nextMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => 1, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['entryBuyed'] = true;
                    }

                    $currentDayNextMonth++;
                }
                if ($i == $countWeekNextMonth  && $j < $currentWeekDayStartNext2NextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $nextMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => 1, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['entryBuyed'] = true;
                    }

                    $currentDayNextMonth++;
                }
                if ($i != 1 && $i != $countWeekNextMonth) {
                    $nextMonth->week[$i][$j]['simpleDay'] = true;
                    $nextMonth->week[$i][$j]['currentDay'] = $currentDayNextMonth;
                    $nextMonth->week[$i][$j]['currentDate'] = Carbon::now()->addMonthsNoOverflow()->startOfMonth()->addDays($currentDayNextMonth - 1)->format('d.m.Y');

                    $getEntryForDate = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForDate) {
                        $nextMonth->week[$i][$j]['entryDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_enable' => 0, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['disableDay'] = true;
                    }

                    $getEntryForEnable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_buyed' => 1, 'entry_date' => strtotime($nextMonth->week[$i][$j]['currentDate'])])->first();
                    if ($getEntryForEnable) {
                        $nextMonth->week[$i][$j]['entryBuyed'] = true;
                    }

                    $currentDayNextMonth++;
                }
            }
        }

        $allBlocks = DB::table('personal_entries')->where('personal_id', $personal->id)->select('block_count', 'block_start_time', 'block_end_time', 'entry_date', 'entry_enable', 'entry_buyed')->get()->groupBy('block_count')->toArray();

        $blocks = [];
        foreach ($allBlocks as $block) {
            $blocks[$block[0]->block_count] = ['blockStartTime' => $block[0]->block_start_time, 'blockEndTime' => $block[0]->block_end_time];
            foreach ($block as $index => $blockData) {
                // $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date] = ['enable' => 0];
                if ($blockData->entry_date < strtotime(Carbon::now()->format('d.m.Y'))) {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['lastDate'] = true;
                } else {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['lastDate'] = false;
                }
                if ($blockData->entry_enable == false) {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['enable'] = false;
                }
                if ($blockData->entry_buyed == true) {
                    $blocks[$block[0]->block_count]['entryDates'][$blockData->entry_date]['buyed'] = true;
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
                return response()->json(['status' => 'validate', 'message' => '???????????????? ????????']);
            } else if ($blockStartTime + 3600 > $blockEndTime) {
                return response()->json(['status' => 'validate', 'message' => '?????????????????????????? ?????????? ???? ????????????????????']);
            }
            $blockCount = DB::table('personal_entries')->where('personal_id', $personal->id)->get()->groupBy('block_count')->count() + 1;
            DB::beginTransaction();
            foreach ($dates as $date) {
                $date = strtotime($date);
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime])->first();
                    if (boolval($checkEntryIsHas)) {
                        return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????? ???????? ' . date('d.m.Y H:i', $checkEntryIsHas->entry_start_time)]);
                    }
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1, 'entry_buyed' => 0]);
                }
            }
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            // return response()->json($e->getMessage());
            return response()->json(['status' => false]);
        }
    }
    public function delete(Personal $personal, Request $request)
    {
        try {
            $blockCount = $request->get('blockCount');
            $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where('block_count', $blockCount)->where('entry_enable', false)->count();
            if ($checkEntryIsHas > 0) {
                return response()->json(['status' => 'validate', 'message' => '?? ?????????? ???????? ???????????????? ????????????']);
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
            // return response()->json(['status' => $request->all()]);
            $blockStartTime = $request->get('blockStartTime');
            $blockEndTime = $request->get('blockEndTime');
            $blockCount = $request->get('blockCount');
            if ($blockStartTime + 3600 > $blockEndTime) {
                return response()->json(['status' => 'validate', 'message' => '?????????????????????????? ?????????? ???? ????????????????????']);
            }
            DB::beginTransaction();
            foreach ($dates as $index => $date) {
                $dates[$index] = strtotime($date);
            }
            // DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->whereNotIn('entry_date', $dates)->delete();
            foreach ($dates as $date) {
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime])->whereNot('block_count', $blockCount)->count();
                    if (boolval($checkEntryIsHas)) {
                        return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????? ???????? ' . date('d.m.Y', $date) . ' ' . gmdate('H:i', $startTime)]);
                    }
                }
            }

            $getDisableEntryInBlock = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount, 'entry_enable' => 0])->first();

            if ($getDisableEntryInBlock && (strtotime(Carbon::now()->format('d.m.Y ') . date('H:i', $getDisableEntryInBlock->entry_start_time)) - strtotime(Carbon::now()->format('d.m.Y') . ' 00:00:00')) < $blockStartTime) {
                return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????????? ?????? ???????? ' . date('d.m.Y H:i', $getDisableEntryInBlock->entry_start_time) . ' - ' . date('H:i', $getDisableEntryInBlock->entry_end_time)]);
            }
            if ($getDisableEntryInBlock && (strtotime(Carbon::now()->format('d.m.Y ') . date('H:i', $getDisableEntryInBlock->entry_end_time)) - strtotime(Carbon::now()->format('d.m.Y') . ' 00:00:00')) > $blockEndTime) {
                return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????????? ?????? ???????? ' . date('d.m.Y H:i', $getDisableEntryInBlock->entry_start_time) . ' - ' . date('H:i', $getDisableEntryInBlock->entry_end_time)]);
            }

            DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->whereNotIn('entry_date', $dates)->delete();

            $entryForNotAdded = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->select('entry_date')->get()->groupBy('entry_date')->toArray();

            $savedDates = array_keys($entryForNotAdded);
            $valuesDates = array_values($dates);
            $datesForSaved = array_values(array_diff_key($valuesDates, $savedDates));

            foreach ($datesForSaved as $date) {
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'block_count' => $blockCount])->first();
                    if ($checkEntryIsHas) {
                        return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????? ???????? ' . date('d.m.Y H:i', $checkEntryIsHas->entry_date)]);
                    }
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1, 'entry_buyed' => 0]);
                }
            }

            $datesWithEntryDisable = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->where('entry_enable', 0)->get()->groupBy('entry_date')->toArray();
            $savedDatesForUpdates = array_diff_key($entryForNotAdded, $datesWithEntryDisable);
            $savedDatesForUpdates = array_keys($savedDatesForUpdates);
            $datesWithEntryDisable = array_keys($datesWithEntryDisable);

            DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->whereIn('entry_date', $savedDates)->whereNotIn('entry_date', $datesWithEntryDisable)->delete();

            foreach ($savedDatesForUpdates as $date) {
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'block_count' => $blockCount])->first();
                    if ($checkEntryIsHas) {
                        return response()->json(['status' => 'validate', 'message' => '???????????? ???? ?????????????????????? ?? ????.?????? ???????????????? ???????????? ?????? ???????? ' . date('d.m.Y H:i', $checkEntryIsHas->entry_date)]);
                    }
                    DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1, 'entry_buyed' => 0]);
                }
            }

            DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount])->whereIn('entry_date', $datesWithEntryDisable)->where('entry_enable', 1)->delete();

            foreach ($datesWithEntryDisable as $date) {
                for ($i = $blockStartTime; $i < $blockEndTime; $i += 3600) {
                    $startTime = $date + $i;
                    $endTime = $startTime + 3600;
                    $checkEntryIsHas = DB::table('personal_entries')->where('personal_id', $personal->id)->where(['entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'block_count' => $blockCount])->first();
                    if (!$checkEntryIsHas) {
                        DB::table('personal_entries')->insert(['personal_id' => $personal->id, 'block_count' => $blockCount, 'block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime, 'entry_enable' => 1, 'entry_buyed' => 0]);
                    } else {
                        DB::table('personal_entries')->where(['personal_id' => $personal->id, 'block_count' => $blockCount, 'entry_date' => $date, 'entry_start_time' => $startTime, 'entry_end_time' => $endTime])->update(['block_start_time' => $blockStartTime, 'block_end_time' => $blockEndTime]);
                    }
                }
            }
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }
    public function getAllHourses(Personal $personal, Request $request)
    {
        try {
            $entry_date = strtotime($request->get('date'));
            $block_count = $request->get('block_count');
            $entries = DB::table('personal_entries')->where(['personal_id' => $personal->id, 'entry_date' => $entry_date, 'block_count' => $block_count])->get();
            $allHourses = [];
            foreach ($entries as $entry) {
                $allHourses[date('H:i', $entry->entry_start_time)] = ['status' => ''];
                if ($entry->entry_enable == false) {
                    $allHourses[date('H:i', $entry->entry_start_time)]['status'] = '???? ???????????????????? ??????????';
                }
                if ($entry->entry_buyed == true) {
                    $allHourses[date('H:i', $entry->entry_start_time)]['status'] = '???????????????????? ??????????';
                }
                $client_entry = DB::table('client_entry')->where(['entry_id' => $entry->id])->first();
                if ($client_entry) {
                    $client = Client::find($client_entry->client_id);
                    $service = Service::find($client_entry->service_id);
                    $allHourses[date('H:i', $entry->entry_start_time)]['client_entry_id'] =  $client_entry->id;
                    $allHourses[date('H:i', $entry->entry_start_time)]['client'] =  $client;
                    $allHourses[date('H:i', $entry->entry_start_time)]['service'] =  $service;
                    $allHourses[date('H:i', $entry->entry_start_time)]['personal_entry'] =  $entry;
                    $allHourses[date('H:i', $entry->entry_start_time)]['payment_id'] =  $client_entry->payment_id;
                    $allHourses[date('H:i', $entry->entry_start_time)]['link'] =  $client_entry->link;
                    $allHourses[date('H:i', $entry->entry_start_time)]['personal'] =  $personal;
                    $allHourses[date('H:i', $entry->entry_start_time)]['buyed'] = $entry->entry_buyed == true;
                    $allHourses[date('H:i', $entry->entry_start_time)]['entry_start_time'] = date('d.m.Y H:i', $entry->entry_start_time);
                    $allHourses[date('H:i', $entry->entry_start_time)]['disable'] = $entry->entry_start_time > time() ? true : false;
                }
            }
            return response()->json($allHourses);
            // return response()->json(['status' => true]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function disable_entry(Request $request)
    {
        $client_entry_id = $request->get('client_entry_id');
        try {
            DB::beginTransaction();
            $client_entry = DB::table('client_entry')->where(['id' => $client_entry_id])->first();
            if ($client_entry) {
                $service = Service::find($client_entry->service_id);
                if ($client_entry->status == 'buyed') {
                    $payment = new YooKassaClient();
                    $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
                    $response = $payment->createRefund(
                        array(
                            'amount' => array(
                                'value' => 2.00,
                                // 'value' => $service->price,
                                'currency' => 'RUB',
                            ),
                            'payment_id' => $client_entry->payment_id,
                        ),
                        Str::uuid()
                    );
                    if ($response->status == 'succeeded') {
                        DB::table('client_entry')->where(['id' => $client_entry->id])->delete();
                        DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_enable' => 1, 'entry_buyed' => 0]);
                    }
                } else if ($client_entry->status == 'not_buyed') {
                    DB::table('client_entry')->where(['id' => $client_entry->id])->delete();
                    DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_enable' => 1, 'entry_buyed' => 0]);
                }
            }
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false]);
        }
    }
}

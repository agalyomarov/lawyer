<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Link;
use App\Models\Personal;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use YooKassa\Client as YooKassaClient;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('client_phone')) {
            $client = Client::where('phone', session('client_phone'))->first();
            if ($client) {
                $client_entries = DB::table('client_entry')->where('client_id', $client->id)->get();
                return view('profile.index', compact('client'));
            }
        }
        return redirect()->route('home');
    }
    public function update(Request $request)
    {
        try {
            $data = $request->json()->all();
            $client = Client::where(['phone' => session('client_phone')])->first();
            if ($client) {
                $client->phone = $data['phone'];
                $client->name = $data['name'];
                $client->email = $data['email'];
                session(['client_phone' => $data['phone']]);
                session(['client_name' => $data['name']]);
                session(['client_email' => $data['email']]);
                $client->save();
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function entries(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            $client = Client::where('phone', session('client_phone'))->first();
            if (!$client) {
                return redirect()->route('home');
            }
            $allEntries = DB::table('client_entry')->where('client_id', $client->id)->paginate(10);
            // dd($allEntries);
            $payment = new YooKassaClient();
            $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
            $entries = [];
            foreach ($allEntries as $index => $entry) {
                if ($entry->status == 'not_buyed' && !$entry->payment_id) {
                    $idempotenceKey = Str::uuid();
                    $service = Service::find($entry->service_id);
                    $response = $payment->createPayment(
                        array(
                            'amount' => array(
                                // 'value' => $service->price . '.00',
                                'value' => '2.00',
                                'currency' => 'RUB',
                            ),
                            'confirmation' => array(
                                'type' => 'redirect',
                                'return_url' => config('app.url') . '/kassa/check?client_entry_id=' . $entry->id,
                            ),
                            'description' => 'oplata za konsultansiya',
                        ),
                        $idempotenceKey
                    );
                    $allEntries[$index]->payment_id = $response->id;
                    DB::table('client_entry')->where('id', $entry->id)->update(['payment_id' => $response->id]);
                } else if ($entry->status == 'not_buyed' && $entry->payment_id) {
                    $idempotenceKey = Str::uuid();
                    $getPayment = $payment->getPaymentInfo($entry->payment_id);
                    if ($getPayment->status == 'waiting_for_capture') {
                        $response = $payment->capturePayment(
                            array(
                                'amount' => array(
                                    'value' => '2.00',
                                    'currency' => 'RUB',
                                ),
                            ),
                            $entry->payment_id,
                            $idempotenceKey
                        );
                        if ($response->status == 'succeeded') {
                            $lastLink = Link::orderBy('id', 'desc')->first();
                            DB::table('client_entry')->where('id', $entry->id)->update(['status' => 'buyed', 'link' => $lastLink->link]);
                            Link::where('id', $lastLink->id)->delete();
                            DB::table('personal_entries')->where('id', $entry->entry_id)->update(['entry_buyed' => '1']);
                            $allEntries[$index]->status = 'buyed';
                        }
                    }
                }
            }
            foreach ($allEntries as $index => $entry) {
                $entries[$index] = [];
                $service = Service::find($entry->service_id);
                $personalEntry = DB::table('personal_entries')->where('id', $entry->entry_id)->first();
                $entryStartTime = date('d.m.Y H:i', $personalEntry->entry_start_time);
                $entries[$index]['entry_start_time'] = $entryStartTime;

                $entries[$index]['service_title'] = $service->title;
                $entries[$index]['service_id'] = $service->id;
                $entries[$index]['client_entry_id'] = $entry->id;
                $entries[$index]['service_price'] = $service->price;
                $entries[$index]['status'] = $entry->status;
                $entries[$index]['lasted'] = false;
                $entries[$index]['active'] = false;
                if ($personalEntry->entry_start_time <= time() && time() <=  $personalEntry->entry_end_time) {
                    $entries[$index]['active'] = true;
                } else if ($personalEntry->entry_end_time <= time()) {
                    $entries[$index]['lasted'] = true;
                    $entries[$index]['active'] = false;
                }
            }

            // dd($entries);
            $entries = array_reverse($entries);
            DB::commit();
            return view('profile.entry', compact('entries', 'allEntries'));
        } catch (\Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return $e;
        }
    }

    public function entryData(Request $request)
    {
        $client_entry_id = $request->get('client_entry_id');
        $client_entry = DB::table('client_entry')->where('id', $client_entry_id)->first();
        $service = Service::find($client_entry->service_id);
        $personal_entry = DB::table('personal_entries')->where('id', $client_entry->entry_id)->first();
        $personal = Personal::find($personal_entry->personal_id);
        $app_url = config('app.url');
        if (intval($personal_entry->entry_start_time) - 3600 > time()) {
            $client_entry->link = '';
        }
        $personal_entry->entry_start_time = date('d.m.Y H:i', $personal_entry->entry_start_time);
        return response()->json(['personal' => $personal, 'service' => $service, 'client_entry' => $client_entry, 'app_url' => $app_url, 'personal_entry' => $personal_entry]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
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
                // dd($client_entries);
                return view('profile.index', compact('client'));
            }
            return view('profile.index');
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
        try {
            $client = Client::where('phone', session('client_phone'))->first();
            $allEntries = DB::table('client_entry')->where('client_id', $client->id)->get()->reverse()->toArray();
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
                            DB::beginTransaction();
                            DB::table('client_entry')->where('id', $entry->id)->update(['status' => 'buyed']);
                            DB::table('personal_entries')->where('id', $entry->entry_id)->update(['entry_buyed' => '1']);
                            DB::commit();
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
                if ($entry->status == 'buyed') {
                    $entries[$index]['action'] = false;
                    $entries[$index]['status'] = 'Оплачень';
                } elseif ($entry->status == 'not_buyed') {
                    $entries[$index]['status'] = 'Неоплачень';
                    $entries[$index]['action'] = true;
                } elseif ($entry->status == 'disabled') {
                    $entries[$index]['status'] = 'Отменен';
                    $entries[$index]['action'] = false;
                }
            }
            // dd($allEntries);
            // dd($entries);
            // dd($client);
            return view('profile.entry', compact('entries'));
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
}

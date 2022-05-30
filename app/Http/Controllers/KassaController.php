<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use YooKassa\Client as YooKassaClient;

class KassaController extends Controller
{
    public function oplataUslugi(Request $request)
    {
        try {
            $client = Client::where('phone', session('client_phone', ''))->first();
            $client_entry = DB::table('client_entry')->where('id', $request->get('client_entry'))->first();
            $service = Service::find($client_entry->service_id);
            // dd($service);
            // dd($client);

            $payment = new YooKassaClient();
            $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
            $idempotenceKey = Str::uuid();
            $response = $payment->createPayment(
                array(
                    'amount' => array(
                        // 'value' => $service->price . '.00',
                        'value' => '2.00',
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => config('app.url') . '/kassa/check?client_entry_id=' . $client_entry->id,
                    ),
                    'description' => 'Оплата за услугу ' . $service->title,
                ),
                $idempotenceKey
            );
            DB::table('client_entry')->where('id', $client_entry->id)->update(['payment_id' => $response->id]);
            $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
            return redirect($confirmationUrl);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkOplata(Request $request)
    {
        try {
            $client_entry_id = $request->get('client_entry_id');
            $client_entry = DB::table('client_entry')->where('id', $client_entry_id)->first();
            $service = Service::find($client_entry->service_id);
            $client = Client::find($client_entry->client_id);
            $price = 0;
            if ($service) {
                $price = $service->price;
            }
            // dd($client_entry);
            $payment = new YooKassaClient();
            $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
            $paymentId = $client_entry->payment_id;
            $getPayment = $payment->getPaymentInfo($paymentId);
            // dd($getPayment);
            if ($getPayment->status == 'waiting_for_capture') {
                $idempotenceKey = Str::uuid();
                $response = $payment->capturePayment(
                    array(
                        'amount' => array(
                            'value' => '2.00',
                            'currency' => 'RUB',
                        ),
                    ),
                    $paymentId,
                    $idempotenceKey
                );
                // dd($response);
                if ($response->status == 'succeeded') {
                    DB::beginTransaction();
                    DB::table('client_entry')->where('id', $client_entry->id)->update(['status' => 'buyed']);
                    DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_buyed' => '1']);
                    DB::commit();
                }
            }
            // dd($recipient);
            return redirect()->route('profile.entries');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
    public function disabledOplata(Request $request)
    {
        $client = Client::where('phone', session('client_phone'))->first();
        if ($client) {
            try {
                DB::beginTransaction();
                $client_entry = DB::table('client_entry')->where(['id' => $request->get('client_entry'), 'client_id' => $client->id])->first();
                if ($client_entry) {
                    if ($client_entry->status == 'buyed') {
                        $payment = new YooKassaClient();
                        $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
                        $response = $payment->createRefund(
                            array(
                                'amount' => array(
                                    'value' => 2.00,
                                    'currency' => 'RUB',
                                ),
                                'payment_id' => $client_entry->payment_id,
                            ),
                            Str::uuid()
                        );
                        if ($response->status == 'succeeded') {
                            DB::table('client_entry')->where(['id' => $request->get('client_entry'), 'client_id' => $client->id])->update(['status' => 'disabled']);
                            DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_enable' => 1, 'entry_buyed' => 0]);
                        }
                        // dd($response);
                    } else if ($client_entry->status == 'not_buyed') {
                        DB::table('client_entry')->where(['id' => $request->get('client_entry'), 'client_id' => $client->id])->update(['status' => 'disabled']);
                        DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_enable' => 1, 'entry_buyed' => 0]);
                    }
                }
                DB::commit();
                return redirect()->route('profile.entries');
            } catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
        }
        return redirect()->route('profile.entries');
    }
}

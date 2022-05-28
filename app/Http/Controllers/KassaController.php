<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use YooKassa\Client as YooKassaClient;

class KassaController extends Controller
{
    public function oplataUslugi(Request $request)
    {
        try {
            $client = Client::where('phone', session('client_phone', ''))->first();
            $service = Service::find($request->get('service'));
            $client_entry = $request->get('client_entry');
            // dd($service);
            // dd($client);

            $payment = new YooKassaClient();
            $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));

            $idempotenceKey = uniqid('', true);
            $response = $payment->createPayment(
                array(
                    'amount' => array(
                        'value' => '2.00',
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => 'http://localhost:8000/kassa/check?client_entry_id=' . $client_entry,
                    ),
                    'description' => 'oplata za konsultansiya',
                ),
                $idempotenceKey
            );
            DB::table('client_entry')->where('id', $client_entry)->update(['payment_id' => $response->id]);
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
            // dd($client_entry);
            $payment = new YooKassaClient();
            $payment->setAuth(config('app.yoomoney_shop_id'), config('app.yoomoney_shop_key'));
            $paymentId = $client_entry->payment_id;
            $getPayment = $payment->getPaymentInfo($paymentId);
            if ($getPayment->status == 'waiting_for_capture') {
                $idempotenceKey = uniqid('', true);
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
            }
            DB::beginTransaction();
            DB::table('client_entry')->where('id', $client_entry->id)->update(['status' => 'buyed']);
            DB::table('personal_entries')->where('id', $client_entry->entry_id)->update(['entry_buyed' => '1']);
            DB::commit();
            return redirect('/profile');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }
}

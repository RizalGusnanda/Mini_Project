<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\TripayTransactionSuccess;
use Illuminate\Http\Request;
use Mail;

class TripayController extends Controller
{
    public function getPaymentChannels()
    {


        $apiKey = config('tripay.api_key');
        // dd($apiKey);


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $response = json_decode($response)->data;

        // dd(json_decode( $response)->data);

        return $response ? $response : $err;
    }

    public function requestTransaksi($method, $pakets)
    {

        $apiKey       =  config('tripay.api_key');
        $privateKey   =  config('tripay.private_key');
        $merchantCode =  config('tripay.merchant_code');
        $merchantRef  = 'GL-' . time();
        // percobaan
        // dd($apiKey, $privateKey, $merchantCode, $merchantRef);
        // dd($pakets);
        $amount       = $pakets->total_harga;

        $user = auth()->user();

        // user login customer yangn menyewa
        // $user = auth()->user();
        // manggil methode 
        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $amount,
            'customer_name' => $pakets->user->name,
            'customer_email' => $user->email,
            'customer_phone' => $user->no_hp,
            'order_items'    => [
                [
                    'name'        => $pakets->nama_paket,
                    'price'       => $pakets->total_harga,
                    'quantity'    => 1,
                    // 'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                    // 'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
                ],

            ],
            'return_url'   => 'https://domainanda.com/redirect',
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $pakets->total_harga, $privateKey)
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        $response = json_decode($response)->data;
        //   dd($response);

        // Cek jika respons transaksi sukses
        // Mengirim email setelah mendapatkan respons dari Tripay
        Mail::to($user->email)->send(new TripayTransactionSuccess($data,$response));
        // dd($response);
        return $response ?: $err;
    }

    public function detailTransaksi($reference)
    {


        $apiKey = config('tripay.api_key');

        $payload = [
            'reference'    =>  $reference
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $response = json_decode($response)->data;

        // dd($response);

        return $response ?: $err;
    }
}

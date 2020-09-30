<?php

namespace App\Utility;

use Illuminate\Support\Facades\Http;

class PaymentUtility
{

    //
    public function confirm_payment($expected_tx_ref, $expected_amount, $expected_currency, $transaction_id)
    {
        $url = "https://api.flutterwave.com/v3/transactions/".$transaction_id."/verify";

        $response = Http::withHeaders(["Content-Type"=>"application/json",
                                        "cache-control"=>"no-cache, max-age=0",
                                        "Authorization"=> "Bearer FLWSECK_TEST-f7118236cccf205b3fc9448bbfe15fd6-X" ])
                                        ->get($url);

        $response = (string)$response->getBody();
        $response = json_decode($response, true);

        if(!empty($response["data"]["status"])){
            $paymentStatus = $response["data"]["status"];
            $actual_tx_ref = $response["data"]["tx_ref"];
            $chargeAmount = $response["data"]["amount"];
            $chargeCurrency = $response["data"]["currency"];

            if (($paymentStatus == "successful") && ($actual_tx_ref == $expected_tx_ref) &&   ($chargeAmount == $expected_amount) &&  ($chargeCurrency ==  $expected_currency))
            {
                return  "success";
            }
        }
        return  "failure";
    }

    
    public function proceedToPayment($tx_ref, $amount, $customer_email, $phone_number, $currency, $redirect_url ){
        
        $data = array(
            
            'customer' => [
                "email"=>$customer_email,
                "phonenumber"=> $phone_number,
                "name"=> "",
            ],
            'amount'  => $amount,
            'currency' => $currency,
            'tx_ref' => $tx_ref,
            'payment_options' => 'card',
            'redirect_url' => $redirect_url,
            "customizations" => [
                "title"=>"Covid Test",
                "description"=>"Covid Test Appointment Booking for Travellers",
                "logo"=>"https://assets.piedpiper.com/logo.png",
            ]  ,
        );

        $url = "https://api.flutterwave.com/v3/payments";

        $response = Http::withHeaders(["Content-Type"=>"application/json",
                                        "cache-control"=>"no-cache, max-age=0",
                                        "Authorization"=> "Bearer FLWSECK_TEST-f7118236cccf205b3fc9448bbfe15fd6-X" ])
                    ->post($url, $data);
        if ( !$response->successful()) {
            dd("Error: call to URL $url ");
        }
        // curl_close($curl);
        
        $response = json_decode($response, true);
        return  $response;
    }
    
}

?>
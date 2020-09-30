<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RaveController extends Controller
{

    
    /**
    * Initialize Rave payment process
    * @return void
    */public function initialize(Request $request){
 
     //This initializes payment and redirects to the payment gateway//The initialize method takes the parameter of the redirect URL
    //  Rave::initialize(route('callback'));
    
    
    $data = array(
            
        'customer' => [
            "email"=>$request->email,
            "phonenumber"=> $request->phone_number,
            "name"=> "",
        ],
        'amount'  => $request->amount,
        'currency' => $request->currency,
        'tx_ref' => $request->tx_ref,
        'payment_options' => 'card',
        'redirect_url' => $request->redirect_url,
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
 /**
    * Obtain Rave callback information
    * @return void
*/public function callback(){
        $data = Rave::verifyTransaction(request()->txref);
        dd($data);  // view the data response
            if ($data->status == 'success') {
                
        //do something to your database
        }
        else {
        //return invalid payment
        }
  }
}

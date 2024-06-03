<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ShoopingController extends Controller
{
    //
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://kytutes.com/api/items",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer 2|KLgAGFkyGxcwcMQIg1GAPPPBvR64BwtRxw9oTWsRd9fee9ee",
            "Content-Type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = Collect(json_decode($response,true));
            return view("sbadmin.shooping.home.App", compact("data"));
        }
    }

    public function addCart($id)
    {
        $curl = curl_init();

         curl_setopt_array($curl, [
        
         CURLOPT_URL => "https://kytutes.com/api/items?reference=$id",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_POSTFIELDS => "",
         CURLOPT_HTTPHEADER => [
             "Accept: application/json",
             "Authorization: Bearer 2|KLgAGFkyGxcwcMQIg1GAPPPBvR64BwtRxw9oTWsRd9fee9ee",
             "Content-Type: application/json"
         ]
        ]);

         $response = curl_exec($curl);
         $err = curl_error($curl);

         curl_close($curl);

         if ($err) {
             echo "cURL Error #:" . $err;
         } else {
            $data = Collect(json_decode($response,true));
           
            dd($data);
            Cart::add(array(
                'id' => $data[0]["reference"],
                'name' => $data[0]["nome"],
                'price' => $data[0]["preco"],
                'quantity' => 1,
                'attributes' => array(
                    'image' => $data[0]["imagem"]
                )
            ));
            return response([
                "message"=>$data[0]["nome"]
            ]);
         }
    }
}
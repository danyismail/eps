<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SaldoController extends Controller
{
    public function index(Request $request){

        $client = new Client();

        $pathDB = 'ra';
        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/supplier/$pathDB/balance";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
            ]);
                
            $res = json_decode($response->getBody());

            $data['data'] = $res->data ?? array();
        } catch (\Exception $e) {
            $data['data'] = array();
        }
            
        return view('main.saldo', $data);
    }
}

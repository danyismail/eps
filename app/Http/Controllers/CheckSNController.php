<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CheckSNController extends Controller
{
    public function index(Request $request){

        $client = new Client();

        $pathDB = '';
        $datafilter = array();

        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/sn/null/$pathDB";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json",
                    "Accept" => "application/json",
                ]
            ]);
                
            $res = json_decode($response->getBody());
            $data['nullableSN'] = $res->data ?? array();

        } catch (\Exception $e) {
            $data['nullableSN'] = array();
        }

        try {
            $url = env('API_HOST')."/sn/duplicate/$pathDB";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json",
                    "Accept" => "application/json",
                ]
            ]);
                
            $res = json_decode($response->getBody());
            $data['duplicateSN'] = $res->data ?? array();

        } catch (\Exception $e) {
            $data['duplicateSN'] = array();
        }
            
        return view('main.check-sn', $data);
    }

}

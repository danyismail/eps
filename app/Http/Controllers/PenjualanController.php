<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PenjualanController extends Controller
{
    public function index(Request $request){

        $client = new Client();

        $pathDB = 're';
        $datafilter = array();
        if($request->get('startDt')) {
            $datafilter['startDate'] = $request->get('startDt');
        }

        if($request->get('endDt')) {
            $datafilter['endDate'] = $request->get('endDt');
        }

        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/sales/$pathDB/periode";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                'body' => json_encode($datafilter)
            ]);
                
            $res = json_decode($response->getBody());

            $data['data'] = $res->data ?? array();

        } catch (\Exception $e) {
            $data['data'] = array();
        }
            
        return view('main.penjualan', $data);
    }

    public function Periode(Request $request){

        $client = new Client();

        $pathDB = 're';
        $datafilter = array();

        if($request->get('startDt')) {
            $datafilter['startDate'] = $request->get('startDt');
        }

        if($request->get('endDt')) {
            $datafilter['endDate'] = $request->get('endDt');
        }

        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/sales/$pathDB/periode";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                'body' => json_encode($datafilter)
            ]);
                
            $res = json_decode($response->getBody());

            $data['data'] = $res->data ?? array();

        } catch (\Exception $e) {
            $data['data'] = array();
        }
            
        return view('main.penjualan-periode', $data);
    }
}

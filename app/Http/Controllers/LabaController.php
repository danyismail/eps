<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LabaController extends Controller
{
    public function Reseller(Request $request){

        $client = new Client();

        $datafilter = array();
        if($request->get('startDt')) {
            $datafilter['startDt'] = $request->get('startDt');
        }

        if($request->get('endDt')) {
            $datafilter['endDt'] = $request->get('endDt');
        }

        if($request->get('id')) {
            $datafilter['id'] = $request->get('id');
        }

        $pathDB = $request->db;
        // if(in_array($request->session()->get('userdata')['role'], ['amazone', 'superadmin'] )) {
        //     $pathDB = 'ra';
        // } else if($request->session()->get('userdata')['role'] == 'eps') { 
        //     $pathDB = 're';
        // }

        try {
            $url = env('API_HOST')."/reseller/$pathDB/list";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
            ]);  
            $res = json_decode($response->getBody());
            $data['reseller'] = $res->data ?? array();
        } catch (\Exception $e) {
            $data['reseller'] = array();
        }

        try {
            $url = env('API_HOST')."/reseller/$pathDB/laba";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);  
            $res = json_decode($response->getBody());
            $data['data'] = $res->data ?? array();
        } catch (\Exception $e) {
            $data['data'] = array();
        }

        try {
            $url = env('API_HOST')."/reseller/$pathDB/sum";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);  
            $res = json_decode($response->getBody());
            $data['data2'] = $res->data ?? array();
        } catch (\Exception $e) {
            $data['data2'] = array();
        }
            
        return view('main.laba-reseller', $data);
    }

    public function Harian(Request $request){

        $client = new Client();

        $pathDB = 'ra';
        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/reseller/$pathDB/laba/hourly";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
            ]);
                
            $res = json_decode($response->getBody(), true);
            $data['labaHarian'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $data['labaHarian'] = array();
        }
            
        return view('main.laba-harian', $data);
    }

    public function Rugi(Request $request){

        $client = new Client();

        $datafilter = array();
        if($request->get('startDt')) {
            $datafilter['startDt'] = $request->get('startDt');
        }

        if($request->get('endDt')) {
            $datafilter['endDt'] = $request->get('endDt');
        }
        
        $pathDB = 'ra';
        if($request->get('db')) {
            $pathDB = $request->get('db');
        };

        try {
            $url = env('API_HOST')."/reseller/$pathDB/labarugi";
            $response = $client->request('GET', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);
                
            $res = json_decode($response->getBody(), true);
            $data['labarugi'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $data['labarugi'] = array();
        }
            
        return view('main.laba-rugi', $data);
    }
}

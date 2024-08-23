<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class KpiController extends Controller
{
    public function index(Request $request){

        $client = new Client();

        $pathDB = 'da';
        $datafilter = array();
        if($request->get('startDt')) {
            $datafilter['startDt'] = trim($request->get('startDt'));
        }

        if($request->get('endDt')) {
            $datafilter['endDt'] = trim($request->get('endDt'));
        }

        if($request->get('tujuan')) {
            $datafilter['mdn'] = trim($request->get('tujuan'));
        }

        if($request->get('shift')) {
            $datafilter['shift'] = trim($request->get('shift'));
        }

        if($request->get('status')) {
            $datafilter['status'] = (int)$request->get('status');
        };

        if($request->get('db')) {
            $pathDB = trim($request->get('db'));
        };

        $data['page']                   = (int)$request->get('page') ?? 1;
        $data['num_results_on_page']    = 10;

        $datafilter['view']             = $data['num_results_on_page'];
        
        $data['queryString']            = http_build_query($datafilter);
        $datafilter['page']             = $data['page'];

        try {

            $url = env('API_HOST')."/kpi/$pathDB/list";
            $response = $client->request('POST', $url, [
                "headers" => [
                    "Authorization" => "Bearer ".$request->session()->get('userdata')['token'],
                    "Content-Type" => "application/json"
                ],
                'body' => json_encode($datafilter)
            ]);
                
            $res = json_decode($response->getBody());

            $data['data'] = $res->data ?? array();
            $data['total_pages'] = $res->total ?? 0;
            $data['success'] = $res->success ?? 0;
            $data['failed'] = $res->failed ?? 0;

        } catch (\Exception $e) {
            $data['data'] = array();
            $data['total_pages'] = 0;
            $data['success'] = 0;
            $data['failed'] = 0;
        }
            
        return view('main.kpi', $data);
    }
}

<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Reseller extends BaseController
{
    use ResponseTrait;
    public function GetLaba($db_conn)
	{
        $request = request();
        $client = service('curlrequest');
        $from = '';
        $to = '';
        $id = '';

        // dd($request->getGet('startDt'));
        $datafilter = array();
        if($request->getGet('startDt')) {
            $from = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $to = $request->getGet('endDt');
        }

        if($request->getGet('id')) {
            $id = $request->getGet('id');
        }

        try {
            $makeRequest = $client->request("GET", getenv('API_HOST')."/reseller/$db_conn/laba?startDt=$from&&endDt=$to&&id=$id", [
            ]);
            $res = json_decode($makeRequest->getBody(), true);
            $response['data'] = $res['data'] ?? array();
            $response['total_pages'] = $res['total'] ?? 0;
            $response['success'] = $res['success'] ?? 0;
            $response['failed'] = $res['failed'] ?? 0;
            $getReseller = $client->request("GET", getenv('API_HOST')."/reseller/$db_conn/list", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $resReseller = json_decode($getReseller->getBody(), true);
            $response['reseller'] = $resReseller['data'] ?? array();

        } catch (\Exception $e) {
            $response['reseller'] = array();
            $response['data'] = array();
        }

        try {
            $makeRequest = $client->request("GET", getenv('API_HOST')."/reseller/$db_conn/sum?startDt=$from&&endDt=$to&&id=$id", [
            ]);
            $res2 = json_decode($makeRequest->getBody(), true);
            $response['data2'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            $response['data2'] = array();
        }
        $useDB = CheckDB($db_conn);
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => true),
            array('label' => 'Reseller', 'url' => '', 'active' => true),
            array('label' => $useDB, 'url' => '', 'active' => true),
            array('label' => 'Laba', 'url' => '', 'active' => false),
        );
        echo view('admin/dashboard/reseller_view', $response);
	}
}
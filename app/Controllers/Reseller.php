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
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
            ]);
            CheckStatusResponAPI($makeRequest->getStatusCode());
            $res = json_decode($makeRequest->getBody(), true);
            $response['data'] = $res['data'] ?? array();
            $response['total_pages'] = $res['total'] ?? 0;
            $response['success'] = $res['success'] ?? 0;
            $response['failed'] = $res['failed'] ?? 0;
            $getReseller = $client->request("GET", getenv('API_HOST')."/reseller/$db_conn/list", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
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
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
            ]);
            CheckStatusResponAPI($makeRequest->getStatusCode());
            $res2 = json_decode($makeRequest->getBody(), true);
            $response['data2'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            $response['data2'] = array();
        }
        $useDB = CheckDB($db_conn);
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Reseller', 'url' => '', 'active' => false),
            array('label' => $useDB, 'url' => '', 'active' => false),
            array('label' => 'Laba', 'url' => '', 'active' => true),
        );
        echo view('admin/dashboard/reseller_view', $response);
	}

    public function GetLabaHarian($db_conn)
	{
        $client = service('curlrequest');

        try {
            $getLabaHarian = $client->request("GET", getenv('API_HOST')."/reseller/$db_conn/laba/hourly", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getLabaHarian->getStatusCode());
            $resultHarian = json_decode($getLabaHarian->getBody(), true);
            $response['labaHarian'] = $resultHarian['data'] ?? array(); 
        } catch (\Exception $e) {
            $response['labaHarian'] = array();
        }

        $useDB = CheckDB($db_conn);
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Reseller', 'url' => '', 'active' => false),
            array('label' => $useDB, 'url' => '', 'active' => false),
            array('label' => 'Laba Harian', 'url' => '', 'active' => true),
        );

        echo view('admin/dashboard/check_laba_harian', $response);
	}

    public function Labarugi()
	{
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'ra';
        $datafilter = array();
        if($request->getGet('startDt')) {
            $datafilter['startDt'] = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $datafilter['endDt'] = $request->getGet('endDt');
        }

        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        $response['pathDB'] = $pathDB; 

        try {
            $getLabaHarian = $client->request("GET", getenv('API_HOST')."/reseller/$pathDB/labarugi", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
                "query" => $datafilter
            ]);

            CheckStatusResponAPI($getLabaHarian->getStatusCode());
            $resultHarian = json_decode($getLabaHarian->getBody(), true);
            $response['labarugi'] = $resultHarian['data'] ?? array(); 
        } catch (\Exception $e) {
            $response['labarugi'] = array();
        }

        $useDB = CheckDB($pathDB);
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Reseller', 'url' => '', 'active' => false),
            array('label' => $useDB, 'url' => '', 'active' => false),
            array('label' => 'Laba Rugi', 'url' => '', 'active' => true),
        );

        echo view('admin/dashboard/check_laba_rugi', $response);
	}
}
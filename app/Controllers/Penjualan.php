<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Penjualan extends BaseController
{
    public function index()
	{
        $request = request();
        $client = service('curlrequest');

        $pathDB = 're';
        $datafilter = array();
        
        if($request->getGet('startDt')) {
            $datafilter['startDate'] = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $datafilter['endDate'] = $request->getGet('endDt');
        }

        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        try {
            $getSalesPeriode = $client->request("GET", getenv('API_HOST')."/sales/$pathDB/periode", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);

            $res = json_decode($getSalesPeriode->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan', 'url' => '', 'active' => false),
            array('label' => CheckDB($pathDB), 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}

    public function periode()
	{
        $request = request();
        $client = service('curlrequest');

        $pathDB = 're';
        $datafilter = array();

        if($request->getGet('startDt')) {
            $datafilter['startDate'] = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $datafilter['endDate'] = $request->getGet('endDt');
        }

        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        try {
            $getSalesPeriode = $client->request("GET", getenv('API_HOST')."/sales/$pathDB/periode", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);

            $res = json_decode($getSalesPeriode->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan', 'url' => '', 'active' => false),
            array('label' => CheckDB($pathDB), 'url' => '', 'active' => true)
        );
        echo view('admin/dashboard/sales_periode_view', $response);
	}

}
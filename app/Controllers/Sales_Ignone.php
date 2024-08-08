<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Sales extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $client = service('curlrequest');
        try {
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/sales", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($getDepositToday->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan Hari Ini', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}


    public function GetSales($db_conn)
	{
        $client = service('curlrequest');

        try {
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/sales/$db_conn", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($getDepositToday->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Sales Today '.$db_conn, 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}

    public function GetSalesByDate($db_conn)
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';
        $client = service('curlrequest');

        try {
            $getSalesPeriode = $client->request("GET", getenv('API_HOST')."/sales/$db_conn/periode?startDate=$from&endDate=$to", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($getSalesPeriode->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Sales '.$db_conn, 'url' => '', 'active' => true)
        );
        echo view('admin/dashboard/sales_periode_view', $response);
	}

    public function LabaReseller()
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';
        $client = service('curlrequest');
        try {
            $labaReseller = $client->request("GET", getenv('API_HOST')."/margin/ba/reseller?startDt=$from&endDt=$to", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res = json_decode($labaReseller->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
        );
        echo view('admin/dashboard/laporan_laba_reseller', $response);
	}

    public function LabaSupplier()
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';
        $client = service('curlrequest');

        try {
            $labaSupplier = $client->request("GET", getenv('API_HOST')."/margin/ba/supplier?startDt=$from&endDt=$to", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($labaSupplier->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
        );
        echo view('admin/dashboard/laporan_laba_supplier', $response);
	}

    public function LabaProvider()
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';
        $client = service('curlrequest');

        try {
            $result = $client->request("GET", getenv('API_HOST')."/margin/ba/provider?startDt=$from&endDt=$to", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($result->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
        );
        echo view('admin/dashboard/laporan_laba_provider', $response);
	}

}
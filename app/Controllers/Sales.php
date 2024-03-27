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
        echo view('admin/dashboard/sales_periode_amz', $response);
	}

}

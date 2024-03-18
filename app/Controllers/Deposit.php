<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Deposit extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        try {
            $client = service('curlrequest');
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/deposit", [
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
            array('label' => 'Supplier EPS', 'url' => '', 'active' => true)
        );
        return view('admin/dashboard/deposit_view', $response);
	}

    public function get_deposit()
	{
        try {
            $client = service('curlrequest');
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/depositProd", [
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
            array('label' => 'Supplier Amazone', 'url' => '', 'active' => true)
        );
        return view('admin/dashboard/deposit_view', $response);


	}

    public function check_supplier_balance($db_conn)
	{
        try {
            $client = service('curlrequest');
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/replica/$db_conn/supplier-balance", [
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
            array('label' => 'Supplier Balance '.$db_conn, 'url' => '', 'active' => true)
        );
        return view('admin/dashboard/deposit_view', $response);
	}
}

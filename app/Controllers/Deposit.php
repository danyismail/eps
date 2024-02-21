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
        $client = service('curlrequest');
        $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/deposit", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/deposit_view', $response);
	}

    public function get_deposit()
	{
        $client = service('curlrequest');
        $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/depositProd", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Supplier Amazon', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/deposit_view', $response);
	}
}

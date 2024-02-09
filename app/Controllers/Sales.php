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
        // $getDepositToday = $client->request("GET", "http://36.88.42.95:1523/api/eps/sales", [
        $getDepositToday = $client->request("GET", "http://localhost:1523/api/eps/sales", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Sales', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}

}

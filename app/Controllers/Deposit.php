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
        $getDepositToday = $client->request("GET", "http://localhost:1523/api/eps/deposit", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();
        echo view('admin/dashboard/deposit_view', $response);
	}

}

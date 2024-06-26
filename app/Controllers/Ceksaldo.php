<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Ceksaldo extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $request = request();
        $pathDB = 'ra';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        try {
            $client = service('curlrequest');
            $getDepositToday = $client->request("GET", getenv('API_HOST')."/supplier/$pathDB/balance", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getDepositToday->getStatusCode());
            $res = json_decode($getDepositToday->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Supplier', 'url' => '/', 'active' => false),
            array('label' => CheckDB($pathDB), 'url' => '', 'active' => true)
        );
        return view('admin/dashboard/ceksaldo_view', $response);
	}
}

<?php

namespace App\Controllers\Saleshub;
use App\Controllers\BaseController;

class RevenuePerBrandController extends BaseController
{
    public function Index()
	{
        $session = session();
        $request = request();
        $client = service('curlrequest');

        $datafilter = array();
        $dbPath = 'ra';

        if($request->getGet('db')) {
            $dbPath = $request->getGet('db');
        }

        if($request->getGet('startDt') === 'yesterday') {
            $datafilter['startDt'] = $request->getGet('startDt');
        } else {

            if($request->getGet('startDt')) {
                $datafilter['startDt'] = $request->getGet('startDt');
            } 

            if($request->getGet('endDt')) {
                $datafilter['endDt'] = $request->getGet('endDt');
            }
        }

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/hub/".$dbPath."/brand-category-revenue", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array('response' => []);
        }

        $response['breadcrumb'] = array(
            array('label' => 'Sales Hub', 'url' => '', 'active' => false),
            array('label' => 'Revenue Per Brand '.CheckDB($dbPath), 'url' => '', 'active' => true),
        );
        if($session->get('data')['role'] === 'superadmin'){
            echo view('admin/saleshub/revenue_perbrand/revenue_perbrand', $response);
        }
        echo view('admin/dashboard/product_overview', $response);
	}
}
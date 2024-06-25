<?php

namespace App\Controllers\Saleshub;
use App\Controllers\BaseController;

class TotalRevenueController extends BaseController
{
    public function Index()
	{
        $request = request();
        $client = service('curlrequest');

        $datafilter = array();
        if($request->getGet('startDt')) {
            $datafilter['startDt'] = $request->getGet('startDt');
        }

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/hub/brand-revenue", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "query" => $datafilter
            ]);

            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Sales Hub', 'url' => '', 'active' => false),
            array('label' => 'Total Revenue ', 'url' => '', 'active' => true),
        );
        echo view('admin/saleshub/total_revenue/total_revenue', $response);
	}
}
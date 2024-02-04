<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Kpi extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $request = request();
        $client = service('curlrequest');

        $datafilter = array(
            'page' => 1,
            'view' => 10
        );

        if($request->getGet('startDt')) {
            $datafilter['startDt'] = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $datafilter['endDt'] = $request->getGet('endDt');
        }

        if($request->getGet('mdn')) {
            $datafilter['mdn'] = $request->getGet('mdn');
        }

        if($request->getGet('shift')) {
            $datafilter['shift'] = $request->getGet('shift');
        }

        if($request->getGet('status')) {
            $datafilter['status'] = $request->getGet('status');
        };

        $posts_data = $client->request("POST", "http://36.88.42.95:1523/api/eps/getKpis", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
			"form_params" => $datafilter
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['data'] = $res['data'] ?? array();
        echo view('admin/dashboard/kpi_view', $response);
	}

}

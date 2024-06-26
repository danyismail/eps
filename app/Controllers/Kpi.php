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

        $pathDB = 'da';
        $datafilter = array();
        if($request->getGet('startDt')) {
            $datafilter['startDt'] = $request->getGet('startDt');
        }

        if($request->getGet('endDt')) {
            $datafilter['endDt'] = $request->getGet('endDt');
        }

        if($request->getGet('tujuan')) {
            $datafilter['mdn'] = $request->getGet('tujuan');
        }

        if($request->getGet('shift')) {
            $datafilter['shift'] = $request->getGet('shift');
        }

        if($request->getGet('status')) {
            $datafilter['status'] = $request->getGet('status');
        };

        if($request->getGet('db')) {
            $datafilter['db'] = $request->getGet('db');
            $pathDB = $request->getGet('db');
        };

        $response['queryString'] = http_build_query($datafilter);

        $response['page'] = $request->getGet('page') ?? 1;
        $response['num_results_on_page'] = 10;

        $datafilter['page'] = $request->getGet('page') ?? 1;
        $datafilter['view'] = $response['num_results_on_page'];

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/kpi/$pathDB/list", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $datafilter
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());

            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
            $response['total_pages'] = $res['total'] ?? 0;
            $response['success'] = $res['success'] ?? 0;
            $response['failed'] = $res['failed'] ?? 0;

        } catch (\Exception $e) {
            $response['data'] = array();
            $response['total_pages'] = 0;
            $response['success'] = 0;
            $response['failed'] = 0;
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/supplier', 'active' => false),
            array('label' => 'KPI', 'url' => '', 'active' => false),
            array('label' => CheckDB($pathDB), 'url' => '', 'active' => true)
        );
        echo view('admin/dashboard/kpi_view', $response);
	}
}

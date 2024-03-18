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
        try {
            $request = request();
            $client = service('curlrequest');

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

            $response['queryString'] = http_build_query($datafilter);

            $response['page'] = $request->getGet('page') ?? 1;
            $response['num_results_on_page'] = 10;

            $datafilter['page'] = $request->getGet('page') ?? 1;
            $datafilter['view'] = $response['num_results_on_page'];

            $posts_data = $client->request("POST", getenv('API_HOST')."/api/eps/getKpis", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $datafilter
            ]);

            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
            $response['total_pages'] = $res['total'] ?? 0;
            $response['success'] = $res['success'] ?? 0;
            $response['failed'] = $res['failed'] ?? 0;

            $response['breadcrumb'] = array(
                array('label' => 'Home', 'url' => '/supplier', 'active' => false),
                array('label' => 'KPI', 'url' => '', 'active' => true)
            );
            echo view('admin/dashboard/kpi_view', $response);
        } catch (\Exception $e) {
            return view('admin/dashboard/error_view', ['message' => 'error occured']);
        }
	}

    public function get_kpi()
	{
        try {
            $request = request();
            $client = service('curlrequest');

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

            $response['queryString'] = http_build_query($datafilter);

            $response['page'] = $request->getGet('page') ?? 1;
            $response['num_results_on_page'] = 10;

            $datafilter['page'] = $request->getGet('page') ?? 1;
            $datafilter['view'] = $response['num_results_on_page'];

            $posts_data = $client->request("POST", getenv('API_HOST')."/api/eps/getKpisProd", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $datafilter
            ]);

            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
            $response['total_pages'] = $res['total'] ?? 0;
            $response['success'] = $res['success'] ?? 0;
            $response['failed'] = $res['failed'] ?? 0;

            $response['breadcrumb'] = array(
                array('label' => 'Home', 'url' => '/supplier', 'active' => false),
                array('label' => 'KPI Amazon', 'url' => '', 'active' => true)
            );

            echo view('/admin/dashboard/kpi_view_amz', $response);
        } catch (\Throwable $th) {
            return view('admin/dashboard/error_view', ['message' => 'error occured']);
        }
	}
}

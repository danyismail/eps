<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class CheckPending extends BaseController
{
    public function index()
	{
        $client = service('curlrequest');
        $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/eps/supplier", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['data'] = $res['data'] ?? array();
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Eps', 'url' => '', 'active' => true)
        );

        echo view('admin/Finance/Eps/supplier/view', $response);
	}

    public function add() {
        $client = service('curlrequest');
        $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/eps/supplier", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['supplier'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Depo', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Depo/create', $response);
    }

    public function create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('rekening_asal');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/e/deposit", [
            "form_params" => $dataPost
		]);
        return redirect()->to('/finance/depo/add');
    }
}

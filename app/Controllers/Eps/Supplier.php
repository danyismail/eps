<?php

namespace App\Controllers\Eps;
use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function index()
	{
        $request = request();
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
            array('label' => 'Home', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => true)
        );

        echo view('admin/Eps/supplier/view', $response);
	}

    public function add() {
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '/eps/supplier', 'active' => false),
            array('label' => 'Add', 'url' => '', 'active' => true)
        );
        echo view('admin/Eps/supplier/create', $response);
    }

    public function create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('name');
        $dataPost['status'] = $request->getPost('status');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/create", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);
        return redirect()->to('/eps/supplier');
    }

    public function status() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/update", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);
        return redirect()->to('/eps/supplier');
    }

    public function edit() {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        $getAPI = $client->request("GET", getenv('API_HOST')."/api/finance/eps/supplier/$id", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);
        $res = json_decode($getAPI->getBody(), true);
        $response['data'] = $res['data'] ?? array();
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '/eps/supplier', 'active' => false),
            array('label' => 'Edit', 'url' => '', 'active' => true)
        );

        echo view('admin/Eps/supplier/update', $response);
    }

    public function update() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getPost('id');
        $dataPost['status'] = $request->getPost('status');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/update", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);

        return redirect()->to('/eps/supplier');
    }

    public function delete() {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        $posts_data = $client->request("DELETE", getenv('API_HOST')."/api/finance/eps/supplier/delete/$id");

        return redirect()->to('/eps/supplier');
    }
}
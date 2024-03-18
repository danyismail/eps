<?php

namespace App\Controllers\Finance\Amz;
use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function index()
	{
        try {
            $request = request();
            $client = service('curlrequest');

            $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/amz/supplier", [
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
                array('label' => 'Amazon', 'url' => '', 'active' => true)
            );
            echo view('admin/Finance/Amz/supplier/view', $response);
        } catch (\Throwable $th) {
            return view('admin/dashboard/error_view', ['message' => 'error occured']);
        }
	}

    public function status() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/amz/supplier/update", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);
        return redirect()->to('/finance/supplier/amz');
    }

    public function add() {
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Amazon', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Amz/supplier/create', $response);
    }

    public function create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('name');
        $dataPost['status'] = $request->getPost('status');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/amz/supplier/create", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);
        return redirect()->to('/finance/supplier/amz');
    }

    public function edit() {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        $getAPI = $client->request("GET", getenv('API_HOST')."/api/finance/amz/supplier/$id", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);
        $res = json_decode($getAPI->getBody(), true);
        $response['data'] = $res['data'] ?? array();
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Amazon', 'url' => '', 'active' => true)
        );

        echo view('admin/Finance/Amz/supplier/update', $response);
    }

    public function update() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getPost('id');
        $dataPost['status'] = $request->getPost('status');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/amz/supplier/update", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
            "form_params" => $dataPost
		]);

        return redirect()->to('/finance/supplier/amz');
    }

    public function delete() {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        $posts_data = $client->request("DELETE", getenv('API_HOST')."/api/finance/amz/supplier/delete/$id");

        return redirect()->to('/finance/supplier/amz');
    }
}

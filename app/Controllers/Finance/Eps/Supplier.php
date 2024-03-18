<?php

namespace App\Controllers\Finance\Eps;
use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function index()
	{
        $request = request();
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/eps/supplier", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
            // exit($e->getMessage());
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Eps', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Amz/supplier/view', $response);
	}

    public function status() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/update", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/eps');
    }

    public function add() {
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Eps', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Eps/supplier/create', $response);
    }

    public function create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('name');
        $dataPost['status'] = $request->getPost('status');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/create", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/eps');
    }

    public function edit() {
        $request = request();
        $client = service('curlrequest');

        try {
            $id = $request->getGet('id');

            $getAPI = $client->request("GET", getenv('API_HOST')."/api/finance/eps/supplier/$id", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res = json_decode($getAPI->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
            array('label' => 'Eps', 'url' => '', 'active' => true)
        );

        echo view('admin/Finance/Eps/supplier/update', $response);
    }

    public function update() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getPost('id');
        $dataPost['status'] = $request->getPost('status');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/eps/supplier/update", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/eps');
    }

    public function delete() {
        $request = request();
        $client = service('curlrequest');

        try {
            $id = $request->getGet('id');
            $posts_data = $client->request("DELETE", getenv('API_HOST')."/api/finance/eps/supplier/delete/$id");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/eps');
    }
}

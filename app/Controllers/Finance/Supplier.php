<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function GetAll()
	{
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'da';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/supplier/$pathDB", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier '.CheckDB($pathDB), 'url' => '', 'active' => false),
        );
        echo view('admin/finance/supplier/view', $response);
	}

    public function Update() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        $pathDB = 'da';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$pathDB/update", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier?db='.$pathDB);
    }

    public function Add() {
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
        );
        echo view('admin/finance/supplier/create', $response);
    }

    public function Create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('name');
        $dataPost['status'] = $request->getPost('status');

        $pathDB = 'da';
        if($request->getPost('db')) {
            $pathDB = $request->getPost('db');
        };

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$pathDB/create", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier?db='.$pathDB);
    }

    public function Edit($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        try {
            $getAPI = $client->request("GET", getenv('API_HOST')."/supplier/$db_conn/$id", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getAPI->getStatusCode());
            $res = json_decode($getAPI->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
        );

        echo view('admin/finance/Amz/supplier/update', $response);
    }

    public function Delete($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        try {
            $posts_data = $client->request("DELETE", getenv('API_HOST')."/supplier/$db_conn/$id", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/amz');
    }
}
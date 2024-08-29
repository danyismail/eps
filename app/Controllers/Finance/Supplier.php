<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class Supplier extends BaseController
{
    public function GetAll()
	{
        $request = request();
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/supplier/de", [
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
            array('label' => 'Supplier', 'url' => '', 'active' => false),
        );
        echo view('admin/finance/supplier/view', $response);
	}

    public function Update() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = (int)$request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        $pathDB = 'de';
        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$pathDB/update", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "json" => $dataPost
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier');
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

        $pathDB = 'de';

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$pathDB/create", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "json" => $dataPost
            ]);
            print_r($posts_data->getBody());
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier');
    }

}
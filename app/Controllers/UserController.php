<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class UserController extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $client = service('curlrequest');

        try {
            $getData = $client->request("GET", getenv('API_HOST')."/user/list", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res = json_decode($getData->getBody(), true);
            $response['data'] = $res['data'] ?? array();

        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'User ', 'url' => '', 'active' => true)
        );

        echo view('admin/user/user_view', $response);
	}

    public function Create() {
        $request = request();
        $client = service('curlrequest');

        $dataform = array();
        if($request->getPost('username')) {
            $dataform['username'] = $request->getPost('username');
        }

        if($request->getPost('email')) {
            $dataform['email'] = $request->getPost('email');
        }

        if($request->getPost('role')) {
            $dataform['role'] = $request->getPost('role');
        }

        if($request->getPost('password')) {
            $dataform['password'] = $request->getPost('password');
        }

        try {
            $getData = $client->request("POST", getenv('API_HOST')."/user/create", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "json" => $dataform
            ]);

            $res = json_decode($getData->getBody(), true);
            $response['data'] = $res['data'] ?? array();

        } catch (\Exception $e) {
            $response['data'] = array();
        }

        return redirect()->to('/user');

    }

    public function Delete() {
        $request = request();
        $client = service('curlrequest');

        try {
            $getData = $client->request("DELETE", getenv('API_HOST')."/user/delete", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "query" => $request->getGet("id")
            ]);

            $res = json_decode($getData->getBody(), true);
            $response['data'] = $res['data'] ?? array();

        } catch (\Exception $e) {
            $response['data'] = array();
        }

        return redirect()->to('/user');
    }


}
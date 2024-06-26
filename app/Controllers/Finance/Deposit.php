<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;
use CodeIgniter\Debug\Timer;

class Deposit extends BaseController
{
    public function Add() {

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Create', 'url' => '#!', 'active' => true)
        );
        echo view('admin/finance/deposit/create', $response);
    }

    public function DirectPaymentForm() {

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Direct Payment', 'url' => '#!', 'active' => true)
        );
        echo view('admin/finance/deposit/direct', $response);
    }

    public function Create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');
        $pathDB = $request->getPost('db');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/deposit/$pathDB", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
                "form_params" => $dataPost
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/cek_pending');
    }

    public function CreateDirect() {
        $timer = new Timer();

        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = 'DIRECT PAYMENT';
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');
        $dataPost['payment_purpose'] = $request->getPost('payment_purpose');
        $dataPost['database'] = $request->getPost('database');
        $database = $dataPost['database'];

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/deposit/$database", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
                "form_params" => $dataPost
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
        
        return redirect()->to('/deposit/cek_pending?db='.$database);
    }

    public function CheckPending() {
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'da';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };
        $response['pathDB'] = $pathDB;

        try {
            $getDataCreated = $client->request("GET", getenv('API_HOST')."/deposit/$pathDB/created", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getDataCreated->getStatusCode());
            $res = json_decode($getDataCreated->getBody(), true);
            $response['dataCreated'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['dataCreated'] = array();
        }

        try {
            $getDataUpload = $client->request("GET", getenv('API_HOST')."/deposit/$pathDB/uploaded", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getDataUpload->getStatusCode());
            $res2 = json_decode($getDataUpload->getBody(), true);
            $response['dataUpload'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            $response['dataUpload'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending '. CheckDB($pathDB), 'url' => '', 'active' => true)
        );
        echo view('admin/finance/deposit/cek_pending', $response);
    }

    public function DataTransaksi() {
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'da';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };
        $response['pathDB'] = $pathDB;

        try {
            $params = "";
            if($request->getGet('startDt') && $request->getGet('startDt')) {
                $params = "?startDt=".$request->getGet('startDt')."&endDt=".$request->getGet('endDt');
            }
            $getData = $client->request("GET", getenv('API_HOST')."/deposit/$pathDB/done".$params, [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            CheckStatusResponAPI($getData->getStatusCode());
            $result = json_decode($getData->getBody(), true);
            $response['data'] = $result['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Data Transaksi '. CheckDB($pathDB), 'url' => '', 'active' => true)
        );
        echo view('admin/finance/deposit/transaksi', $response);
    }

    public function GetDepositById(string $db_conn,int $id) {
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/$id", [
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
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => false),
            array('label' => 'Upload Image '. CheckDB($db_conn), 'url' => '', 'active' => true)
        );
        echo view('admin/finance/deposit/form_upload', $response);
    }

    public function CreateUpload($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getPost('id');
        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        $file = $this->request->getFile('file');
        $tempfile = $file->getTempName();
        $filename = $file->getName();
        $type = $file->getClientMimeType();

        // Create a CURLFile object
        $dataPost['image'] = curl_file_create($tempfile,$type,$filename);

        try {
            $response = $client->request("POST",getenv('API_HOST')."/deposit/$db_conn/update/$id", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
                'debug' => true,'multipart' => $dataPost
            ]);
            CheckStatusResponAPI($response->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/cek_pending?db='.$db_conn);
    }

    public function AddReply(string $db_conn,int $id) {
        $client = service('curlrequest');

        $response['pathDB'] = $db_conn;

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/$id", [
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
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => false),
            array('label' => 'Reply '.CheckDB($db_conn), 'url' => '', 'active' => true)
        );
        echo view('admin/finance/deposit/form_reply', $response);
    }

    public function ActionReply($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getPost('id');
        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['reply'] = $request->getPost('reply');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        try {
            $response = $client->post(getenv('API_HOST')."/deposit/$db_conn/update/$id", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ],
                'debug' => true,'multipart' => $dataPost
            ]);
            CheckStatusResponAPI($response->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/cek_pending?db='.$db_conn);
    }

    public function DeleteDeposit(string $db_conn,int $id) {
        $client = service('curlrequest');

        try {
            $posts_data = $client->get(getenv('API_HOST')."/deposit/$db_conn/delete/$id", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token']
                ]
            ]);
            CheckStatusResponAPI($posts_data->getStatusCode());
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/cancel');
    }

    public function Cancel() {
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'da';
        if($request->getGet('db')) {
            $pathDB = $request->getGet('db');
        };
        $response['pathDB'] = $pathDB;
        $response['data'] = array();

        if($request->getGet('date')) {
            try {
                $params = "?dt=".urlencode(utf8_encode($request->getGet('date')));
                $getData = $client->request("GET", getenv('API_HOST')."/deposit/$pathDB/all".$params, [
                    "headers" => [
                        "Authorization" => "Bearer ".$this->session->get('data')['token'],
                        "Accept" => "application/json",
                        "Content-Type" => "application/x-www-form-urlencoded"
                    ],
                ]);
                CheckStatusResponAPI($getData->getStatusCode());
                $res = json_decode($getData->getBody(), true);
                $response['data'] = $res['data'] ?? array();
            } catch (\Exception $e) {
                $response['data'] = array();
            }
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cancel', 'url' => '', 'active' => true)
        );

        echo view('admin/finance/deposit/cancel', $response);
    }

    public function getSupplier() {
        $request = request();
        $client = service('curlrequest');

        $pathDB = 'da';
        if($request->getPost('db')) {
            $pathDB = $request->getPost('db');
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
            $response['supplier'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['supplier'] = array();
        }
        echo json_encode($response);
    }

}
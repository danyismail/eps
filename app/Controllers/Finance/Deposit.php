<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;

class Deposit extends BaseController
{
    public function Add($db_conn) {
        $client = service('curlrequest');
        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/supplier/$db_conn", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res = json_decode($posts_data->getBody(), true);
            $response['supplier'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['supplier'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Create', 'url' => '#!', 'active' => true)
        );
        echo view('admin/Finance/deposit/create', $response);
    }

    public function Create($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/deposit/$db_conn", [
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/'.$db_conn.'/cek_pending');
    }

    public function CheckPending($db_conn) {
        $client = service('curlrequest');
        try {
            $getDataCreated = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/created", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res = json_decode($getDataCreated->getBody(), true);
            $response['dataCreated'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['dataCreated'] = array();
        }

        try {
            $getDataUpload = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/uploaded", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res2 = json_decode($getDataUpload->getBody(), true);
            $response['dataUpload'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            $response['dataUpload'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/deposit/cekPending', $response);
    }

    public function DataTransaksi($db_conn) {
        $request = request();
        $client = service('curlrequest');

        try {
            $params = "";
            if($request->getGet('startDt') && $request->getGet('startDt')) {
                $params = "?startDt=".$request->getGet('startDt')."&endDt=".$request->getGet('endDt');
            }
            $getData = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/done".$params, [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);

            $res2 = json_decode($getData->getBody(), true);
            $response['data'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            // exit($e->getMessage());
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Amazon', 'url' => '#!', 'active' => false),
            array('label' => 'Data Transaksi', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/deposit/transaksi', $response);
    }

    public function GetDepositById(string $db_conn,int $id) {
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/$id", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            $res = json_decode($posts_data->getBody(), true);
            $response['data'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['data'] = array();
        }

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => false),
            array('label' => 'Upload Image', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/deposit/formUpload', $response);
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
                'debug' => true,'multipart' => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to("/deposit/$db_conn/cek_pending");
    }

    public function AddReply(string $db_conn,int $id) {
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/$id", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
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
            array('label' => 'Reply', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/deposit/formReply', $response);
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
                'debug' => true,'multipart' => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/'.$db_conn.'/cek_pending');
    }

    public function DeleteDeposit(string $db_conn,int $id) {
        $client = service('curlrequest');

        try {
            $posts_data = $client->delete(getenv('API_HOST')."/deposit/$db_conn/$id");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/deposit/'.$db_conn.'/cancel');
    }

    public function Cancel($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $response['data'] = array();

        if($request->getGet('date')) {
            try {
                $params = "?dt=".urlencode(utf8_encode($request->getGet('date')));
                $getData = $client->request("GET", getenv('API_HOST')."/deposit/$db_conn/all".$params, [
                    "headers" => [
                        "Accept" => "application/json",
                        "Content-Type" => "application/x-www-form-urlencoded"
                    ],
                ]);
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

        echo view('admin/Finance/deposit/cancel', $response);
    }

}

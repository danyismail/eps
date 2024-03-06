<?php

namespace App\Controllers\Finance\Eps;
use App\Controllers\BaseController;

class Deposit extends BaseController
{
    public function add() {
        $client = service('curlrequest');
        $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/amz/supplier", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['supplier'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Eps', 'url' => '#!', 'active' => false),
            array('label' => 'Create', 'url' => '#!', 'active' => true)
        );
        echo view('admin/Finance/Eps/Deposit/create', $response);
    }

    public function create() {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        $posts_data = $client->request("POST", getenv('API_HOST')."/api/finance/e/deposit", [
            "form_params" => $dataPost
		]);
        return redirect()->to('/finance/deposit/eps/cek_pending');
    }

    public function Checkpending() {
        $client = service('curlrequest');
        $getDataCreated = $client->request("GET", getenv('API_HOST')."/api/finance/e/deposit/created", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $getDataUpload = $client->request("GET", getenv('API_HOST')."/api/finance/e/deposit/uploaded", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDataCreated->getBody(), true);
        $response['dataCreated'] = $res['data'] ?? array();

        $res2 = json_decode($getDataUpload->getBody(), true);
        $response['dataUpload'] = $res2['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Eps', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => true)
        );

        echo view('admin/Finance/Eps/Deposit/cekPending', $response);
    }

    public function DataTransaksi() {
        $client = service('curlrequest');
        $getData = $client->request("GET", getenv('API_HOST')."/api/finance/e/deposit/done", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res2 = json_decode($getData->getBody(), true);
        $response['data'] = $res2['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Eps', 'url' => '#!', 'active' => false),
            array('label' => 'Data Transaksi', 'url' => '', 'active' => true)
        );

        echo view('admin/Finance/Eps/Deposit/transaksi', $response);
    }

    public function add_image(int $id) {
        $client = service('curlrequest');
        $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/e/deposit/$id", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Eps', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => false),
            array('label' => 'Upload Image', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Eps/Deposit/formUpload', $response);
    }

    public function create_upload() {
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

        $response = $client->post(getenv('API_HOST')."/api/finance/e/deposit/$id", [
            'debug' => true,'multipart' => $dataPost
		]);

        return redirect()->to('/finance/deposit/eps/cek_pending');
    }

    public function add_reply(int $id) {
        $client = service('curlrequest');
        $posts_data = $client->request("GET", getenv('API_HOST')."/api/finance/e/deposit/$id", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($posts_data->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '#!', 'active' => false),
            array('label' => 'Deposit', 'url' => '#!', 'active' => false),
            array('label' => 'Eps', 'url' => '#!', 'active' => false),
            array('label' => 'Cek Pending', 'url' => '', 'active' => false),
            array('label' => 'Reply', 'url' => '', 'active' => true)
        );
        echo view('admin/Finance/Eps/Deposit/formReply', $response);
    }

    public function action_reply() {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getPost('id');
        $dataPost['name'] = $request->getPost('pic');
        $dataPost['supplier'] = $request->getPost('supplier');
        $dataPost['amount'] = $request->getPost('nominal_depo');
        $dataPost['origin_account'] = $request->getPost('origin');
        $dataPost['reply'] = $request->getPost('reply');
        $dataPost['destination_account'] = $request->getPost('rekening_tujuan');

        $response = $client->post(getenv('API_HOST')."/api/finance/e/deposit/$id", [
            'debug' => true,'multipart' => $dataPost
		]);

        return redirect()->to('/finance/deposit/eps/cek_pending');
    }

}

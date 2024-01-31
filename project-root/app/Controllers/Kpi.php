<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Kpi extends BaseController
{

    use ResponseTrait;
    public function index()
	{
        $data = array(
            'page' => 1,
            'view' => 10
        );

        $body = json_encode($data);
        $response = $this->perform_http_request('POST', 'http://36.88.42.95:1523/api/eps/getKpis', $body);
        // return $this->response->setJSON($response['result']);
        // $list = json_decode($response['result'], true);
        // return $this->response->setJSON($response);
        $data = json_decode($response);
        $total = $data->total;
        $dataArray = $data->data;
        // $dataArray['hasil'];
    // echo $dataArray;
        echo view('admin/dashboard/kpi_view', ['list'=>$dataArray]);
	}

    function perform_http_request($method, $url, $data = true) {
        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);

                break;
            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //If SSL Certificate Not Available, for example, I am calling from http://localhost URL

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

}

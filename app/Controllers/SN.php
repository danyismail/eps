<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class SN extends BaseController
{
    use ResponseTrait;
    public function CheckSN($db_conn)
	{
        $request = request();
        $client = service('curlrequest');

        try {
            $getNullableSN = $client->request("GET", getenv('API_HOST')."/sn/null/$db_conn", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getNullableSN->getStatusCode());
            $res = json_decode($getNullableSN->getBody(), true);
            $response['nullableSN'] = $res['data'] ?? array();
        } catch (\Exception $e) {
            $response['nullableSN'] = array();
            // dd($response['nullSN']);
        }

        try {
            $getDuplicateSN = $client->request("GET", getenv('API_HOST')."/sn/duplicate/$db_conn", [
                "headers" => [
                    "Authorization" => "Bearer ".$this->session->get('data')['token'],
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
            ]);
            CheckStatusResponAPI($getDuplicateSN->getStatusCode());
            $res2 = json_decode($getDuplicateSN->getBody(), true);
            $response['duplicateSN'] = $res2['data'] ?? array();
        } catch (\Exception $e) {
            $response['duplicateSN'] = array();
        }
        $useDB = CheckDB($db_conn);
        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Check SN', 'url' => '', 'active' => false),
            array('label' =>  $useDB, 'url' => '', 'active' => true)
        );
        echo view('admin/dashboard/check_sn', $response);
	}
}
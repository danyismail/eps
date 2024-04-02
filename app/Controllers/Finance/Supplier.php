<?php

namespace App\Controllers\Finance;
use App\Controllers\BaseController;


/*
supplier := v1.Group("/supplier")
	supplier.GET("/:e", h.GetSuppliers)
	supplier.GET("/:e/active", h.GetActiveSuppliers)
	supplier.GET("/:e/balance", h.GetSupplierBalance)
	supplier.GET("/:e/:id", h.GetSupplierById)
	supplier.POST("/:e/create", h.CreateSupplier)
	supplier.POST("/:e/update", h.UpdateSupplier)
	supplier.DELETE("/:e/delete/:id", h.DeleteSupplier)
 */

class Supplier extends BaseController
{
    public function GetAll($db_conn)
	{
        $request = request();
        $client = service('curlrequest');

        try {
            $posts_data = $client->request("GET", getenv('API_HOST')."/supplier/$db_conn", [
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
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
        );
        echo view('admin/finance/supplier/view', $response);
	}

    public function Update($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $dataPost['id'] = $request->getGet('id');
        $dataPost['status'] = $request->getGet('q');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$db_conn/update", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier/'.$db_conn.'/list');
    }

    public function Add($db_conn) {
        $response['breadcrumb'] = array(
            array('label' => 'Finance', 'url' => '', 'active' => false),
            array('label' => 'Supplier', 'url' => '', 'active' => false),
        );
        echo view('admin/finance/supplier/create', $response);
    }

    public function Create($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $dataPost['name'] = $request->getPost('name');
        $dataPost['status'] = $request->getPost('status');

        try {
            $posts_data = $client->request("POST", getenv('API_HOST')."/supplier/$db_conn/create", [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ],
                "form_params" => $dataPost
            ]);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('supplier/'.$db_conn.'/list');
    }

    public function Edit($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        try {
            $getAPI = $client->request("GET", getenv('API_HOST')."/supplier/$db_conn/$id", [
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
        );

        echo view('admin/finance/Amz/supplier/update', $response);
    }

    public function Delete($db_conn) {
        $request = request();
        $client = service('curlrequest');

        $id = $request->getGet('id');

        try {
            $posts_data = $client->request("DELETE", getenv('API_HOST')."/supplier/$db_conn/$id");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return redirect()->to('/finance/supplier/amz');
    }
}
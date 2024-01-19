<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
	{{
    $db = \Config\Database::connect();
    $query   = $db->query('SELECT * FROM reporting');
    $results['data'] = $query->getResultArray();
    echo view('admin/dashboard/index', $results);
	}}



    public function productReport()
	{
    $db = \Config\Database::connect();
    $query   = $db->query('SELECT * FROM v_report_by_provider_product_type');
    $results['data'] = $query->getResultArray();
    echo view('admin/dashboard/dashboard', $results);
	}

}

<?php

namespace App\Controllers;
use App\Models\ProviderModel; 
use CodeIgniter\API\ResponseTrait;

class ProviderController extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $model = new ProviderModel();
        $results['providers'] = $model->orderBy('name', 'ASC')->findAll();
        return $this->respond($results);
        // echo view('admin/dashboard/index', $results);
	}

}

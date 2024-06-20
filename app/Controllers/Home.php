<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Home extends BaseController
{
    public function index()
	{
        return view('admin/dashboard/welcome_view');
    }

}

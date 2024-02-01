<?php

namespace App\Controllers;
use App\Models\CategoriesModel;

class Test extends BaseController
{
    public function index(): string
    {
        $this->db2 = db_connect("kpi");
        $query = $this->db2->query("SELECT * FROM v_kpi");
        echo "<pre>"; print_r($query->getResult());
        return view('welcome_message');
    }
}

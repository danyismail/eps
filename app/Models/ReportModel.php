<?php namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = "v_reporting";
    protected $allowedFields = [
        'id',
        'transaction_id',
        'entry_date',
        'buying_price',
        'selling_price',
        'reseller_name',
        'module',
        'margin',
        'loss',
        'product_type',
        'provider',
        'loss',
        'format_date',
    ];
}
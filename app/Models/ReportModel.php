<?php namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    /**
     * table name
     */
    protected $table = "reporting";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'id',
        'transaction_id',
        'entry_date',
        'provider',
        'margin'
    ];
}
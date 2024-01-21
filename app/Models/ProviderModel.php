<?php namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    /**
     * table name
     */
    protected $table = "providers";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'id',
        'code',
        'name',
    ];
}


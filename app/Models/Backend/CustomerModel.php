<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer';
    protected $primaryKey       = 'id_customer';
    protected $allowedFields = [
        'id_customer',
        'id_customer_api',
        'service_code_customer',
        'billcode_customer',
        'company_customer',
        'property_customer',
        'site_customer',
        'status_customer',
        'tech_name_customer',
        'tech_email_customer',
        'tech_phone_customer',
        'mark_customer',
        'notes_customer',
        'datetime_customer'
    ];


    // protected $DBGroup          = 'default';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}

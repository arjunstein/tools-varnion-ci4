<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tbl_auth';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password', 'privilege', 'status', 'LoggedIn'];
}

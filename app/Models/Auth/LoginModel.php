<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username','password', 'privilege', 'status', 'LoggedIn'];
}

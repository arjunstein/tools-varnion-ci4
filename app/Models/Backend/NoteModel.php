<?php

namespace App\Models\Backend;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table      = 'tbl_catatan';
    protected $primaryKey = 'id';
    // *** TODO ***
    // protected $allowedFields = ['id', 'username', 'password', 'privilege', 'status', 'LoggedIn'];
}

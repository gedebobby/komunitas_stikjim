<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model 
{
    protected $table      = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'nim', 'id_angkatan', 'id_komunitas', 'no_ponsel', 'email', 'password'];

    
}
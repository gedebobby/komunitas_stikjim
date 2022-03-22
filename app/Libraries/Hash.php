<?php 

namespace App\Libraries;

class Hash  
{
    public static function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    public static function cek_password($inputanPassword, $db_password)
    {
        if (password_verify($inputanPassword, $db_password)) {
            return true;
        } else {
            return false;
        }
    }
}




?>
<?php

namespace App\Model;

use App\Database\DB;
use mysqli;

class User extends ModelDB
{

    private $table = "users";
    public $userId;
    public $name;



    function register($fname, $lname, $email, $password){
    $db = new DB();
    $query = "INSERT INTO $this->table (fname, lname, email, password) VALUE ('$fname', '$lname', '$email', '$password')";
    $this->insert($query);   

    }

    function login($email, $password)
    {
        $db = new DB();
        $query = "SELECT * FROM " . $this->table . " WHERE email = '$email' && password = '$password'";
        $data = $db->select($query, true);
        if (mysqli_num_rows($db->result) > 0 ) {
            $this->userId = $data["userId"];
            $this->name = $data["name"];
            return true;
        } else {
            return false;
            
    }
}
}

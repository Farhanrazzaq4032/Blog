<?php
namespace App\Controller;

class Auth{

    function auth(){
        if (isset($_SESSION["user"])) {
            return true;
        }else {
            return false;
        }
    }
  
}
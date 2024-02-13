<?php
namespace App\Middleware;

class Auth{

    function handle(){
        if (!isset($_SESSION["user"])) {
            redirect("login");
            exit();
        }


    }
  
}
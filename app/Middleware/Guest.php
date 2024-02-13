<?php
namespace App\Middleware;

class Guest{

    function handle(){
        if (isset($_SESSION["user"])) {
            redirect("dashboard");
            exit();
        }
    }
  
}
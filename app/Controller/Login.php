<?php

namespace App\Controller;

use App\Model\User;
use App\Controller\Auth;

class Login
{

    function index(){
        view("view", "login");

    }

    function loginBtn()
    {
        $email = cleanString($_POST["email"]);
        $password = get_hashPass(cleanString($_POST["password"]));
        if ($email !== "" && $password !== "") {
            $user = new User();
            if ($user->login($email, $password)) {
                $_SESSION["user"] = $user->userId;
                $_SESSION["name"] = $user->name;
                setMsg("Login Successfull");
                redirect("dashboard");
            } else {
                setMsg("Please Insert Correct Information");
                redirect("login");
            }
        } else {
            setMsg("Please Enter the All Field");
            redirect("login");
        }
    }
}

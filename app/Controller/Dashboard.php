<?php

namespace App\Controller;

use App\Model\Post;

class Dashboard
{
    public $postData = array();

    public function __construct(){
        $this->postData();
    }
    function index()
    {
        view("view", "dashboard");
    }


    function logout()
    {

        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            redirect("login");
        }
    }

    function postData(){
        $post = new Post();
        $this->postData = $post->getPost();
    }
}

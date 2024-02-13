<?php
namespace App\Controller;

use App\Model\User;

class Register {

    function index(){
        view('view','register_blog');
    }

    function userRegister(){
       
        if(isset($_POST['regBtn'])){
            // die('farhan');
            $user = new User();
            $fname = cleanString($_POST['fname']);
            $lname = cleanString($_POST['lname']);
            $email = cleanString($_POST['email']);
            $password = cleanString($_POST['pass']);
            $confPassword = cleanString($_POST['passconf']);
            if($fname !== ''&& $lname !== '' && $email !== ''&& $password !== ''&& $confPassword !== ''){
                if($password == $confPassword){
                    $password = get_hashPass($password);
                    $user->register($fname, $lname, $email, $password);
                    setMsg('User Successfull Registerd');
                    redirect('login');
                }else{
                    setMsg('Password not Same');
                redirect('register');
                }
            }else{
                setMsg('Plese Fill all the field');
                redirect('register');
            }

        }
    }

}


?>
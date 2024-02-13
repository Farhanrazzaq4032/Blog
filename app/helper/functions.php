<?php
//this function is used include view
function view($directory, $view)
{
  $path = "resources/" . $directory . "/" . $view . ".php";
  if (file_exists($path)) {
    include $path;
  } else
    echo "File not Exist";
}

//redirect path
function redirect($path)
{
  header("location: $path");
  exit;
}

//clean input field 
function cleanString($string)
{
  $string = trim($string);
  $string = addslashes($string);
  $string = htmlspecialchars($string);
  return $string;
}

//Set Flash Message
function setMsg($msg)
{
  $_SESSION["msg"] = $msg;
}
//Get Flash Message
function getMsg($key)
{
  if (isset($_SESSION[$key])) {
    $note = $_SESSION["msg"];
    unset($_SESSION["msg"]);
    return $note;
  } else
    return "";
}

//password hash
function get_hashPass($pass)
{
  $hashPass = SALT . $pass . SALT;
  $hashPass = md5($hashPass);
  return $hashPass;
}


<?php
session_start();
//Directory Path
define("BASE_PATH" , __DIR__."/");

//Autoload classess and Files 
require BASE_PATH.'vendor/autoload.php';

//use Required Files
use App\Services\Router;

//Header
view("tamp","head");
//Router Handler
$routes = new Router();
$routes->routeHandler();

//Footer
view("tamp","footer");

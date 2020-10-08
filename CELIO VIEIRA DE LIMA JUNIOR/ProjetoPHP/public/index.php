<?php
require_once __DIR__."./../autoload.php";

use ProjetoPHP\src\model\vo\UserVO;
use ProjetoPHP\src\controller\UserController;
use ProjetoPHP\src\controller\AuthController;
use ProjetoPHP\src\controller\TaskController;
session_start();

$authController = new AuthController();
$taskController = new TaskController();
$userController = new UserController();

$path = "/";
if (isset($_SERVER["PATH_INFO"])){
    $path = $_SERVER["PATH_INFO"];
}

//$path = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];


if (isset($_SESSION["warn_message"])){
    echo "<script>alert('{$_SESSION["warn_message"]}')</script>";
    unset($_SESSION["warn_message"]);
}

switch ($path) {
    case "/signup":
        if($method == "POST" and !isset($_SESSION["user"])){
            $authController->validateUser();
        }elseif(!isset($_SESSION["user"])){
            $authController->SignupPage();
        }else{
            header("Location: /user-page");
        }
        break;

    case '/login':
        if($method == "POST" and !isset($_SESSION["user"])){
            $authController->checkUserAndPasswordLogin();
        }elseif($method == "GET" and !isset($_SESSION["user"])){
            $authController->login();
        }else{
            header("Location: /user-page");
        }
        break;
    
    case "/logout":
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
            header("Location: /login");
        }else{
            header("Location: /");
        }
        break;
    
    case "/about":
        $authController->aboutPage();
        break;
    
    case "/user-page":
        if(isset($_SESSION["user"])){
            $userController->view();
        }else{
            header("Location: /");
        }
        break;

    case "/delete-user":
        if ($method=="POST"){
            $userController->delete();
        }

    case "/tasks":
        if (isset($_SESSION["user"]) and isset($_GET["search"])){
            if($_GET["search"] != ""){
                $taskController->listSearch();
            }else{
                header("Location: /tasks");
            }
        }elseif (isset($_SESSION["user"]) and isset($_SERVER["QUERY_STRING"])){
            $taskController->edit();
        }elseif (isset($_SESSION["user"])){
            $taskController->index();
        }else{
            header("Location: /");
        }
        break;

    case "/new-task":
        if(isset($_SESSION["user"]) and $method=="GET"){
            $taskController->create();
        }
        break;

    case "/update-task":
        if (isset($_SESSION["user"]) and $method=="POST"){
            $taskController->update();
            header("Location: /tasks");
        }
        break;

    case "/save-task":
        if (isset($_SESSION["user"]) and $method=="POST"){
            $taskController->store();
            header("Location: /tasks");
        }
        break;

    case "/delete-task":
        if(isset($_SESSION["user"]) and $method=="POST" and isset($_SERVER["QUERY_STRING"])){
            $taskController->delete();
        }
        break;

    case "/complete-task":
        if(isset($_SESSION["user"]) and $method=="POST" and isset($_SERVER["QUERY_STRING"])){
            $taskController->completeTask();
        }
        break;

    case "/delete-all-tasks":
        if (isset($_SESSION["user"]) and $method=="POST"){
            $taskController->deleteAllFromUser();
            header("Location: /tasks");
        }
        break;

    case "/":
        $authController->homePage();
        break;

    default:
        header("Location: /");
        break;
}
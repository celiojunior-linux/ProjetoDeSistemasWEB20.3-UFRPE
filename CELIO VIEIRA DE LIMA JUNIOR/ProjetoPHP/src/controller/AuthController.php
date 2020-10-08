<?php

namespace ProjetoPHP\src\controller;
use ProjetoPHP\src\model\dao\UserDAO;
use ProjetoPHP\src\model\vo\UserVO;
use ProjetoPHP\src\model\dao\TaskDAO;

class AuthController{

    public function login(){
        require "./../src/view/auth/login.php";
    }
    
    public function homePage(){
        require "./../src/view/common/home_page.php";
    }
    
    public function aboutPage(){
        require "./../src/view/common/about_page.php";
    }

    public function signupPage(){
        require "./../src/view/auth/signup.php";
    }

    public function validateUser(){
        $user = new UserVO($_POST["name"], $_POST["email"], $_POST["password"]);
        $controller = new UserDAO();
        $controller->create($user);
        header("Location: /signup");
    }

    public function checkUserAndPasswordLogin(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $userDao = new UserDAO();
        $userReturn = $userDao->verifyUserAndPassword($email, $password);
        if ($userReturn != null){
            $_SESSION['user'] = $userReturn;
            header("Location: /user-page");
        }else{
            $_SESSION['warn_message'] = "User email or/and password incorrect(s).";
            header("Location: /login");
        }
    }

    public function logout(){
        session_abort();
    }
}
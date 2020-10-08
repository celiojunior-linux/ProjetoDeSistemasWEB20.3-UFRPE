<?php

namespace ProjetoPHP\src\controller;
use ProjetoPHP\src\model\dao\TaskDAO;
use ProjetoPHP\src\model\dao\UserDAO;

class UserController implements IController{

    function index(){

    }

    function view(){
        require "./../src/view/user/user_page.php";
    }
    
    function create(){
        $task = new TaskDAO();
        $task->create();
    }
    
    function edit(){

    }
    
    function store(){

    }

    function update(){

    }
    
    function delete(){
        $user = new UserDAO();
        $task = new TaskDAO();
        $task->deleteAllFromUser($_SESSION["user"]->getId());
        $user->delete($_SESSION["user"]->getId());

    }
}
<?php

namespace ProjetoPHP\src\controller;
use ProjetoPHP\src\model\dao\TaskDAO;
use ProjetoPHP\src\model\vo\TaskVO;

class TaskController implements IController{

    function index(){
        $this->listAll();
        require "./../src/view/task/task_list.php";
    }

    function listAll(){
        $task = new TaskDAO();
        $_SESSION["tasks"] = $task->findAll();
    }

    function listSearch(){
        $task = new TaskDAO();
        $search = strtoupper($_GET["search"]);
        $all = $task->findAll();
        $results = [];
        foreach($all as $item){
            $add = false;
            $title = strtoupper($item->getTitle());
            $content = strtoupper($item->getDesc());
            $createdAt = strtoupper($item->getCreatedAt());
            $status = strtoupper($item->getStateConverted());
            $deadline = strtoupper($item->getDeadLine());
            if(strpos($title,$search) !==false or strpos($search, $title) !==false){
                global $add;
                $add=true;
            }elseif(strpos($content, $search) !== false or strpos($search, $content) !== false){
                global $add;
                $add=true;
            }elseif(strpos($createdAt, $search) !== false or strpos($search, $createdAt) !== false){
                global $add;
                $add=true;
            }elseif(strpos($status, $search) !== false or strpos($search, $status) !== false) {
                global $add;
                $add = true;
            }elseif(strpos($deadline, $search) !== false or strpos($search, $deadline) !== false) {
                global $add;
                $add = true;
            }
            if($add){
                array_push($results, $item);
            }

        }
        $_SESSION["tasks"] = $results;
        require "./../src/view/task/task_list.php";

    }

    function view(){
        // Also used in edit
    }
    
    function create(){
        require "./../src/view/task/task_new.php";
    }
    
    function edit(){
        $params = explode("=",$_SERVER["QUERY_STRING"]);
        $var = $params[0];
        $$var = $params[1];
        if (isset($id) and $id!="" and isset($_SESSION["tasks"][$id])){
            $this->listAll();
            $_SESSION["current-task"] = $_SESSION["tasks"][$id];
            require "./../src/view/task/task_edit.php";
        }else{
            header("Location: /tasks");
        }
    }
    
    function store(){
        $task = new TaskDAO();
        global $task_id;
        $task_id = 0;
        $created_at = null;
        if(isset($_SESSION["current-task"])){
            global $task_id, $created_at;
            $task_id = $_SESSION["current-task"]->getId();
            $created_at = $_SESSION["current-task"]->getCreatedAt();
        }
        $newTask = new TaskVO($_POST["title"], $_POST["description"], $_POST["date"], $_POST["status"], $task_id , $_SESSION["user"]->getId(), $created_at);
        $task->create($newTask);
    }

    function finish($id){
    }

    function deleteAllFromUser(){
        $task = new TaskDAO();
        $task->delete($_SESSION["user"]->getId());
        $_SESSION["warn_message"] = "All tasks from this user are now deleted";
    }

    function update(){
        $task = new TaskDAO();
        $newTask = new TaskVO($_POST["title"], $_POST["description"], $_POST["date"], $_POST["status"],$_SESSION["current-task"]->getId(), $_SESSION["current-task"]->getUserId(),$_SESSION["current-task"]->getCreatedAt());
        $task->update($_SESSION["current-task"]->getId(),$newTask);
    }

    function completeTask(){
        $params = explode("=",$_SERVER["QUERY_STRING"]);
        $var = $params[0];
        $$var = $params[1];
        if (isset($id) and $id!=""){
            $task = new TaskDAO();
            $task->complete($id);
        }
        header("Location: /tasks");
    }

    function delete(){
        $params = explode("=",$_SERVER["QUERY_STRING"]);
        $var = $params[0];
        $$var = $params[1];
        if (isset($id) and $id!=""){
            $task = new TaskDAO();
            $task->deleteSingle($id);
            $_SESSION["warn_message"] = "Task deleted successfuly";
        }
        header("Location: /tasks");
    }
}
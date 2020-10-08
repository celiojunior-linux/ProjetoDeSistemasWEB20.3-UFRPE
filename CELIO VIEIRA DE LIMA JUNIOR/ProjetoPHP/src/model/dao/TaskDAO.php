<?php

namespace ProjetoPHP\src\model\dao;
use ProjetoPHP\src\model\dao\interfacedao\ITaskDAO;
use ProjetoPHP\src\model\vo\TaskVO;

require "connect_database.php";

class TaskDAO implements ITaskDAO{

    public $table = "task";

    public function findAll(){
        $link = getConnection();
        $list = [];
        $query = "select *  from {$this->table} where user_id='{$_SESSION["user"]->getId()}'";
        $tempId = 0;
        if($result = $link->query($query)){
            while ($row = $result->fetch_row()){
                $obj = new TaskVO($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $tempId);
                array_push($list, $obj);
                $tempId ++;
            }
        }
        $link->close();
        return $list;
    }

    public function findByDate(){

    }

    public function findByTitle($title){

    }

    public function create($task){
        $link = getConnection();
        //INSERT INTO `user` (`name`, `email`, `password`, `id`, `created_at`) VALUES ('admin', 'admin@admin.com', 'admin123', NULL, current_timestamp());
        $query = "insert into {$this->table} (title, description, deadline, task_state, id, user_id) values ('{$task->getTitle()}','{$task->getDesc()}','{$task->getDeadLine()}','{$task->getState()}', null, '{$_SESSION["user"]->getId()}')";
        $result = $link->query($query);
        $link->close();
    }
    
    public function update($id, $task){
        $link = getConnection();
        $query = "update {$this->table} set title='{$task->getTitle()}', description='{$task->getDesc()}', deadline='{$task->getDeadLine()}', task_state='{$task->getState()}' where id={$id}";
        $result = $link->query($query);
        $link->close();
        if(!$result){
            echo mysqli_error($link);
            exit(0);
        }
    }

    public function delete($id){
        $link = getConnection();
        $query = "delete from {$this->table} where user_id={$id}";
        $result = $link->query($query);
        $link->close();
        if(!$result) {
            echo mysqli_error($link);
            exit(0);
        }
    }

    public function deleteSingle($id){
        $link = getConnection();
        $query = "delete from {$this->table} where id={$id}";
        $result = $link->query($query);
        $link->close();
        if(!$result) {
            echo mysqli_error($link);
            exit(0);
        }
    }

    public function complete($id){
        $link = getConnection();
        $query = "update {$this->table} set task_state='1' where id={$id}";
        $result = $link->query($query);
        $link->close();
        if(!$result){
            echo mysqli_error($link);
            exit(0);
        }
    }

}
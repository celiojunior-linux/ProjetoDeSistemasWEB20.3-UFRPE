<?php

namespace ProjetoPHP\src\model\dao;
use ProjetoPHP\src\model\dao\interfacedao\IUserDAO;
use ProjetoPHP\src\model\vo\UserVO;

require "connect_database.php";

class UserDAO implements IUserDAO{

    public $table = "user";

    function findAll(){

    }
    
    function findByEmail($email){

    }

    function create($user){
        $link = getConnection();
        //INSERT INTO `user` (`name`, `email`, `password`, `id`, `created_at`) VALUES ('admin', 'admin@admin.com', 'admin123', NULL, current_timestamp());
        $query = "insert into {$this->table} (name, email, password) values ('{$user->getName()}','{$user->getEmail()}','{$user->getPassword()}')";
        $result = $link->query($query);
        $link->close();
        if(!$result){
            $_SESSION["warn_message"] = "User email already exists on the sistem.";
        }else{
            $_SESSION["warn_message"] = "User signed sucessfuly.";
        }
    }

    function update($email, $UserVO){

    }

    function delete($id){
        $link = getConnection();
        $query = "delete from {$this->table} where id={$id}";
        $result = $link->query($query);
        $link->close();
        if(!$result){
            echo mysqli_error();
            exit(0);
        }else{
            unset($_SESSION["user"]);
            $_SESSION["warn_message"] = "User deleted successfully.";
            header("Location: /login");
        }
    }

    function verifyUserAndPassword($email, $password){
        //$password = md5($password);
        $link = getConnection();
        $query = "select name, email, password, id, created_at  from {$this->table} where email='{$email}' and password ='{$password}'";
        if($result = $link->query($query)){
            while ($row = $result->fetch_row()){
                $link->close();
               return new UserVO($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
        }
        $link->close();
        return null;
    }
}
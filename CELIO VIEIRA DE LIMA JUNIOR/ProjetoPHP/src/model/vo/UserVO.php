<?php

namespace ProjetoPHP\src\model\vo;

class UserVO{

    private $id;
    private $name;
    private $email;
    private $password;
    private $created_at;

    public function __construct($name, $email, $password, $id=null,  $created_at=null){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
        $this->created_at = $created_at;
    }

    public function setName($newName){
        $this->name = $newName;
    }

    public function setEmail($newEmail){
        $this->email = $newEmail;
    }

    public function setPassword($newPassword){
        $this->password = $newPassword;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getId(){
        return $this->id;
    }
    public function getCreatedAt(){
        return $this->created_at;
    }
}
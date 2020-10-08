<?php

namespace ProjetoPHP\src\model\vo;

class TaskVO{


    private $title;
    private $desc;
    private $deadline;
    private $state = "0";
    private $id;
    private $userId;
    private $createdAt;
    private $tempId;

    public function __construct($title, $desc, $deadline, $state = 0, $id=null, $userId = null, $createdAt = null, $tempId = null){
        $this->title = $title;
        $this->desc = $desc;
        $this->deadline = $deadline;
        $this->state = $state;
        $this->id = $id;
        $this->userId = $userId;
        $this->tempId = $tempId;
        $this->createdAt = $createdAt;
    }

    public function setTitle($newTitle){
        $this->title = $newTitle;
    }

    public function setDesc($newDesc){
        $this->desc = $newDesc;
    }

    public function setDeadline($newDeadLine){
        $this->deadline = $newDeadLine;
    }

    public function setState($newState){
        $this->state = $newState; 
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function getState(){
        return $this->state;
    }

    public function getDeadline(){
        return $this->deadline;
    }

    public function getTempId(){
        return $this->tempId;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getStateConverted(){
        if($this->state == "0"){
            return "Ongoing";
        }else{
            return "Finished";
        }
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }
}
<?php

function getConnection(){
    $connection = new mysqli("127.0.0.1", "root", "", "database");
    if($connection->connect_errno){
        echo "Conxão falhou:  (".$connection->connect_errno.") ".mysqli_connect_error();
    }else{
        return $connection;
    }
}
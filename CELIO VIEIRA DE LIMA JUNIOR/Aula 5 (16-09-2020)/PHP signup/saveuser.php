<?php
    session_start();

    function add_user(){
        if ($_POST){
            $user = array("name" => $_POST["name"], "password" => $_POST["password"], "phone" => $_POST["phone"]);
            array_push($_SESSION["all_users"], $user);
        }
    }

    if (!isset($_SESSION["all_users"])){
        $_SESSION["all_users"] = array();
    }
    add_user();
    header("Location: ./allusers.php")
?>
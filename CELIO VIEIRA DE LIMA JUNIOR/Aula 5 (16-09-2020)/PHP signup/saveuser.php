<?php
    session_start();

    function add_user(){
        if ($_POST){
            $user = array("name" => $_POST["name"], "email" => $_POST["email"], "phone" => $_POST["phone"], "genre" => $_POST["genre"], 
            "city" => $_POST["city"], "state" => $_POST["state"]);
            array_push($_SESSION["all_users"], $user);
        }
    }

    if (!isset($_SESSION["all_users"])){
        $_SESSION["all_users"] = array();
    }
    add_user();
    header("Location: ./allusers.php")
?>
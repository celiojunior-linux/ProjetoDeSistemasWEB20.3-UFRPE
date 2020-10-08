<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <script src="\js\script.js"></script>
    <title>Projeto WEB - <?php echo ucwords(str_replace("-", " ", str_replace("/","",$_SERVER["PATH_INFO"])));?></title>
</head>
<body class="no-margin">
<div id="menu-bar" class="divided-cells transparent">
    <ul class="no-margin menu-options">
        <li><a href="/home">Home</a></li>
        <li><a href="/about">About</a></li>
    </ul>
    <ul class="no-margin menu-options">
        <?php
            if (isset($_SESSION["user"])){
                echo "<li><a href='/user-page'>My Page</a></li>";
                echo "<li><a href='/tasks'>Tasks</a></li>";
                echo "<li><a style='cursor:pointer' onclick='logout()'>Logout</a></li>";
            }else{
                echo "<li><a href='/signup'>Signup</a></li>";
                echo "<li><a href='/login'>Login</a></li>";
            }
        ?>
    </ul>
</div>
<div id="page-contents">

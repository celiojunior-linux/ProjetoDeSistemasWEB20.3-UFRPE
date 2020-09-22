
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./source/css/base.css">
    <title>All Users</title>
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="contents">
        <span>
            <?php
                if (isset($_SESSION["all_users"])){
                    echo "<ul class='user-list'>";
                    foreach($_SESSION["all_users"] as $user){
                        echo "<li>".
                                "<span class='user-column'>".
                                    "<h3>Name: </h3>".
                                    "<p>".$user["name"]."</p>".
                                "</span>".
                                "<span class='user-column'>".
                                    "<h3>Phone: </h3>".
                                    "<p>".$user["phone"]."</p>".
                                "</span>".
                                "<span class='user-column'>".
                                    "<h3>Password: </h3>".
                                    "<p>".$user["password"]."</p>".
                                "</span>".
                            "</li>";
                    }
                    echo "</ul>";
                }else{
                    echo "<h1>No users found.</h1>";
                }
            ?>
        </span>
    </div>
</body>
</html>
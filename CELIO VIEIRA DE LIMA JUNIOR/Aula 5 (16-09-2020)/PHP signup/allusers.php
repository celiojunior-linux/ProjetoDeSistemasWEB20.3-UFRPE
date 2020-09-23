
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
                                "<div>".
                                    "<span class='user-column'>".
                                        "<h3>Name: </h3>".
                                        "<p>".$user["name"]."</p>".
                                    "</span>".
                                    "<span class='user-column'>".
                                        "<h3>Phone: </h3>".
                                        "<p>".$user["phone"]."</p>".
                                    "</span>".
                                    "<span class='user-column'>".
                                        "<h3>Email: </h3>".
                                        "<p>".$user["email"]."</p>".
                                    "</span>".
                                "</div>".
                                "<div>".
                                    "<span class='user-column'>".
                                        "<h3>Genre: </h3>".
                                        "<p>".$user["genre"]."</p>".
                                    "</span>".
                                    "<span class='user-column'>".
                                        "<h3>City: </h3>".
                                        "<p>".$user["city"]."</p>".
                                    "</span>".
                                    "<span class='user-column'>".
                                        "<h3>State: </h3>".
                                        "<p>".$user["state"]."</p>".
                                    "</span>". 
                                "</div>".
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
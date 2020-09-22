<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./source/css/base.css">
    <title>Sign up</title>
</head>
<body>
    <?php include "navbar.php" ?>
    <div class="contents">
        <span>
            <h1>Sign Up a new user.</h1>
            <form class="form" action="./saveuser.php" method="POST">
                <input name="name"     id="" placeholder="Name"         type="text"     required><br>
                <input name="password" id="" placeholder="Password"     type="password" required><br>
                <input name="phone"    id="" placeholder="Phone number" type="tel"      required>
                <button type="submit">Save</button>
            </form>
        </span>
    </div>
</body>
</html>
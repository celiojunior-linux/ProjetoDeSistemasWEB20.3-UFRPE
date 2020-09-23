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
                <input name="email" id="" placeholder="Email"     type="email" required><br>
                <input name="phone"    id="" placeholder="Phone number" type="tel"      required>
                <h3>Genre</h3>
                <select name="genre">
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                    <option value='undefined'>Undefined</option>
                </select>
                <hr>
                <input name="city"    id="" placeholder="City" type="tel"      required>
                <input name="state"   id="" placeholder="State" type="tel"     required>
                <button type="submit">Save</button>
            </form>
        </span>
    </div>
</body>
</html>
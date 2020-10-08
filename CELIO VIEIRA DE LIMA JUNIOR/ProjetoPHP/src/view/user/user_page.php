<?php include __DIR__ . "/../template/menu_bar.php";?>
<div class="centered-contents">
    <h1 class="centered-text"> Welcome, <?php echo $_SESSION["user"]->getName(); ?><br>What are you gonna do today?</h1>
    <img class="centered-image spaced" src="\assets\img\work_hard.gif" alt="" srcset="">
    <div class="button-menu">
        <button class='modern-button-color' onclick="document.location.href='/new-task'">New Task</button>
        <form action="/delete-user" method="post" id="delete-user-form">
            <button type="button" onclick="deleteUser()" class="modern-button-color">Delete My Account</button>
        </form>
        <button class="modern-button-color" onclick="window.location.href='/tasks'">My Tasks</button>
        <button class="modern-button-color" onclick="logout()">Logout</button>
    </div>
    <div>
        <h1 class="centered-text spaced-on-top">My Info</h1>
        <ul>
            <li><h3>Email: <?php echo $_SESSION["user"]->getEmail(); ?></h3></li>
            <li><h3>Created at: <?php echo $_SESSION["user"]->getCreatedAt(); ?></h3></li>
        </ul>
    </div>
</div>
<?php include __DIR__ . "/../template/footer.php"?>
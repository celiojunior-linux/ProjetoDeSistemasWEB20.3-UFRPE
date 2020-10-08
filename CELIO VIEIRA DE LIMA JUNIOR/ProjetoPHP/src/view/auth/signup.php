<?php include __DIR__ . "/../template/menu_bar.php"?>
<div class="centered-box formbox">
    <form action="/signup" method="post" class="customform">
    <h1 class="centered-text">SignUp Now</h1>
    <br>
    <span>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required>
    </span>
    <br>
    <span>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </span>
    <br>
    <span>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </span>
    <br>
    <span>
        <button class="modern-button centered-button">Signup</button>
    </span>
</form>
</div>
<?php include __DIR__ . "/../template/footer.php"?>
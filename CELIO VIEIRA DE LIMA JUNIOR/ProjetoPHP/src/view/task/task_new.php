<?php include __DIR__ . "/../template/menu_bar.php";?>
    <div class="centered-contents">
        <h1 class="centered-text">Manage your task here</h1>
        <form action="/save-task" method="post">
            <input name="title" class="wide styled-input spaced-on-top" type="text" placeholder="Title of your task" required>
            <textarea class="wide styled-input spaced-on-top" placeholder="Description for your task" rows="20" cols="100" name="description"></textarea>
            <input class="wide styled-input spaced-on-top" type="date" name="date" required>
            <span class="spaced-on-top sbs-menu">
                <select class="styled-input" name="status">
                    <option value="0">Ongoing</option>
                    <option value="1">Completed</option>
                </select>
                <button class="styled-input modern-button">Save</button>
            </span>
        </form>
    </div>
<?php include __DIR__ . "/../template/footer.php"?>
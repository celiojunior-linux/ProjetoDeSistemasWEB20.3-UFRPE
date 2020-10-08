<?php include __DIR__ . "/../template/menu_bar.php";?>
    <div class="centered-contents">
        <h1 class="centered-text">Manage your task here</h1>
        <form action="/update-task" method="post">
            <input value="<?php echo $_SESSION["current-task"]->getTitle(); ?>" name="title" class="wide styled-input spaced-on-top" type="text" placeholder="Title of your task" required>
            <textarea class="wide styled-input spaced-on-top" placeholder="Description for your task" rows="20" cols="100" name="description"><?php echo $_SESSION["current-task"]->getDesc(); ?></textarea>
            <input class="wide styled-input spaced-on-top" type="text" placeholder="Deadline Date" onfocus="(this.type='date')" name="date" value="<?php echo $_SESSION["current-task"]->getDeadLine(); ?>" required>
            <span class="spaced-on-top sbs-menu">
                <select class="styled-input" name="status" value="<?php echo $_SESSION["current-task"]->getStateConverted()?>">
                    <option value="0">Ongoing</option>
                    <option value="1">Finished</option>
                </select>
                <button class="styled-input modern-button">Save</button>
            </span>
        </form>
    </div>
<?php include __DIR__ . "/../template/footer.php"?>
<?php include __DIR__ . "/../template/menu_bar.php";?>
    <div class="centered-contents">
        <h1 class="centered-text spaced">All your tasks are here.</h1>
        <form method="get" action="/tasks" class="button-menu spaced" style="flex-direction: row;">
            <input type="search" name="search" style="width:80%; font-size: 32px; max-height:64px;" value="<?php if(isset($_GET["search"])){echo $_GET["search"];};?>">
            <button class="modern-button" style="width:20%">Search</button>
        </form>
        <div class="sbs-menu-thin">
            <form>
                <button type="button" class='modern-button-color styled-input ' onclick="document.location.href='/new-task'">Create New</button>
            </form>
            <form id="delete-all-tasks-form" action="/delete-all-tasks" method="post">
                <button class='styled-input modern-button-color' type="button" onclick="deleteAllUserTasks()">Delete All</button>
            </form>
        </div>
        <?php
        foreach ($_SESSION["tasks"] as $task) {
                echo "
                    <div class='task spaced'>
                        <span>
                            <h1>{$task->getTitle()}</h1>
                            <div>
                                <pre style='text-align:left'>{$task->getDesc()}</pre>
                            </div>
                            <a class='styled-link' href='/tasks?id={$task->getTempId()}'><button class='modern-button styled-input'>Edit</button></a>
                        </span>
                        <span style='display: flex; flex-direction: column; justify-content: center'>
                            <h3>Defined at: {$task->getCreatedAt()}</h3>
                            <h3>Situation: {$task->getStateConverted()}</h3>
                            <h3>DeadLine: {$task->getDeadLine()}</h3>
                            <span class='sbs-menu-thin' style='width:max-content;'>
                                <form action='/delete-task?id={$task->getId()}' method='post'>
                                    <button class='modern-button styled-input' >Delete</button>
                                </form>
                                <form action='/complete-task?id={$task->getId()}' method='post'>
                                    <button class='modern-button styled-input' >Complete</button>
                                </form>
                            </span>
                        </span>
                    </div>";
            }
        ?>
    </div>
<?php include __DIR__ . "/../template/footer.php"?>
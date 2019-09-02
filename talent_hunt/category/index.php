<?php
require_once "action.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Welcome to GTCoding</title>
</head>
<body>
<div class="wrapper">
    <header>
        <h2>GTCODING</h2>
    </header>
    <div class="navigationDesktop">
        <nav>
            <ul>
                <?= show_menu();
                ?>
            </ul>
        </nav>
    </div>

    <article>
        <p>This is a basic example of how a multi-level navigation bar can be written using html and css. You can further go ahead and make changes to this and create the navigation bar as you want. This is just to show how to get the basics right. You can build on this and customize everything to your needs.</p>
        <p>I hope that this tutorial helps you understand how to create multi-level navigation bar (dropdown navigation bar). If you like this video please click on the <strong>LIKE</strong> button and don't forget to <strong>SUBSCRIBE</strong> to this channel to get the latest video updates.</p>
        <p>Thanks for visiting.</p>
    </article>

    <footer>
        GTCoding &copy; 2017
    </footer>
</div>
</body>
</html>
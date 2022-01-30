<?php
session_start();
if (!isset($_SESSION['USERNAME'])) {
    ?>
    <html>
    <head>
        <title>Login - ICS</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="logo-container">
        <img id="logo" src="img/logo.png">
    </div>
    <?php if (!empty($_SESSION['message'])) {
        echo "<div class='message-container'><p id='message'>" . $_SESSION['message'] . "</p></div>";
    } ?>
    <div class="login-container">
        <form id="login-form" method="post" action="login_backend.php">
            <input type="text" name="username" placeholder="Nutzername" required><br>
            <input type="password" name="password" placeholder="Passwort" required><br>
            <input type="submit" name="submit" value="Absenden">
        </form>

        <?php if (!empty($_SESSION['error'])) {
            echo "<div class='error-container'><p id='error'>" . $_SESSION['error'] . "</p></div>";
        } ?>

    </div>

    </body>


    </html>
    <?php
} else {
    header("Location: login_frontend.php");
}

?>
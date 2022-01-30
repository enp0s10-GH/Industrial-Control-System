<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
?>
    <html>
    <head>
        <title>ICS</title>
        <link rel="stylesheet" href="../css/template.css"
    </head>
    <body>
    <?php if(!empty($_SESSION['query-error'])) { echo "<p id='query-error'>".$_SESSION['query-error']."</p>"; } ?>
    <div class="deleteserver-container">
        <h1>Server Löschen</h1>
        <form action="../delete_server.php" method="post">
            <input type="text" name="serial" placeholder="Server-Seriennummer"><br>
            <input id="submit" type="submit" name="submit" value="Löschen">
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: login_frontend.php");
}

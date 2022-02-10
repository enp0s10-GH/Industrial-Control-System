<?php
session_start();
if (isset($_SESSION['USERNAME'])) {
?>
    <html>
    <head>
        <title>ICS</title>
        <link rel="stylesheet" href="../css/template.css">
    </head>
    <body>
    <?php if(!empty($_SESSION['query-error'])) { echo "<p id='query-error'>".$_SESSION['query-error']."</p>"; } ?>
    <div class="addserver-container">
        <h1>Server Anlegen</h1>
        <form action="../addserver.php" method="post">
		  <input type="text" name="server-type" placeholder="Server Typ"><br>
		  <input type="text" name="LOCATION" placeholder="Standort"><br>
        <input id="submit" type="submit" name="submit" value="Hinzufügen">
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: login_frontend.php");
}

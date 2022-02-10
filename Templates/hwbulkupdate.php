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
    <div class="replacehw-container">

        <h1>Replace Hardware</h1>
        <form action="../replacehw.php" method="post">
            <input type="text" name="server-number" placeholder="CSRV"><br>
            <input type="text" name="old-hw" placeholder="Alte Hardware"><br>
            <input type="text" name="new-hw" placeholder="Neue Hardware"><br>
            <input id="submit" type="submit" name="submit" value="Bestätigen">
        </form>
    </div>
    <div class="installhw-container">
        <h1>Install Hardware</h1>
        <form action="../installhw.php" method="post">
            <input type="text" name="server-number" placeholder="CSRV"><br>
            <input type="text" name="new-hw" placeholder="Neue Hardware"><br>
            <input id="submit" type="submit" name="submit" value="Bestätigen">
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    header("Location: login_frontend.php");
}

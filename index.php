<?php
# Pre-Settings of the Start page
# required: functions.php, main.php
session_start();
include_once("main.php");
if (isset($_SESSION['USERNAME'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo_white.png" alt="logo">
                </span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search-alt icon'></i>
                    <form action="searchcsrv.php" method="post">
                        <input type="text" name="serial" placeholder="Seriennummer">
                        <input type="hidden" name="submit" id="hidden-submit">
                    </form>
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="handle_redirection.php?content=Dashboard">
                            <i class='bx bxs-server icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="handle_redirection.php?content=HardwareBulkUpdate">
                            <i class='bx bxs-data icon'></i>
                            <span class="text nav-text">Sammelupdate</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="handle_redirection.php?content=AddServer">
                            <i class='bx bx-list-plus icon' ></i>
                            <span class="text nav-text">Server Hinzufügen</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="handle_redirection.php?content=RemoveServer">
                            <i class='bx bx-list-minus icon' ></i>
                            <span class="text nav-text">Server Entfernen</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="listservers.php">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">Hardware-Liste</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bxs-cog bx-spin bx-rotate-90 icon' ></i>
                            <span class="text nav-text">Einstellungen</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <?php
        if(!isset($_SESSION['content'])) {
            include("Templates/welcome.php");
        } elseif ($_SESSION['content'] == "Dashboard") {
            include("Templates/dashboard.php");
        } elseif ($_SESSION['content'] == "HardwareBulkUpdate") {
            include("Templates/hwbulkupdate.php");
        } elseif ($_SESSION['content'] == "HWInfo") {
            include("Templates/hwdata.php");
        } elseif ($_SESSION['content'] == "RemoveServer") {
            include("Templates/removeserver.php");
        } elseif ($_SESSION['content'] == "AddServer") {
            include("Templates/addserver_template.php");
        } elseif ($_SESSION['content'] == "ListServers") {
            include("Templates/list_servers.php");
        }
        ?>
    </section>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        });
    </script>

    </body>
    </html>

    <?php
} else {
    header("Location: login_frontend.php");
}



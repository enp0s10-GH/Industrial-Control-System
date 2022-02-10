<html>
<style>

    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");

    * {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        box-sizing: border-box;
        color: inherit;
    }

    body {
        background-image: linear-gradient(120deg, #4f0088 0%, #000000 100%);
        height: 100vh;
    }

    h1 {
        font-size: 45vw;
        text-align: center;
        position: fixed;
        width: 100vw;
        z-index: 1;
        color: #ffffff26;
        text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
        top: 50%;
        transform: translateY(-50%);
        font-family: "Montserrat", monospace;
    }

    p {

        font-size: 75px;
        text-align: center;
        position: fixed;
        width: 100vw;
        z-index: 1;
        color: #ffffff26;
        text-shadow: 0 0 80px rgba(0, 0, 0, 0.07);
        top: 93%;
        transform: translateY(-50%);
        font-family: "Montserrat", monospace;

    }

</style>

<title><?php echo $_GET['error']; ?> - ICS</title>
<h1><?php echo $_GET['error']; ?></h1>
<p><?php echo $_GET['defined']; ?></p>
<html>

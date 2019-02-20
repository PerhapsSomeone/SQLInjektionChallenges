<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 20.02.19
 * Time: 19:02
 */


// Lösung:
// User: ' OR '1=1''
// Pass: ' OR '1=1''


require "../DB.php";
require  "../exception.php";

$sqlExecuted = false;
$exception = "";

if(isset($_POST["username"]) && isset($_POST["password"])) {
    $sqlExecuted = true;

    $conn = DB::getDBConn();

    try {

        if(strpos($_POST["username"], '\' OR \'1=1\'\'') !== false || strpos($_POST["username"], '\' OR \'1=1\'\'') !== false) {
            echo "<center><h1 style='color: red'>Netter Versuch. Blockiert durch Filter.</h1></center>";
            goto skip;
        }

        if(strpos($_POST["password"], '\' OR \'1=1\'\'') !== false || strpos($_POST["password"], '\' OR \'1=1\'\'') !== false) {
            echo "<center><h1 style='color: red'>Netter Versuch. Blockiert durch Filter.</h1></center>";
            goto skip;
        }


        $stmt = $conn->query("SELECT * FROM challenge3 WHERE username = '". $_POST["username"]. "' AND password = '" . $_POST["password"] . "'");

        while ($row = $stmt->fetch())
        {
            echo "<center>Eingeloggt als " . $row['username'] . " mit dem Passwort ". $row["password"]."!</center><br />";
        }

    }
    catch (Exception $e) {
        $exception = $e;
    }
}

skip:

?>

<html>
<head>
    <link rel="stylesheet" href="/styling.css">
</head>
<body>
<section class="hero">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                SQL Injektion Challenges
            </h1>
            <h2 class="subtitle">
                Level 3
            </h2>
        </div>
    </div>
</section>

<div class="container is-fluid centered">
    <div class="notification">
        <p>Okay. Das bedeutet Krieg.</p>
        <p>Ich habe jetzt einen Filter geschrieben der alle Angriffe stoppt.</p>

        <?php

        if($sqlExecuted && !empty($exception)) {
            echo exception_stacktrace::jTraceEx($e);
            echo "<br /><br />Offenbar gab es einen Fehler in diesem Statement:<br />";
            echo "SELECT * FROM challenge1 WHERE username = '". $_POST["username"]. "' AND password = '" . $_POST["password"] . "'";
        }

        ?>

        <form method="post" action="level3.php">
            <input class="input is-rounded" name="username" placeholder="Nutzername" />
            <input class="input is-rounded" name="password" placeholder="Passwort" type="password">
            <button class="button is-rounded is-primary is-outlined">Login</button>
        </form>
    </div>
</div>
</body>
</html>

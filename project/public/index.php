<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 20.02.19
 * Time: 19:02
 */

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
                Kannst du sie alle lösen?
            </h2>
        </div>
    </div>
</section>

<div class="container is-fluid centered">
    <div class="notification">
        <p>Hier kannst du mal austesten, wie SQL Injektionen in der Praxis funktionieren.</p>
        <p>Viel Spaß!</p>
        <br />
        <p>Notiz: Jede Login Challenge enthält einen Accout mit den folgenden Daten:</p>
        <p>Nutzername: gast</p>
        <p>Passwort: 12345</p>
        <br />
        <a href="level1.php" class="link button is-success is-outlined is-rounded is-medium">Level 1</button></a>
        <br /><br />
        <a href="level2.php" class="link button is-success is-outlined is-rounded is-medium">Level 2</button></a>
    </div>
</div>
</body>
</html>

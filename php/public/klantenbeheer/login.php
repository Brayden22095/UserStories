<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <form action="#" method="POST">
        <h1>Inloggen op ons systeem</h1>
        username <input type="text" name="username" id="username"><br>
        wachtwoord <input type="password" name="password" id="wachtwoord">
        <br><br>
        <input type="submit" value="Login" name="login">
        <br><br>
    </form>
</body>

</html>
<?php
session_start();

include ('../../src/authenicatie.php');

if (isset($_POST['login'])) {

    $newLogin = new Authenicatie();
    $newLogin->setUsername($_POST['username']);
    $newLogin->setPassword($_POST['password']);
    

    if ($newLogin->verifyUser($newLogin, $newLogin) != false) {
        echo "Account is aangemaakt";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["login"] = true;
        header('Location: index.php');
    } else {
        echo "Account is niet aangemaakt";
    }
}
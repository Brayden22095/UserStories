<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="#" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-6 text-center">Inloggen op ons systeem</h1>
        <label for="username" class="block text-gray-700">Gebruikersnaam</label>
        <input type="text" name="username" id="username" class="w-full p-2 border border-gray-300 rounded mb-4">
        <label for="wachtwoord" class="block text-gray-700">Wachtwoord</label>
        <input type="password" name="password" id="wachtwoord" class="w-full p-2 border border-gray-300 rounded mb-4">
        <input type="submit" value="Login" name="login" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
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

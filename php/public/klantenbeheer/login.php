<?php
session_start();
include('../../src/Authenicatie.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $newLogin = new Authenicatie();
    $newLogin->setUsername($username);
    $newLogin->setPassword($password);

    if ($newLogin->verifyUser($username, $password)) {
        $_SESSION["username"] = $username;
        $_SESSION["login"] = true;
        header('Location: index.php');
        exit;
    } else {
        echo "<script>alert('Niet ingelogd');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col h-screen justify-center items-center"> 
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
        <form action="login.php" method="POST" class="flex flex-col items-center">
            <input type="text" name="username" placeholder="Gebruikersnaam" required class="mb-4 p-3 w-full max-w-xs border border-gray-300 rounded-lg">
            <input type="password" name="password" placeholder="Wachtwoord" required class="mb-4 p-3 w-full max-w-xs border border-gray-300 rounded-lg">
            <input type="submit" value="Login" name="login" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 cursor-pointer w-full max-w-xs">
        </form>

        <div class="additional-links">
            <a href="register.php">Nog geen account? Registreer.</a><br><br>
            <a href="forgot_password.php">Wachtwoord vergeten?</a>
        </div>
    </div>

</body>
</html>

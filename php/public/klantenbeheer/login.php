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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: absolute;
            top: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .navbar a:hover {
            color: #ddd;
        }

        .login-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #fff;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;
        }

        .additional-links {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Gebruikersnaam" required>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <input type="submit" value="Login" name="login">
        </form>
        <div class="additional-links">
            <a href="register.php">Nog geen account? Registreer.</a><br><br>
            <a href="forgot_password.php">Wachtwoord vergeten?</a>
            
        </div>
    </div>
</body>
</html>

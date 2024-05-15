

<?php
session_start();

include("../../src/login.php");

$logins = new logins();

if(isset($_POST['ZoekUser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($logins->checkLogin($username, $password)){
        // If login is successful, save username and password in session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        header("Location: ingelogd.php");
        exit; // It's a good practice to exit after redirecting
    } else {
        echo "Invalid username or password";
    }
}
?>






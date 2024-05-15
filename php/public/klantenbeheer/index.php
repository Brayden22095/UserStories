<?php
session_start();

if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    $username = $_SESSION["username"];
 
} else {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Website</title>
</head>
<body>
    <h1>Dit is de website</h1>
    <p>Welkom op onze website: <?php echo $username; ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <a href=save.php>Klanten toevoegen</a>
    
</body>

</html>
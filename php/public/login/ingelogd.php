


<?php
session_start();
include("../../src/login.php");
$user = new Logins();
$username = $_SESSION['username'];

echo("<h1> welkom op de pagina $username</h1>");









?>
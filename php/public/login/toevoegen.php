<form action="#" method="post">
    <label for="username">username</label>
    <input type="text" name="username" />
    <br />
    <label for="password">password:</label>
    <input type="text" name="password" />
    <br />
    <label for="email">Email</label>
    <input type="text" name="email" />
    <br />
    <input type="submit" name="savelogin"/>
</form>
<form action="login.php">
    <button type="submit">Terug</button>
</form>

<?php
include("../../src/login.php");

if(isset($_POST['savelogin'])){

    $newuser = new logins();
    $newuser->setemail($_POST['email']);
    $newuser->setpassword($_POST['password']);
    $newuser->setusername($_POST['username']);
    
    if($newuser->savelogin() != false){
        echo "user is opgeslagen";
        header("Location: login.php");
    } else {
        echo "user is niet opgeslagen";
    }
    
}
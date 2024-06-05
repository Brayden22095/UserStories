<?php
include_once('database_auth.php');

class Authenicatie extends Database
{
    private $id;
    private $username;
    private $password;
    private $email;

    // Login
    public function verifyUser($username, $password)
    {
        // Check if username and password are provided
        if ($username == "" || $password == "") {
            return false;
        }

        // Prepare and execute the query to get the user by username
        $checkNameQuery = "SELECT Wachtwoord FROM gebruiker WHERE Gebruikersnaam = ?";
        $stmt = parent::voerQueryUit($checkNameQuery, [$username]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['Wachtwoord'];

            // Verify the provided password against the hashed password
            if (password_verify($password, $hashedPassword)) {
                return true;
            }
        }
        return false;
    }

    // Getters and setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
?>

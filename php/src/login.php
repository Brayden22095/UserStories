<?php
include_once('database.php');

class logins extends Database
{
    private $id;
    private $username;
    private $password;
    private $email;

  
    // Get all logins
    public function getAlllogins()
    {
        $query = "SELECT * FROM userdatabase";
        return parent::voerQueryUit($query);
    }


    public function checkLogin($username, $password)
    {
        $query = "SELECT * FROM userdatabase WHERE username = '$username' AND password = '$password'";
        return parent::voerQueryUit($query);
    }


    // Save a new logins
    public function savelogin()
    {
        // Check if all required fields are filled in
        if(
            $this->getusername() == "" || $this->getpassword() == "" || $this->getemail() == ""
        ){
            return false;
        }

        $username = $this->getusername();
        $password = $this->getpassword();
        $email = $this->getemail();

        $query = "INSERT INTO userdatabase (username, password, email) VALUES ('$username', '$password', '$email')";
        
        // Return true if the query is successful, else return false
        if(parent::voerQueryUit($query) == false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    
    // Delete a logins
    public function deletelogin($id)
    {
        $query = "DELETE FROM userdatabase WHERE id = $id";
        return parent::voerQueryUit($query);
    }

    // Setters
    public function setid($id)
    {
        $this->id = $id;
    }

    public function setusername($username)
    {
        $this->username = $username;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }


    // Getters

    public function getid()
    {
        return $this->id;
    }

    public function getusername()
    {
        return $this->username;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function getemail()
    {
        return $this->email;
    }
    




}
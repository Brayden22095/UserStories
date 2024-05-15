<?Php
include_once ('database.php');

class Authenicatie extends Database
{
    private $id;
    private $username;
    private $password;
    private $email;

    // Login
    public function verifyUser($username, $password)
    {
        // Check if all required fields are filled in
        if ($this->getUsername() == "" || $this->getPassword() == "") {
            return false;
        }

        // Check if the username already exists
        $checkNameQuery = "SELECT username FROM users 
                WHERE username = '{$this->getUsername()}'";
        $resultName = parent::voerQueryUit($checkNameQuery);

        if ($resultName > 0) {
            return true;
        }

        // Check if the password is correct
        $checkPasswordQuery = "SELECT password FROM users
                WHERE password = '{$this->getPassword()}'";
        $resultPassword = parent::voerQueryUit($checkPasswordQuery);

        if ($resultPassword > 0) {
            return true;
        }

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

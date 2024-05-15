<?Php
include_once('database.php');

class User extends Database
{
    private $id;
    private $username;
    private $password;
    private $email;

    // Save a new user
    public function saveUser()
    {
        // Check if all required fields are filled in
        if ($this->getUsername() == "" || $this->getPassword() == "" || $this->getEmail() == "") {
            return false;
        }

        // Check if the username already exists
        $checkNameQuery = "SELECT username FROM users 
        WHERE username = '{$this->getUsername()}'";
        $result = parent::voerQueryUit($checkNameQuery);

        if ($result > 0) {
            return false;
        }

        $username = $this->getUsername();
        $email = $this->getEmail();
        $password = password_hash($this->getPassword(), PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password, email)
                  VALUES ('$username', '$password', '$email')";

        // Return true if the query is successful, else return false
        if (parent::voerQueryUit($query) == false) {
            return false;
        } else {
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

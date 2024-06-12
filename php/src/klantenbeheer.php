<?php
include_once('database.php');

class klantenbeheer extends Database
{
    private $id;
    private $naam;
    private $email;
    private $telefoonNummer;
    private $tekst; 
    private $status; // Add this line

    public function searchCustomersByName($name) {
        $name = $this->getNaam2();
        $query = "SELECT * FROM userdatabase WHERE Naam LIKE '%$name%'";

        return parent::voerQueryUit($query);
    }
    
    public function searchCustomersById($id) {
        $query = "SELECT * FROM userdatabase WHERE id = $id";
        return parent::voerQueryUit($query);
    }
    
    public function searchCustomersByEmail($email) {
        $query = "SELECT * FROM userdatabase WHERE Email LIKE '%$email%'";
        return parent::voerQueryUit($query);
    }
    
    public function searchCustomersByTelefoonnummer($telefoonnummer) {
        $query = "SELECT * FROM userdatabase WHERE TelefoonNummer LIKE '%$telefoonnummer%'";
        return parent::voerQueryUit($query);
    }

    // Get all customers
    public function getAllCustomers()
    {
        $query = "SELECT * FROM userdatabase";
        return parent::voerQueryUit($query);
    }

    // Get a specific customer
    public function getCustomer($id)
    {
        $query = "SELECT * FROM userdatabase WHERE id = $id";
        return parent::voerQueryUit($query);
    }

    // Save a new customer
    public function saveCustomer()
    {
        if ($this->getNaam() == "" || $this->getTelefoonNummer() == "" || $this->getEmail() == "") {
            return false;
        }

        $naam = $this->getNaam();
        $telefoonNummer = $this->getTelefoonNummer();
        $email = $this->getEmail();
        $tekst = $this->getTekst();
        $status = $this->getStatus(); // Add this line

        $query = "INSERT INTO userdatabase (Naam, Email, TelefoonNummer, Tekst, Status)
                  VALUES ('$naam', '$email', '$telefoonNummer', '$tekst', '$status')"; // Update query

        return parent::voerQueryUit($query) !== false;
    }

    // Update a customer
    public function updateCustomer($id)
    {
        if ($this->getNaam() == "" || $this->getTelefoonNummer() == "" || $this->getEmail() == "") {
            return false;
        }

        $naam = $this->getNaam();
        $telefoonNummer = $this->getTelefoonNummer();
        $email = $this->getEmail();
        $tekst = $this->getTekst();
        $status = $this->getStatus(); // Add this line

        $query = "UPDATE userdatabase SET Naam = '$naam', Email = '$email', TelefoonNummer = '$telefoonNummer', Tekst = '$tekst', Status = '$status' WHERE id = $id"; // Update query

        return parent::voerQueryUit($query) !== false;
    }

    // Delete a customer
    public function deleteCustomer($id)
    {
        $query = "DELETE FROM userdatabase WHERE id = $id";
        return parent::voerQueryUit($query) !== false;
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

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function getNaam2() {
        // Assume this function returns sanitized input
        return isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTelefoonNummer($telefoonNummer)
    {
        $this->telefoonNummer = $telefoonNummer;
    }

    public function getTelefoonNummer()
    {
        return $this->telefoonNummer;
    }

    public function setTekst($tekst)
    {
        $this->tekst = $tekst;
    }

    public function getTekst()
    {
        return $this->tekst;
    }

    // Add these methods
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
?>

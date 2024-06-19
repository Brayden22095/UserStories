<?php
include_once('database.php');

class klantenbeheer extends Database
{
    private $id;
    private $naam;
    private $email;
    private $telefoonNummer;

    private $beschrijving; // Add this line
    private $factuurDatum;
    private $totaalbedrag;



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

        $beschrijving = $this->getBeschrijving(); // Add this line

        $query = "INSERT INTO userdatabase (Naam, Email, TelefoonNummer, Beschrijving)
                  VALUES ('$naam', '$email', '$telefoonNummer', '$beschrijving')"; // Update query


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

        $beschrijving = $this->getBeschrijving();
        $factuurDatum = $this->getFactuurDatum();
        $totaalbedrag = $this->getTotaalbedrag();

        $query = "UPDATE userdatabase SET Naam = '$naam', Email = '$email', TelefoonNummer = '$telefoonNummer', Beschrijving = '$beschrijving', FactuurDatum = '$factuurDatum', TotaalBedrag = '$totaalbedrag' WHERE id = $id"; // Update query


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


    // Add these methods
    public function setBeschrijving($beschrijving)

    {
        $this->beschrijving = $beschrijving;
    }

    public function getBeschrijving()
    {
        return $this->beschrijving;
    }
    public function getFactuurDatum()
    {
        return $this->factuurDatum;
    }
    public function setFactuurDatum($factuurDatum)
    {
        $this->factuurDatum = $factuurDatum;

        return $this;
    }
    public function getTotaalbedrag()
    {
        return $this->totaalbedrag;
    }
    public function setTotaalbedrag($totaalbedrag)
    {
        $this->totaalbedrag = $totaalbedrag;

        return $this;
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

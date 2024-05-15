<?php
include_once ('database.php');

class klantenbeheer extends Database
{
    private $id;
    private $naam;
    private $email;
    private $telefoonNummer;


    // Save a new person
    public function savePerson()
    {
        // Check if all required fields are filled in
        if (
            $this->getNaam() == "" || $this->getTelefoonNummer() == "" || $this->getEmail() == ""
        ) {
            return false;
        }

        $naam = $this->getNaam();
        $telefoonNummer = $this->getTelefoonNummer();
        $email = $this->getEmail();        

        $query = "INSERT INTO userdatabase (Naam, Email, TelefoonNummer)
                VALUES ('$naam', '$email', '$telefoonNummer')";


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
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }
    public function getNaam()
    {
        return $this->naam;
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


   
}



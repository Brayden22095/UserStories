<title>Klant toevoegen</title>
<form action="#" method="post">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" />
    <br />
    <label for="telefoonNummer">TelefoonNummer:</label>
    <input type="text" name="telefoonNummer" />
    <br />
    <label for="email">E-mail:</label>
    <input type="text" name="email" />
    <br />
    <input type="submit" name="savePerson" value="Persoon toevoegen">
</form>
<?php
include("../../src/klantenbeheer.php");

if(isset($_POST['savePerson'])){

    $newPerson = new klantenbeheer();
    $newPerson->setNaam($_POST['naam']);
    $newPerson->setEmail($_POST['email']);
    $newPerson->setTelefoonNummer($_POST['telefoonNummer']);
    
    if($newPerson->saveCustomer() != false){
        echo "Persoon is opgeslagen";
        header('Location: index.php');
    } else {
        echo "Persoon is niet opgeslagen";
    }
}

<?php
include("../../src/klantenbeheer.php");

if(isset($_GET['id'])){
    $klant = new klantenbeheer();

    $klantDelete = $klant->deleteCustomer($_GET['id']);
    
    if($klantDelete != false){
        echo "Klant is verwijderd";
        header("Location: index.php");
    } else {
        echo "Klant is niet verwijderd";
    }
}
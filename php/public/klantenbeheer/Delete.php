<?php
include("../../src/klantenbeheer.php");

if(isset($_GET['id'])){
    $customer = new klantenbeheer();
    $customerDelete = $customer->deleteCustomer($_GET['id']);

    if($customerDelete != false){
        echo "Klant is verwijderd";
        header("Location: index.php");
    } else {
        echo "Klant is niet verwijderd";
    }
}


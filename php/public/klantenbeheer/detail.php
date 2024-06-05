
<?php
include("../../src/klantenbeheer.php");

if(isset($_GET['id'])){
    $klantenbeheer = new Klantenbeheer();
    $klantenData = $klantenbeheer->getCustomer($_GET['id']);
}
?>

<p class="text-lg">Naam: <?php echo $klantenData[0]['Naam']; ?></p>
    <p class="text-lg">Email: <?php echo $klantenData[0]['Email']; ?></p>
    <p class="text-lg">Telefoon: <?php echo $klantenData[0]['TelefoonNummer']; ?></p>
    <p class="text-lg">Beschrijving: <?php echo $klantenData[0]['Beschrijving']; ?></p>

    <a href="update.php?id=<?php echo $klantenData[0]['id']; ?>">Bewerken</a></br>
<a href="delete.php?id=<?php echo $klantenData[0]['id']; ?>">Verwijderen</a>


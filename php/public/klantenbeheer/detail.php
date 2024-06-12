<?php
include("../../src/klantenbeheer.php");

if(isset($_GET['id'])){
    $klantenbeheer = new Klantenbeheer();
    $customerData = $klantenbeheer->getCustomer($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Details</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">Klant Details</h1>
        <div class="bg-white shadow-md rounded p-6 mb-4">
            <p class="text-lg mb-2"><strong>Naam:</strong> <?php echo isset($customerData[0]['Naam']) ? htmlspecialchars($customerData[0]['Naam']) : 'Niet beschikbaar'; ?></p>
            <p class="text-lg mb-2"><strong>Email:</strong> <?php echo isset($customerData[0]['Email']) ? htmlspecialchars($customerData[0]['Email']) : 'Niet beschikbaar'; ?></p>
            <p class="text-lg mb-2"><strong>Telefoon:</strong> <?php echo isset($customerData[0]['TelefoonNummer']) ? htmlspecialchars($customerData[0]['TelefoonNummer']) : 'Niet beschikbaar'; ?></p>
            <p class="text-lg mb-2"><strong>Tekst:</strong> <?php echo isset($customerData[0]['Tekst']) ? htmlspecialchars($customerData[0]['Tekst']) : 'Niet beschikbaar'; ?></p>
        </div>
        <div class="flex space-x-4">
            <a href="update.php?id=<?php echo $customerData[0]['id']; ?>" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Bewerken</a>
            <a href="delete.php?id=<?php echo $customerData[0]['id']; ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Verwijderen</a>
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Terug naar Index</a>
        </div>
    </div>
</body>
</html>

<p class="text-lg">Naam: <?php echo $klantenData[0]['Naam']; ?></p>
    <p class="text-lg">Email: <?php echo $klantenData[0]['Email']; ?></p>
    <p class="text-lg">Telefoon: <?php echo $klantenData[0]['TelefoonNummer']; ?></p>
    <p class="text-lg">Beschrijving: <?php echo $klantenData[0]['Beschrijving']; ?></p>

    <a href="update.php?id=<?php echo $klantenData[0]['id']; ?>">Bewerken</a></br>
<a href="delete.php?id=<?php echo $klantenData[0]['id']; ?>">Verwijderen</a>


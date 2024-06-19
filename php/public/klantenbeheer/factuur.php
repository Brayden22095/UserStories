<?php
include("../../src/klantenbeheer.php");

if (isset($_GET['id'])) {
    $klantenbeheer = new Klantenbeheer();
    $klantenData = $klantenbeheer->getCustomer($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factuur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Factuur</h1>
            <div class="flex space-x-4">
                <a href="updateFactuur.php?id=<?php echo $klantenData[0]['id']; ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Bewerken</a>
                <a href="deleteFactuur.php?id=<?php echo $klantenData[0]['id']; ?>" class="text-red-500 hover:text-red-700 font-semibold">Verwijderen</a>
            </div>
        </div>
        <div class="mb-6">
            <p class="text-lg"><span class="font-semibold text-gray-700">Naam:</span> <?php echo $klantenData[0]['Naam']; ?></p>
            <p class="text-lg"><span class="font-semibold text-gray-700">Email:</span> <?php echo $klantenData[0]['Email']; ?></p>
            <p class="text-lg"><span class="font-semibold text-gray-700">Telefoon:</span> <?php echo $klantenData[0]['TelefoonNummer']; ?></p>
            <p class="text-lg"><span class="font-semibold text-gray-700">Beschrijving:</span> <?php echo $klantenData[0]['Tekst']; ?></p>
        </div>
        <div class="text-right border-t pt-4">
            <p class="text-lg font-semibold text-gray-700">Factuur Datum: <?php echo date("d-m-Y"); ?></p>
        </div>
        <div class="mt-6 text-right">
            <a href="index.php" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700 font-semibold">Terug</a>
        </div>
    </div>
</body>
</html>

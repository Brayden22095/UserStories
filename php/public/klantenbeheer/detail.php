<?php
include("../../src/klantenbeheer.php");

if(isset($_GET['id'])){
    $klantenbeheer = new Klantenbeheer();
    $klantenData = $klantenbeheer->getCustomer($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenbeheer</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h1 class="text-2xl font-bold mb-4">Klant Details</h1>
    
    <p class="text-lg mb-2"><span class="font-semibold">Naam:</span> <?php echo htmlspecialchars($klantenData[0]['Naam']); ?></p>
    <p class="text-lg mb-2"><span class="font-semibold">Email:</span> <?php echo htmlspecialchars($klantenData[0]['Email']); ?></p>
    <p class="text-lg mb-2"><span class="font-semibold">Telefoon:</span> <?php echo htmlspecialchars($klantenData[0]['TelefoonNummer']); ?></p>
    <p class="text-lg mb-4"><span class="font-semibold">Tekst:</span> <?php echo htmlspecialchars($klantenData[0]['Tekst']); ?></p>

    <div class="flex space-x-4">
        <a href="update.php?id=<?php echo htmlspecialchars($klantenData[0]['id']); ?>" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">Bewerken</a>
        <a href="delete.php?id=<?php echo htmlspecialchars($klantenData[0]['id']); ?>" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700">Verwijderen</a>
    </div>
</div>

</body>
</html>

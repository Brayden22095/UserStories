<?php
include_once("../../src/klantenbeheer.php");

// Fetch customer data if customer ID is set
if (isset($_GET['id'])) {
    $klant = new klantenbeheer();
    $klantenData = $klant->getCustomer($_GET['id']); // Corrected method name
}

// Update customer data if the form is submitted
if (isset($_POST['updateKlant'])) {
    $klant = new klantenbeheer();
    $klant->setNaam($_POST['naam']);
    $klant->setEmail($_POST['email']);
    $klant->setTelefoonNummer($_POST['telefoonNummer']);
    $klant->setBeschrijving($_POST['beschrijving']);
    $klant->setFactuurDatum($_POST['factuurDatum']);
    $klant->setTotaalBedrag($_POST['totaalBedrag']);
    
    if ($klant->updateCustomer($_GET['id']) != false) {
        echo "Factuur is bijgewerkt";
        header("Location: factuur.php?id=" . $_GET['id']);
        exit;
    } else {
        echo "Factuur is niet bijgewerkt";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Factuur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Update Factuur</h1>
            <div>
                <a href="factuur.php?id=<?php echo $klantenData[0]['id']; ?>" class="text-red-500 hover:text-red-700 font-semibold">Terug</a>
            </div>
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $klantenData[0]['id']; ?>">
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="naam">Naam</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="naam" id="naam" value="<?php echo $klantenData[0]['Naam']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="email">Email</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" id="email" value="<?php echo $klantenData[0]['Email']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="telefoonNummer">Telefoon Nummer</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="telefoonNummer" id="telefoonNummer" value="<?php echo $klantenData[0]['TelefoonNummer']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="beschrijving">Beschrijving</label>
                <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" name="beschrijving" id="beschrijving" required><?php echo $klantenData[0]['Beschrijving']; ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="factuurDatum">Factuur Datum</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="date" name="factuurDatum" id="factuurDatum" value="<?php echo $klantenData[0]['FactuurDatum']; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg font-semibold text-gray-700" for="totaalBedrag">Totaal Bedrag</label>
                <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" type="number" name="totaalBedrag" id="totaalBedrag" step="0.01" value="<?php echo $klantenData[0]['TotaalBedrag']; ?>" required>
            </div>
            <div class="text-right">
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 font-semibold" type="submit" name="updateKlant">Opslaan</button>
            </div>
        </form>
    </div>
</body>
</html>

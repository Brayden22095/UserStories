<?php
include_once("../../src/klantenbeheer.php");

// Start output buffering to avoid headers already sent error
ob_start();

// Fetch customer data if customerID is set
if(isset($_GET['id'])){
    $klant = new klantenbeheer();
    $customerData = $klant->getCustomer($_GET['id']); // Corrected variable name
}

// Update customer data if the form is submitted
if(isset($_POST['updateKlant'])){
    $klant = new klantenbeheer();
    $klant->setNaam($_POST['naam']);
    $klant->setEmail($_POST['email']);
    $klant->setTelefoonNummer($_POST['telefoonNummer']);
    $klant->setBeschrijving($_POST['beschrijving']);
    
    if($klant->updateCustomer($_GET['id']) != false){
        echo "Klant is bijgewerkt";
        header("Location: detail.php?id=".$_GET['id']);
        exit; // Make sure to exit after redirection
    } else {
        echo "Klant is niet bijgewerkt";
    }
}

// End output buffering and flush the output
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Klant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Update Klant</h1>
        <form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="naam" class="block text-gray-700 text-sm font-bold mb-2">Naam:</label>
                <input type="text" name="naam" value="<?php echo isset($customerData[0]['Naam']) ? htmlspecialchars($customerData[0]['Naam']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="text" name="email" value="<?php echo isset($customerData[0]['Email']) ? htmlspecialchars($customerData[0]['Email']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>
            <div class="mb-4">
                <label for="telefoonNummer" class="block text-gray-700 text-sm font-bold mb-2">Telefoon:</label>
                <input type="text" name="telefoonNummer" value="<?php echo isset($customerData[0]['TelefoonNummer']) ? htmlspecialchars($customerData[0]['TelefoonNummer']) : ''; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </div>
            <div class="mb-6">
                <label for="tekst" class="block text-gray-700 text-sm font-bold mb-2">Tekst:</label>
                <textarea name="tekst" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo isset($customerData[0]['Tekst']) ? htmlspecialchars($customerData[0]['Tekst']) : ''; ?></textarea>
                <label for="beschrijving" class="block text-gray-700 text-sm font-bold mb-2">Beschrijving:</label>
                <textarea name="beschrijving" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?php echo isset($klantenData[0]['Beschrijving']) ? $klantenData[0]['Beschrijving'] : ''; ?></textarea>
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" name="updateKlant" value="Update Klant" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
                <a href="detail.php?id=<?php echo $_GET['id']; ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Terug</a>
            </div>
        </form>
    </div>
</body>
</html>

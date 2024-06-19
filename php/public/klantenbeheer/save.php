<?php
include("../../src/klantenbeheer.php");

if(isset($_POST['savePerson'])){
    // Check if all fields are filled out
    if(empty($_POST['naam']) || empty($_POST['telefoonNummer']) || empty($_POST['email'])){
        echo "<p class='text-red-500 mt-4'>Alle velden zijn verplicht.</p>";
    } else {
        $newPerson = new klantenbeheer();
        $newPerson->setNaam($_POST['naam']);
        $newPerson->setEmail($_POST['email']);
        $newPerson->setTelefoonNummer($_POST['telefoonNummer']);
        $newPerson->setTekst($_POST['tekst']);
        $newPerson->setStatus($_POST['klus_afgerond']); // Assuming 'klus_afgerond' is the name of your radio button
        
        if($newPerson->saveCustomer() != false){
            echo "<p class='text-green-500 mt-4'>Persoon is opgeslagen</p>";
            header('Location: index.php');
            exit; // Ensure to exit after redirection
        } else {
            echo "<p class='text-red-500 mt-4'>Persoon is niet opgeslagen</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persoon Opslaan</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mt-10">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Persoon Opslaan</h1>
            <form action="" method="post">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="naam">Naam:</label>
                    <input type="text" name="naam" id="naam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="email">Email:</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="telefoonNummer">Telefoon:</label>
                    <input type="tel" name="telefoonNummer" id="telefoonNummer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="tekst">Tekst:</label>
                    <textarea name="tekst" id="tekst" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Klus afgerond (ja of nee):</label>
                    <div class="mt-2">
                        <input type="radio" name="klus_afgerond" value="ja" id="klus_ja" class="mr-2">
                        <label for="klus_ja">Ja</label>
                        <input type="radio" name="klus_afgerond" value="nee" id="klus_nee" class="ml-4 mr-2">
                        <label for="klus_nee">Nee</label>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" name="savePerson" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Opslaan
                    </button>
                    <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

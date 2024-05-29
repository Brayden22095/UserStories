<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant toevoegen</title>
    <!-- Voeg Tailwind CSS CDN toe -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded p-6 shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Klant toevoegen</h2>
            <form action="#" method="post">
                <div class="mb-4">
                    <label for="naam" class="block text-gray-700">Naam:</label>
                    <input type="text" name="naam" id="naam" class="form-input mt-1 block w-full border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="telefoonNummer" class="block text-gray-700">TelefoonNummer:</label>
                    <input type="text" name="telefoonNummer" id="telefoonNummer" class="form-input mt-1 block w-full border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">E-mail:</label>
                    <input type="text" name="email" id="email" class="form-input mt-1 block w-full border border-gray-300 rounded" />
                </div>
                <div class="mt-6">
                    <input type="submit" name="savePerson" value="Persoon toevoegen"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer mr-2" />
                    <button type="button" onclick="window.location.href='index.php'" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 cursor-pointer">start pagina</button>
                </div>
            </form>
            <?php
            include("../../src/klantenbeheer.php");

            if(isset($_POST['savePerson'])){

                $newPerson = new klantenbeheer();
                $newPerson->setNaam($_POST['naam']);
                $newPerson->setEmail($_POST['email']);
                $newPerson->setTelefoonNummer($_POST['telefoonNummer']);
                
                if($newPerson->saveCustomer() != false){
                    echo "<p class='text-green-500 mt-4'>Persoon is opgeslagen</p>";
                    header('Location: index.php');
                } else {
                    echo "<p class='text-red-500 mt-4'>Persoon is niet opgeslagen</p>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>

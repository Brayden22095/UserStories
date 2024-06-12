<?php
include("../../src/klantenbeheer.php");

if (isset($_GET['id'])) {
    $klantenbeheer = new Klantenbeheer();
    $klantenData = $klantenbeheer->getCustomer($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantgegevens</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mt-10">
        <div class="p-8">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Klantgegevens</h1>
            <?php if ($klantenData) : ?>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Naam:</label>
                        <p class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded"><?php echo htmlspecialchars($klantenData[0]['Naam']); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email:</label>
                        <p class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded"><?php echo htmlspecialchars($klantenData[0]['Email']); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefoon:</label>
                        <p class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded"><?php echo htmlspecialchars($klantenData[0]['TelefoonNummer']); ?></p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Klus:</label>
                        <p class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded"><?php echo htmlspecialchars($klantenData[0]['Tekst']); ?></p>
                    </div>
                    <form action="update_klus_status.php" method="post">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Klus afgerond (ja of nee):</label>
                            <div class="mt-2">
                            <input type="radio" name="klus_afgerond" value="ja" id="klus_ja" class="mr-2" <?php echo ($klantenData[0]['status'] === 'ja') ? 'checked' : ''; ?>>
<label for="klus_ja">Ja</label>
<input type="radio" name="klus_afgerond" value="nee" id="klus_nee" class="ml-4 mr-2" <?php echo ($klantenData[0]['status'] === 'nee') ? 'checked' : ''; ?>>
<label for="klus_nee">Nee</label>

                            </div>
                        </div>
                        <input type="hidden" name="klant_id" value="<?php echo htmlspecialchars($klantenData[0]['id']); ?>">
                        <div class="mt-4">
                            <input type="submit" value="Update Status" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        </div>
                    </form>
                </div>
                <div class="mt-6 flex space-x-4">
                    <a href="update.php?id=<?php echo htmlspecialchars($klantenData[0]['id']); ?>" class="flex-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                        Bewerken
                    </a>
                    <a href="index.php?id=<?php echo htmlspecialchars($klantenData[0]['id']); ?>" class="flex-1 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-center">
                        Hoofd pagina
                    </a>
                </div>
            <?php else : ?>
                <p class="text-red-500">Klant niet gevonden.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

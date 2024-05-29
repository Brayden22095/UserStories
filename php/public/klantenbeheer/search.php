<?php
include("../../src/klantenbeheer.php");

if (isset($_GET['search']) && isset($_GET['criteria'])) {
    $searchQuery = $_GET['search'];
    $searchCriteria = $_GET['criteria'];

    $klantenbeheer = new klantenbeheer();
    
    // Perform search based on the selected criteria
    switch ($searchCriteria) {
        case 'id':
            $results = $klantenbeheer->searchCustomersById($searchQuery);
            break;
        case 'naam':
            $results = $klantenbeheer->searchCustomersByName($searchQuery);
            break;
        case 'email':
            $results = $klantenbeheer->searchCustomersByEmail($searchQuery);
            break;
        case 'telefoonnummer':
            $results = $klantenbeheer->searchCustomersByTelefoonnummer($searchQuery);
            break;
        default:
            $results = array(); // No search results if criteria is invalid
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenbeheer</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-4xl font-semibold mb-6">Klantenbeheer</h1>

        <div class="mb-6 flex justify-between items-center">
            <form method="GET" class="flex-grow mr-4">
                <div class="flex items-center">
                    <select name="criteria" class="border p-2 rounded">
                        <option value="naam" <?php echo ($_GET['criteria'] ?? '') === 'naam' ? 'selected' : ''; ?>>Naam</option>
                        <option value="email" <?php echo ($_GET['criteria'] ?? '') === 'email' ? 'selected' : ''; ?>>Email</option>
                        <option value="telefoonnummer" <?php echo ($_GET['criteria'] ?? '') === 'telefoonnummer' ? 'selected' : ''; ?>>Telefoonnummer</option>
                        <option value="id" <?php echo ($_GET['criteria'] ?? '') === 'id' ? 'selected' : ''; ?>>ID</option>
                    </select>
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Zoekterm" 
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm"
                        value="<?php echo htmlspecialchars($searchQuery ?? '', ENT_QUOTES); ?>"
                    >
                    <button 
                        type="submit" 
                        class="ml-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600"
                    >
                        Zoek
                    </button>
                </div>
            </form>
            <a href="index.php" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600">
                Terug naar Home
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">ID</th>
                        <th class="py-2 px-4 border-b text-left">Naam</th>
                        <th class="py-2 px-4 border-b text-left">Email</th>
                        <th class="py-2 px-4 border-b text-left">Telefoon</th>
                        <th class="py-2 px-4 border-b text-center">Bekijken</th>
                        <th class="py-2 px-4 border-b text-center">Bewerken</th>
                        <th class="py-2 px-4 border-b text-center">Verwijderen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($results)) {
                        foreach ($results as $customer) {
                            echo "<tr class='hover:bg-gray-100'>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($customer['id'], ENT_QUOTES) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($customer['Naam'], ENT_QUOTES) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($customer['Email'], ENT_QUOTES) . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . htmlspecialchars($customer['TelefoonNummer'], ENT_QUOTES) . "</td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='detail.php?id=" . urlencode($customer['id']) . "' class='text-blue-500 hover:underline'>Bekijk</a></td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='bewerken.php?id=" . urlencode($customer['id']) . "' class='text-yellow-500 hover:underline'>Bewerken</a></td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='delete.php?id=" . urlencode($customer['id']) . "' class='text-red-500 hover:underline'>Verwijderen</a></td>";  
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='py-2 px-4 border-b text-center text-gray-500'>Geen resultaten gevonden</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

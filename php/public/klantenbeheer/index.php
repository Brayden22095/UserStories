<?php
session_start();

if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    $username = $_SESSION["username"];
} else {
    header("Location: login.php");
    exit;
}

include("../../src/klantenbeheer.php");

$customer = new klantenbeheer();
$allCustomers = $customer->getAllCustomers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">Dit is de website</h1>
        <p class="mb-4">Welkom op onze website: <span class="font-semibold"><?php echo $username; ?></span>!</p>
        <div class="flex justify-between items-center mb-4">
            <div>
                <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
                <a href="save.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Klanten toevoegen</a>
            </div>
            <form method="GET" action="search.php" class="flex items-center space-x-2">
                <select name="criteria" class="border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-blue-500">
                    <option value="naam">Naam</option>
                    <option value="email">Email</option>
                    <option value="telefoonnummer">Telefoonnummer</option>
                    <option value="id">ID</option>
                </select>
                <input type="text" name="search" placeholder="Zoekterm" class="border border-gray-300 px-4 py-2 rounded focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Zoeken</button>
            </form>
        </div>
        <h1 class="text-2xl font-semibold mb-4">Klanten</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">ID</th>
                        <th class="py-2 px-4 border-b text-left">Naam</th>
                        <th class="py-2 px-4 border-b text-left">Email</th>
                        <th class="py-2 px-4 border-b text-left">Telefoon</th>
                        <th class="py-2 px-4 border-b">Bekijken</th>
                        <th class="py-2 px-4 border-b">Bewerken</th>
                        <th class="py-2 px-4 border-b">Verwijderen</th>
                        <th class="py-2 px-4 border-b">Factuur</th>
                        <th class="py-2 px-4 border-b text-center">Bekijken</th>
                        <th class="py-2 px-4 border-b text-center">Bewerken</th>
                        <th class="py-2 px-4 border-b text-center">Verwijderen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($allCustomers) {
                        foreach ($allCustomers as $customer) {
                            echo "<tr class='hover:bg-gray-100'>";
                            echo "<td class='py-2 px-4 border-b'>" . $customer['id'] . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $customer['Naam'] . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $customer['Email'] . "</td>";
                            echo "<td class='py-2 px-4 border-b'>" . $customer['TelefoonNummer'] . "</td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='detail.php?id=" . $customer['id'] . "' class='text-blue-500 hover:underline'>Bekijk</a></td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='bewerken.php?id=" . $customer['id'] . "' class='text-yellow-500 hover:underline'>Bewerken</a></td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='delete.php?id=" . $customer['id'] . "' class='text-red-500 hover:underline'>Verwijderen</a></td>";
                            echo "<td class='py-2 px-4 border-b text-center'><a href='factuur.php?id=" . $customer['id'] . "' class='text-green-500 hover:underline'>Factuur</a></td>";  

                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

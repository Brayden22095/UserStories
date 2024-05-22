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
        <div class="flex space-x-4 mb-4">
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
            <a href="save.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Klanten toevoegen</a>
        </div>
        <h1 class="text-2xl font-semibold mb-4">Klanten</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Naam</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Telefoon</th>
                        <th class="py-2 px-4 border-b">Bekijken</th>
                        <th class="py-2 px-4 border-b">Bewerken</th>
                        <th class="py-2 px-4 border-b">Verwijderen</th>
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
                            echo "<td class='py-2 px-4 border-b'><a href='detail.php?id=" . $customer['id'] . "' class='text-blue-500 hover:underline'>Bekijk</a></td>";
                            echo "<td class='py-2 px-4 border-b'><a href='update.php?id=" . $customer['id'] . "' class='text-yellow-500 hover:underline'>Bewerken</a></td>";
                            echo "<td class='py-2 px-4 border-b'><a href='delete.php?id=" . $customer['id'] . "' class='text-red-500 hover:underline'>Verwijderen</a></td>";  
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

<?php
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}

include("../../src/klantenbeheer.php");

$customer = new klantenbeheer();

if (isset($_GET['id'])) {
    $customerId = $_GET['id'];
    $customerData = $customer->getCustomer($customerId);

    if (!$customerData) {
        echo "Klant niet gevonden.";
        exit;
    }
} else {
    echo "Geen klant ID opgegeven.";
    exit;
}

if (isset($_POST['updateCustomer'])) {
    $customer->setId($customerId);
    $customer->setNaam($_POST['naam']);
    $customer->setEmail($_POST['email']);
    $customer->setTelefoonNummer($_POST['telefoonNummer']);

    if ($customer->updateCustomer($customerId) !== false) {
        echo "Klant is bijgewerkt.";
        header("Location: index.php");
        exit;
    } else {
        echo "Klant is niet bijgewerkt.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant bewerken</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Klant bewerken</h1>
        <form action="bewerken.php?id=<?php echo $customerId; ?>" method="post">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" value="<?php echo htmlspecialchars($customerData[0]['Naam']); ?>" required />
            <br />
            <label for="telefoonNummer">TelefoonNummer:</label>
            <input type="text" name="telefoonNummer" value="<?php echo htmlspecialchars($customerData[0]['TelefoonNummer']); ?>" required />
            <br />
            <label for="email">E-mail:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($customerData[0]['Email']); ?>" required />
            <br />
            <input type="submit" name="updateCustomer" value="Klant bijwerken">
        </form>
    </div>
</body>
</html>

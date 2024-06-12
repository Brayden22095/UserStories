<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="inlog.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@100;300;400;800&family=Raleway:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="hero">
        <div class="container">
            <h1>Login</h1>
            <form class="form-container" action="#" method="post">
                <input class="input" type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" id="gebruikersnaam">
                <br>
                <div class="wachtwoord">
                    <input class="input" type="password" name="wachtwoord" placeholder="Wachtwoord" id="wachtwoordveld"><i class="fas fa-eye icon" id="toggleIcon"></i>
                </div>
                <br>
                <div class="submit-container">
                    <input class="submit" type="submit" name="submit" value="Login">
                </div>
            </form>
            <div class="registreren">
                <p>Nog geen account?</p>
                <a href="#">Registreren</a>
            </div>
        </div>
        <div class="image"></div>
    </div>

    <script>
        document.getElementById('gebruikersnaam').focus();

        function toggleType() {
            var wachtwoordveld = document.getElementById('wachtwoordveld');
            var toggleIcon = document.getElementById('toggleIcon');
            if (wachtwoordveld.type === 'password') {
                wachtwoordveld.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                wachtwoordveld.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('toggleIcon').addEventListener('click', toggleType);
    </script>
</body>

</html>

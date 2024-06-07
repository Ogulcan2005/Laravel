<?php
// Gebruikersnaam en wachtwoord voor controle
$correctUsername = '99072519@mydavinci.nl';
$correctPassword = 'wachtwoord';

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Controleer of gebruikersnaam en wachtwoord zijn ingediend
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        // Controleer of de ingediende gegevens overeenkomen met de juiste gegevens
        if ($inputUsername === $correctUsername && $inputPassword === $correctPassword) {
            // Doorverwijzen naar program.php als inloggegevens juist zijn
            header('Location: program.php');
            exit();
        } else {
            echo 'Ongeldige gebruikersnaam of wachtwoord';
        }
    } else {
        echo 'Vul zowel gebruikersnaam als wachtwoord in.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>

    <h2>Inloggen</h2>
    
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Inloggen</button>
    </form>

</body>
</html>

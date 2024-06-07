<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>
<body>

<?php
$usernameErr = $emailErr = "";
$username = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    if (empty($username)) {
        $usernameErr = "Je moet je gebruikersnaam invullen.";
    }

    if (empty($email)) {
        $emailErr = "Je moet je e-mail invullen.";
    }

    if (empty($usernameErr) && empty($emailErr)) {
        echo 'Ingelogd! Gebruikersnaam: ' . $username . ', E-mail: ' . $email;
    }
}
?>

<h2>Inlogformulier</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Gebruikersnaam: <input type="text" name="username">
    <span style="color: red;"><?php echo $usernameErr; ?></span><br><br>
    E-mail: <input type="text" name="email">
    <span style="color: red;"><?php echo $emailErr; ?></span><br><br>
    <input type="submit" value="Inloggen">
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["naam"]) && isset($_POST["email"])) {
        $naam = htmlspecialchars($_POST["naam"], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

        echo "<h1>De ingevulde gegevens zijn:</h1>";
        echo "<p>Naam: $naam</p>";
        echo "<p>Emailadres: $email</p>";
    } else {
        echo "<h1>Fout</h1>";
        echo "<p>Er zijn geen gegevens ontvangen.</p>";
    }
} else {
    echo "<h1>Fout</h1>";
    echo "<p>De pagina kan alleen worden geopend via een POST-verzoek.</p>";
}
?>

</body>
</html>

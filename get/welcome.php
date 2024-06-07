<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["naam"]) && isset($_POST["email"])) {
        $naam = $_POST["naam"];
        $email = $_POST["email"];

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

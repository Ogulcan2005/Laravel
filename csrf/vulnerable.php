<!DOCTYPE html>
<html>
<head>
    <title>Kwetsbare CSRF Demo</title>
</head>
<body>
    <h1>Wijzig je wachtwoord</h1>
    <form action="vulnerable.php" method="POST">
        <label for="password">Nieuw wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Verzenden</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Wachtwoord "bijwerken"
        $new_password = $_POST['password'];
        echo "<p style='color:green;'>Wachtwoord succesvol gewijzigd naar: " . htmlspecialchars($new_password) . "</p>";
    }
    ?>
</body>
</html>

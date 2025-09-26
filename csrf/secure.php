<?php
session_start();

// Genereer een CSRF-token als deze niet bestaat
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beveiligde CSRF Demo</title>
</head>
<body>
    <h1>Wijzig je wachtwoord</h1>
    <form action="secure.php" method="POST">
        <!-- Voeg een CSRF-token toe -->
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <label for="password">Nieuw wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Verzenden</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Controleer of de CSRF-token geldig is
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('<p style="color:red;">Ongeldige CSRF-token!</p>');
        }

        // Wachtwoord "bijwerken"
        $new_password = $_POST['password'];
        echo "<p style='color:green;'>Wachtwoord succesvol gewijzigd naar: " . htmlspecialchars($new_password) . "</p>";
    }
    ?>
</body>
</html>

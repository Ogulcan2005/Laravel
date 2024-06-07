<?php
require "config.php";

if (isset($_POST["submit"])) {
    $student = $_POST["description"];
    $return_date = $_POST["buy_date"];

    $sql = "INSERT INTO devices (description, buy_date) VALUES (?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$student, $return_date]);
    
    // $query = "INSERT INTO devices VALUES('', '$device', '$date')";
    // $result = mysqli_query($pdo, $query);

    if ($result) {
        "<script>alert('Data Inserted Successfully');</script>";
    } else {
        "Error: " . $query . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Data toevoegen</title>
</head>
<body>
    <form action="" method="post" autocomplete="off">
        <label for="description">Device</label>
        <input type="text" name="description" required value="">
        
        <label for="buy_date">Datum</label>
        <input type="date" name="buy_date" required value="">
        
        <button type="submit" name="submit">toevoegen</button>
    </form>
</body>
</html>
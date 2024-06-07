<?php
require "config.php";

if (isset($_POST["submit"])) {
    $student = $_POST["studentnummer"];
    $return_date = $_POST["return_date"];

    $sql = "INSERT INTO rent (studentnummer, return_date) VALUES (?,?)";
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
        <label for="studentnummer">Student</label>
        <input type="text" name="studentnummer" required value="">
        
        <label for="return_date">Datum</label>
        <input type="date" name="return_date" required value="">
        
        <button type="submit" name="submit">toevoegen</button>
    </form>
</body>
</html>
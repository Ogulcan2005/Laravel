<?php
require "config.php";

// Query om het totale aantal beschikbare apparaten per type op te halen
$sql_device_count = "SELECT type, SUM(aantal) AS total_count FROM (SELECT type, COUNT(*) AS aantal FROM devices GROUP BY type) AS counted_devices GROUP BY type";
$stmt_device_count = $pdo->query($sql_device_count);
$device_counts = $stmt_device_count->fetchAll(PDO::FETCH_ASSOC);

// Verwerking van formulierinzending voor het toevoegen van een apparaat
if (isset($_POST["submit"])) {
    $student_rent = $_POST["studentnummer"];
    $return_date_rent = $_POST["return_date"];
    $start_date_rent = $_POST["start_date"];
    $buy_date_device = $_POST["buy_date"];
    $type_device = $_POST["type"];

    $sql_check_device = "SELECT device_id FROM devices WHERE type = ?";
    $stmt_check_device = $pdo->prepare($sql_check_device);
    $stmt_check_device->execute([$type_device]);
    $existing_device = $stmt_check_device->fetch(PDO::FETCH_ASSOC);

    if ($existing_device) {
        $device_id = $existing_device['device_id'];
        $sql_update_device = "UPDATE devices SET buy_date = ? WHERE device_id = ?";
        $stmt_update_device = $pdo->prepare($sql_update_device);
        $stmt_update_device->execute([$buy_date_device, $device_id]);
    } else {
        $sql_insert_device = "INSERT INTO devices (description, buy_date, type) VALUES (?, ?, ?)";
        $stmt_insert_device = $pdo->prepare($sql_insert_device);
        $stmt_insert_device->execute([$type_device, $buy_date_device, $type_device]);
        $device_id = $pdo->lastInsertId();
    }

    $sql_rent = "INSERT INTO rent (studentnummer, return_date, start_date, device_id) VALUES (?, ?, ?, ?)";
    $stmt_rent = $pdo->prepare($sql_rent);
    $stmt_rent->execute([$student_rent, $return_date_rent, $start_date_rent, $device_id]);

    if ($stmt_rent) {
        echo "<script>alert('Data Inserted Successfully');</script>";
    } else {
        echo "Error: " . $pdo->errorInfo()[2] . "<br>";
    }
}

// Verwerking van formulierinzending voor het verwijderen van een apparaat
if (isset($_POST["delete"])) {
    $delete_id = $_POST["delete_id"];

    $sql_delete_rent = "DELETE FROM rent WHERE device_id = ?";
    $stmt_delete_rent = $pdo->prepare($sql_delete_rent);
    $stmt_delete_rent->execute([$delete_id]);

    if ($stmt_delete_rent) {
        echo "<script>alert('Verhuurinformatie succesvol verwijderd');</script>";
    } else {
        echo "Error: " . $pdo->errorInfo()[2] . "<br>";
    }
}


// Query om alle gegevens op te halen
$sql_fetch_all = "SELECT rent.studentnummer, rent.return_date, rent.start_date, devices.device_id, devices.type, devices.description, devices.buy_date
                  FROM scanner.rent
                  JOIN scanner.devices ON rent.device_id = devices.device_id";

$stmt_fetch_all = $pdo->query($sql_fetch_all);
$data_all = $stmt_fetch_all->fetchAll(PDO::FETCH_ASSOC);
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

        <label for="type">Device</label>
        <select name="type" required>
            <?php foreach ($device_counts as $device): ?>
                <option value="<?php echo $device['type']; ?>">
                    <?php echo $device['type'] . ' (' . $device['total_count'] . ')'; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="return_date">Datum</label>
        <input type="date" name="return_date" required value="">

        <label for="buy_date">Return Datum</label>
        <input type="date" name="buy_date" required value="">
        
        <label for="start_date">Start Datum</label>
        <input type="date" name="start_date" required value="">

        <input type="hidden" name="description" value="">
        
        <button type="submit" name="submit">Toevoegen</button>
    </form>

    <h2>Alle gegevens in de database:</h2>
    <ul>
        <?php foreach ($data_all as $row): ?>
            <li>
                <strong>Studentnummer:</strong> <?php echo $row['studentnummer']; ?><br>
                <strong>Beschrijving:</strong> <?php echo $row['type']; ?><br>
                <strong>Terugkeerdatum:</strong> <?php echo $row['return_date']; ?><br>
                <strong>Aankoopdatum device:</strong> <?php echo $row['buy_date']; ?><br>
                <strong>Startdatum:</strong> <?php echo $row['start_date']; ?><br>

                <form action="" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['device_id']; ?>">
                    <button type="submit" name="delete">Verwijderen</button>
                </form>
            </li>
            <br>
        <?php endforeach; ?>
    </ul>
</body>
</html>


<?php
session_start();
if (!isset($_SESSION['username'])) header("Location: login.php");

$data_file = 'data.json';
$items = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

// Toevoegen
if(isset($_POST['add'])) {
    $items[] = [
        "title" => $_POST['title'],
        "description" => $_POST['description'],
        "image" => $_POST['image']
    ];
    file_put_contents($data_file, json_encode($items, JSON_PRETTY_PRINT));
}

// Verwijderen
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if(isset($items[$id])) {
        array_splice($items, $id, 1);
        file_put_contents($data_file, json_encode($items, JSON_PRETTY_PRINT));
    }
}
?>

<h1>CMS Beheer</h1>
<a href="index.php">Terug naar Portfolio</a>

<h2>Nieuwe content toevoegen</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Titel" required>
    <textarea name="description" placeholder="Beschrijving" required></textarea>
    <input type="text" name="image" placeholder="Image URL (optioneel)">
    <button type="submit" name="add">Toevoegen</button>
</form>

<h2>Bestaande content</h2>
<?php foreach($items as $id => $item): ?>
    <div>
        <h3><?php echo $item['title']; ?></h3>
        <p><?php echo $item['description']; ?></p>
        <a href="cms.php?delete=<?php echo $id; ?>">Verwijderen</a>
    </div>
<?php endforeach; ?>

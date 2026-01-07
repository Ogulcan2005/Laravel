<?php
session_start();
if (!isset($_SESSION['username'])) header("Location: login.php");

// Laad portfolio-items
$data_file = 'data.json';
$items = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];
?>

<h1>Mijn Portfolio</h1>
<a href="cms.php">CMS Beheer</a> | <a href="logout.php">Logout</a>

<?php foreach($items as $item): ?>
    <h2><?php echo $item['title']; ?></h2>
    <p><?php echo $item['description']; ?></p>
    <?php if(!empty($item['image'])): ?>
        <img src="<?php echo $item['image']; ?>" width="200">
    <?php endif; ?>
<?php endforeach; ?>

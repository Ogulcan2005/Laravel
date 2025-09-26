<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = "";
$name = $email = "";
$formValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formValid = true;

  if (empty($_POST["name"])) {
    $nameErr = "* Naam is verplicht";
    $formValid = false;
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "* E-mail is verplicht";
    $formValid = false;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Ongeldig e-mailadres";
      $formValid = false;
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Formulier Validatie Voorbeeld</h2>

<?php if (!$formValid): ?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Naam: <input type="text" name="name" value="<?php echo $name; ?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Verzenden">  
</form>
<?php else: ?>
  <h2>Jouw Invoer:</h2>
  <p><strong>Naam:</strong> <?php echo $name; ?></p>
  <p><strong>E-mail:</strong> <?php echo $email; ?></p>
<?php endif; ?>

</body>
</html>

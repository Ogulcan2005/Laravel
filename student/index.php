<?php
include_once 'connect.php'
?>



<?php
$select = $db->prepare("SELECT `voornaam`, `tussenvoegsel` FROM `student`");
$select->execute();
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $db_col = $row['voornaam'];
    $db_col2 = $row['tussenvoegsel'];
    echo "$db_col $db_col2<br>";
}
?>
<?php 
function langsteWoord($woorden) {
    $langste = '';
    
    foreach ($woorden as $woord) {
      if (strlen($woord) > strlen($langste)) {
        $langste = $woord;
      }
    }
    
    return $langste;
  }
  
  // Voorbeeldgebruik:
  $lijst = ['kat', 'hond', 'olifant'];
  $resultaat = langsteWoord($lijst);
  echo $resultaat; // Output: olifant
?>

<?php 

  function sort_lijst_asc($arr) {
    $to_sort = true;
    while ($to_sort) {
      $to_sort = false;
      for ($x = 0; $x < count($arr) - 1; $x++) {
        if ($arr[$x] > $arr[$x + 1]) {
          $temp = $arr[$x];
          $arr[$x] = $arr[$x + 1];
          $arr[$x + 1] = $temp;
          $to_sort = true;
        }
      }
    }
  
    return implode("," ,$arr);
  }
  

echo(sort_lijst_asc([5, 3, 2]));
echo("</br>");
echo(sort_lijst_asc([67, 15, 22, 68, 3]));
?>

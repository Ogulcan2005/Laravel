<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    <?php 
    $a = rand(1, 50);
    $b = rand(1, 50);
    $keer = $a*$b;
    $deel = $a/$b;
    $plus = $a+$b;
    $min = $a-$b;

    echo $a . "<br>";
    echo $b . "<br>";
    echo "keer som" . "<br>" ;
    echo $keer . "<br>";
    echo "deel som" . "<br>";
    echo $deel . "<br>";
    echo "plus som" . "<br>";
    echo $plus . "<br>";
    echo "min som" . "<br>";
    echo $min . "<br>"
    ?>

    <?php
    $getal = rand(1,10);
    
    for ($x = 1; $x <= 10; $x++) {
        $som = $getal * $x;
        echo $getal . " x " . $x . " = " . $som . "<br>";
    }
    ?>
    </body>
</html>
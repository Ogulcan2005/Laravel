<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    <?php 
    function lijst_optellen($numbers) {
        $sum = 0;
    
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $sum += $number;
            }
        }
        return $sum;
    }
    
     
    
    $getallenLijst = [1, 2, 3, 4];
    
    $result = lijst_optellen($getallenLijst);
    
    echo $result; // Output: 6
    ?>
    </body>
</html>
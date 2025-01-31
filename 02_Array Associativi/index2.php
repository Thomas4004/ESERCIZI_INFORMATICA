<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            function stampaArrayInTable($array, $modoStampa){
                if($modoStampa == 1){
                    $arrayAppoggio = $array;
                    echo "Array ordinato per valore chiave(rsort)<br>";
                    rsort($arrayAppoggio);
                    print_r($arrayAppoggio);
                    echo "<br>";
                }elseif($modoStampa == 2){
                    $arrayAppoggio = $array;
                    echo "Array ordinato per valore(asort)<br>";
                    asort($arrayAppoggio);
                    print_r($arrayAppoggio);
                    echo "<br>";
                }
            }
        ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            class ordinato{
                function stampaArrayInTable($array, $modoStampa){
                    if($modoStampa == 1){
                        $arrayAppoggio = $array;
                        //echo "Array ordinato per valore chiave(ksort)<br>";
                        ksort($arrayAppoggio);
                        //print_r($arrayAppoggio);
                        //echo "<br>";
                        return $arrayAppoggio;
                    }elseif($modoStampa == 2){
                        $arrayAppoggio = $array;
                        //echo "Array ordinato per valore(asort)<br>";
                        asort($arrayAppoggio);
                        //print_r($arrayAppoggio);
                        //echo "<br>";
                        return $arrayAppoggio;
                    }
                }
            }
        ?>
    </body>
</html>
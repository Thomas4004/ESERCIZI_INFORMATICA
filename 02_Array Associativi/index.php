<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            include ("index2.php");
            $N = 5;
            $vocali = array("a","e","i","o","u");
            $consonanti = array("b","c","d","f","g","h","l","m","n","p","q","r","s","t","v","z");
            $parola = array();
            for( $i = 0; $i < $N; $i++ ){
                $randVocale = rand(0, sizeof($vocali) -1);
                $randConsonante = rand(0, sizeof($consonanti) -1);
                if($i==0 || $i==2 || $i== 3){
                    $parola[$i] = $consonanti[$randConsonante];
                }else{
                    $parola[$i] = $vocali[$randVocale];
                }
            }
            echo "Array non ordinato<br>";
            print_r($parola);
            echo "<br>";
            stampaArrayInTable($parola, 1);
            stampaArrayInTable($parola, 2);
        ?>
    </body>
</html>
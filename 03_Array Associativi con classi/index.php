<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            include("index2.php");

            class ArrayAssociativo {
                
                function getParola(): array {
                    $N = 5;
                    $vocali = array("a","e","i","o","u");
                    $consonanti = array("b","c","d","f","g","h","l","m","n","p","q","r","s","t","v","z");
                    $parola = array();                                  
                    for ($i = 0; $i < $N; $i++) {
                        $randVocale = rand(0, count($vocali) - 1);
                        $randConsonante = rand(0, count($consonanti) - 1);
                        if ($i == 0 || $i == 2 || $i == 3) {
                            $parola[] = $consonanti[$randConsonante];
                        } else {
                            $parola[] = $vocali[$randVocale];
                        }
                    }
                    return $parola;
                }

                function filtra(array $parola) {
                    $consonanti = array("b","c","d","f","g","h","l","m","n","p","q","r","s","t","v","z");
                    $Y = $parola;
                    $keys = array_keys($parola);
                    for ($i = 1; $i < count($keys); $i++) {
                        for ($j = 0; $j < count($consonanti); $j++) {
                            if ($Y[$keys[$i]] == $consonanti[$j]) {
                                if ($Y[$keys[$i]] == $Y[$keys[$i - 1]]) {
                                    unset( $Y[$keys[$i] ] );
                                }
                            }
                        }
                    }
                    return $Y;
                }
            }

            $istanzaArray = new ArrayAssociativo();
            $istanzaOrdina = new Ordinato(); // Assicurati che la classe Ordinato sia definita
            $parola = $istanzaArray->getParola();
            $Y = $istanzaArray->filtra($parola);
            
            echo "Array non ordinato<br>";
            print_r($parola);
            echo "<br>";
            echo "Array non ordinato filtrato<br>";
            print_r($Y);
            echo "<br>";

            $arrayOrdinatoChiave = $istanzaOrdina->stampaArrayInTable($parola, 1);
            $arrayOrdinatoValore = $istanzaOrdina->stampaArrayInTable($parola, 2);
            echo "<br>";
            echo "Array ordinato per chiave";
            echo "<br>";
            print_r($arrayOrdinatoChiave);
            echo "<br>";
            echo "Array ordinato per chiave e filtrato";
            echo "<br>";
            $Y = $istanzaArray->filtra($arrayOrdinatoChiave);
            print_r($Y);
            echo "<br>";
            echo "Array ordinato per valore";
            echo "<br>";
            print_r($arrayOrdinatoValore);
            echo "<br>";
            echo "Array ordinato per valore e filtrato";
            echo "<br>";
            $Y = $istanzaArray->filtra($arrayOrdinatoValore);
            print_r($Y);
        ?>
    </body>
</html>

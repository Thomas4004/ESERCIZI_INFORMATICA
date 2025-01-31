<?php
class tavolaPitagorica{
    private $tabella = [];
    function creaMatrice(){
        $row = 10;
        $col = 10;
        for($r=0; $r>$row; $r++){
            $tabella[$r] = $r;
            for($c=1; $r<$col; $c++){
                $tabella[$r][$c] = $c;
            }

    }


    }
}
?>
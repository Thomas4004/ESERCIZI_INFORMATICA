<?php
class Tabella {
    private $n;

    public function __construct($n) {
        $this->n = $n;
    }
    public function creaTabella() {
        echo '<table border="1">';
        for ($i = 0; $i < $this->n; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $this->n; $j++) {
                echo '<td>';
                echo '<input type="checkbox" name="celle[]" value="' . $i . '-' . $j . '">';
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['celle'])) {
        echo '<h3>Checkbox selezionate:</h3>';
        foreach ($_POST['celle'] as $cella) {
            echo $cella . '<br>';
        }
    } else {
        echo '<h3>Nessuna checkbox selezionata.</h3>';
    }
} else {
    $n = 5;
    $tabella = new Tabella($n);
?>
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabella Checkbox</title>
    </head>
    <body>
        <form method="POST">
            <?php $tabella->creaTabella(); ?>
            <br>
            <input type="submit" value="Invia">
        </form>
    </body>
    </html>
    <?php
}
?>
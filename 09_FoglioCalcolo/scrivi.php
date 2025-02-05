<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (isset($data['data'])) {
        $fileContent = $data['data'];
        $fileName = 'dati_tabella.txt';

        if (file_put_contents($fileName, $fileContent)) {
            echo "Dati salvati correttamente su $fileName.";
        } else {
            echo "Errore durante il salvataggio dei dati.";
        }
    } else {
        echo "Nessun dato ricevuto.";
    }
}
?>

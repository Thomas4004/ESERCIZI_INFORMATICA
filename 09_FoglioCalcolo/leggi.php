<?php
$fileName = 'dati_tabella.txt';

if (file_exists($fileName)) {
    $fileContent = file_get_contents($fileName);
    $rows = explode("\n", trim($fileContent));
    $data = array_map(function ($row) {
        return explode(',', $row); 
    }, $rows);

    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>

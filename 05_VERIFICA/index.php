<?php
function funzione1() {
    $file = 'dati.txt';
    if (!file_exists($file)) {
        return "Il file 'dati.txt' non esiste."; //faccio un controllo per verificare se il file esiste
    }
    $righe = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numRighe = 0; //variabile che mi servirà per contare il numero di righe
    $numColonne = 0; //variabile che conterà le colonne
    foreach ($righe as $riga) { //scorro le righe
        $numRighe = $numRighe + 1; //conto le righe
        $colonne = explode(',', $riga);
        foreach ($colonne as $colonna) { // scorro le colonne
            if($numRighe == 1){ //faccio la conta delle colonne solamente se sono alla prima riga altrimenti le colonne verranno contate ogni volta che viene cambiata la riga
                $numColonne = $numColonne + 1;
            }
        }
    }
    return "Il numero totale delle righe è {$numRighe} mentre il numero delli colonne è {$numColonne}";
}
function funzione2() {
    $file = 'dati.txt';
    if (!file_exists($file)) {
        return "Il file 'dati.txt' non esiste";
    }
    $righe = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
    $table = "<table border='1'>"; //creo la tabella, metto i bordi spessi 1px altrimenti non ci sono bordi
    foreach ($righe as $riga) {
        $table .= "<tr>"; //creo la riga nella tabella
        $colonne = explode(',', $riga); //copio la colonna della riga corrispondente, il separatore è ',' in quando ogni dato del file è separato da ','
        foreach ($colonne as $colonna) { //scorro l'array colonne, che contiene i valori della riga corrispondente
            $table .= "<td>" . htmlspecialchars($colonna) . "</td>"; //aggiungo il dato alla tabella
        }
        $table .= "</tr>"; //chiudo la riga
    }
    $table .= "</table>";
    return $table;
}
function funzione3() {
    $file = 'dati.txt';
    if(!file_exists($file)) {
        return "Il file 'dati.txt' non esiste";
    }
    $righe = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $sommaMax = 0; //variabile che mi servirà per salvare la somma della riga
    $maxRiga = 1; //variabile che mi servirà per salvare il numero della riga con la somma massima, la imposto a 1 in quanto il file parte dalla riga 1 e non dalla riga 0
    foreach ($righe as $indice => $riga) { //scorro le righe
        $numeri = array_map('intval', explode(',', $riga)); //salvo tutta la riga nell'array numeri
        //array_map() la utilizzo per prelevare tutti i dati dalla riga e inserirli nell'array, come parametro utilizzo 'intval' in modo che mi prende solamente i valori di tipo intero, saltando quindi le parole
        //inoltre come parametro gli passso anche la riga non separata, quindi i numeri con anche il valore ',', grazie alla funzione explode vado a separare i valori passandogli quindi un array senza virgole
        $somma = array_sum($numeri); //sommo i valori contenuti nell'array
        if ($somma > $sommaMax) { //verifico se la somma della riga corrente è maggiore alla somma precedente(inizialmente uguale a 0)
            //la condizione è verificata solamente se viene trovata una riga con la somma maggiore di quella precedente
            //quindi per esempio se la somma della prima riga è 2 mentre quella della seconda è 3 allora entra, altrimenti salta alla prossima
            $sommaMax = $somma; //aggiorno la somma massima
            $maxRiga = $indice + 1; //aggiorno il numero della riga che ha la somma maggiore
        }
    }
    return "La riga con la somma maggiore è la numero {$maxRiga}, la somma dei numeri è {$sommaMax}";
}
function funzione4() {
    $file = 'dati.txt';
}
function funzione5() {
    $file = 'dati.txt';
    if (!file_exists($file)) {
        return "Il file 'dati.txt' non esiste";
    }
    $righe = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numRighe = 0;
    $appoggio = 0;
    foreach ($righe as $riga) {
        $numRighe = $numRighe + 1; //trovo il numero di righe, mi serve per verificare qual è l'ultima riga del file
    }
    foreach ($righe as $riga) {
        if($appoggio == $numRighe){ //verifico se mi trovo all'ultima riga del file
            $numeri = array_map('intval', explode(',', $riga)); //come nell'esercizio 3 prelevo e salvo in un array tutti i dati di tipo int contenuti nella riga
        }else if($appoggio < $numRighe){ //se appoggio è minore del numero di righe vuol dire che non sono ancora arrivato all'ultima riga, quindi continuo con il ciclo
            $appoggio = $appoggio + 1;
        }
    }
    //c'è da fare il grafico in js, dovrei passare i dati tramite una get allo script js e fare il grafico con canvas
}
function funzione6() {
    // Stabilisci numero di righe e colonne il più uguale possibile
    return "selezionato voce5";
}
$output = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $voceSelezionata = $_POST['voceSelezionata'];
  switch ($voceSelezionata) {
        case '1':
            $output = funzione1();
            break;
        case '2':
            $output = funzione2();
            break;
        case '3':
            $output = funzione3();
            break;
        case '4':
            $output = funzione4();
            break;
        case '5':
            $output = funzione5();
            break;
        case '6':
            $output = funzione6();
            break;
        default:
            $output = "Voce non valida!";
            break;
    }
} else{
    echo "Nessuna selezione fatta";
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Verifica PHP</title>
</head>
<body>
    <h1>Seleziona una voce</h1>
    <form method="post" action="">
        <select name="voceSelezionata">
            <option value="1">1) Comunica numero di righe e colonne</option>
            <option value="2">2) Leggi il file e mostralo in una table DOM</option>
            <option value="3">3) Comunica la riga la cui somma di numeri è maggiore</option>
            <option value="4">4) Agggiungi una riga con numeri casuali dopo la terza riga</option>
            <option value="5">5) Mostra istogramma usano i numeri dell'ultima riga</option>
            <option value="5">6) Crea il file parole.txt utilizzando solo le parole contenute nel file dati.txt</option>
        </select>
        <input type="submit" value="Seleziona">
    </form>
    <div>
        <h2>Risultato:</h2>
        <p><?php echo $output; ?></p>
    </div>
</body>
</html>

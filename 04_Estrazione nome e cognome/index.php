<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orario Docenti</title>
</head>
<body>
    <h1>Orario Docenti</h1>

    <?php
    class Orario {
        private $dati = []; // Dati caricati dal file
        private $docenti = []; // Elenco unico dei docenti

        /**
         * Carica i dati dal file fornito.
         * @param string $file Percorso del file da leggere.
         */
        public function caricaDati($file) {
            $righe = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($righe as $indice => $riga) {
                // Ignora la prima riga (header)
                if ($indice === 0) continue;

                $campi = explode(';', $riga);

                // Salta righe con dati incompleti
                if (count($campi) < 12) continue;

                // Aggiunge i dati in formato strutturato
                $this->dati[] = [
                    'numero' => $campi[0] ?? null,
                    'durata' => $campi[1] ?? null,
                    'frequenza' => $campi[2] ?? null,
                    'materia' => $campi[4] ?? null,
                    'docente' => trim(($campi[5] ?? '') . ' ' . ($campi[6] ?? '')),
                    'classe' => $campi[7] ?? null,
                    'aula' => $campi[8] ?? null,
                    'co_doc' => ($campi[11] ?? 'N') !== 'N' ? $campi[11] : null
                ];
            }
        }

        /**
         * Estrae un elenco unico di docenti dai dati caricati.
         */
        public function estraiDocenti() {
            foreach ($this->dati as $lezione) {
                if (!empty($lezione['docente'])) {
                    $this->docenti[$lezione['docente']] = true;
                }
            }
            // Mantiene solo le chiavi come array di docenti
            $this->docenti = array_keys($this->docenti);
        }

        /**
         * Mostra una tabella con l'elenco dei docenti.
         */
        public function mostraTabellaDocenti() {
            echo "<h2>Elenco Docenti</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Docenti</th></tr>";

            foreach ($this->docenti as $docente) {
                echo "<tr><td>" . htmlspecialchars($docente) . "</td></tr>";
            }

            echo "</table>";
        }

        /**
         * Mostra un elenco delle coppie in copresenza.
         */
        public function mostraCopresenze() {
            echo "<h2>Coppie in Copresenza</h2>";
            echo "<ul>";

            foreach ($this->dati as $lezione) {
                if (!empty($lezione['co_doc'])) {
                    $coppie = explode(',', $lezione['co_doc']);
                    echo "<li>" . implode(' e ', array_map('htmlspecialchars', $coppie)) . 
                         " nella classe " . htmlspecialchars($lezione['classe']) . 
                         " (" . htmlspecialchars($lezione['aula']) . ")</li>";
                }
            }

            echo "</ul>";
        }
    }

    // Percorso del file contenente i dati
    $file = 'EXP_COURS.txt';

    // Creazione dell'oggetto Orario e gestione dei dati
    $orario = new Orario();
    $orario->caricaDati($file);
    $orario->estraiDocenti();
    $orario->mostraTabellaDocenti();
    $orario->mostraCopresenze();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleria Quadri</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #2c3e50, #34495e);
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h3 {
            color: #ecf0f1;
        }

        form {
            margin-top: 20px;
            padding: 20px;
            background: rgba(44, 62, 80, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .grid {
            display: grid;
            gap: 10px;
        }

        .item {
            border: 2px solid #16a085;
            background: #34495e;
            border-radius: 8px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        }

        .item img {
            width: 250px;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            color: #ecf0f1;
        }

        button {
            padding: 10px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #16a085;
            color: #ecf0f1;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #1abc9c;
            transform: scale(1.05);
        }

        input[type="number"] {
            padding: 5px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
            background: #2c3e50;
            color: #ecf0f1;
        }

        input[type="number"]:focus {
            border-color: #16a085;
            outline: none;
        }
    </style>
</head>
<body>
    <?php
        $quadri = [
            1 => "Ariete", 2 => "Toro", 3 => "Gemelli", 4 => "Cancro", 5 => "Leone", 6 => "Vergine",
            7 => "Bilancia", 8 => "Scorpione", 9 => "Sagittario", 10 => "Capricorno", 11 => "Acquario", 12 => "Pesci"
        ];

        $scelte = [];
        $righe = 1; 

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!empty($_POST['quadri'])) {
                $scelte = $_POST['quadri'];
            }

            if (!empty($_POST['righe']) && is_numeric($_POST['righe']) && $_POST['righe'] > 0) {
                $righe = (int)$_POST['righe'];
            }
        }

        $colonne = !empty($scelte) ? ceil(count($scelte) / $righe) : 4; 
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div>
            <label for="righe">Numero di righe:</label>
            <input type="number" name="righe" id="righe" value="<?php echo htmlspecialchars($righe); ?>" min="1">
        </div>

        <div class="grid" style="grid-template-columns: repeat(<?php echo $colonne; ?>, 1fr);">
            <?php if (empty($scelte)): ?>
                <?php foreach ($quadri as $indice => $segno): ?>
                    <div class="item">
                        <img src="IMG/<?php echo $indice; ?>.jpg" alt="<?php echo htmlspecialchars($segno); ?>">
                        <label>
                            <input type="checkbox" name="quadri[]" value="<?php echo htmlspecialchars($segno); ?>" 
                                <?php echo in_array($segno, $scelte) ? 'checked' : ''; ?>>
                            <?php echo htmlspecialchars($segno); ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($quadri as $indice => $segno): ?>
                    <?php if (in_array($segno, $scelte)): ?>
                        <div class="item">
                            <img src="IMG/<?php echo $indice; ?>.jpg" alt="<?php echo htmlspecialchars($segno); ?>">
                            <p><?php echo htmlspecialchars($segno); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <br>
        <button type="submit">Conferma</button>
        <button type="reset" onclick="window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>'">Annulla</button>
    </form>

    <?php if (!empty($scelte)): ?>
        <h3>Segni scelti:</h3>
        <ul> 
            <?php foreach ($scelte as $segno): ?>
                <li><?php echo htmlspecialchars($segno); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esposizione Quadri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $zodiaco = [
            1 => "Ariete", 2 => "Toro", 3 => "Gemelli", 4 => "Cancro", 5 => "Leone", 6 => "Vergine",
            7 => "Bilancia", 8 => "Scorpione", 9 => "Sagittario", 10 => "Capricorno", 11 => "Acquario", 12 => "Pesci"
        ];

        $scelte = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['zodiaco']))
        {
            $scelte = $_POST['zodiaco']; 
        }
    ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="griglia">
        <?php if (empty($scelte)): ?>
            <?php foreach ($zodiaco as $indice => $segno): ?>
                <div class="elemento">
                    <img src="IMG/<?php echo $indice; ?>.jpg" alt="<?php echo htmlspecialchars($segno); ?>">
                    <label>
                        <input type="checkbox" name="zodiaco[]" value="<?php echo htmlspecialchars($segno); ?>" 
                            <?php echo in_array($segno, $scelte) ? 'checked' : ''; ?>>
                        <?php echo htmlspecialchars($segno); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php foreach ($zodiaco as $indice => $segno): ?>
                <?php if (in_array($segno, $scelte)): ?>
                    <div class="elemento">
                        <img src="IMG/<?php echo $indice; ?>.jpg" alt="<?php echo htmlspecialchars($segno); ?>">
                        <p><?php echo htmlspecialchars($segno); ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <br>
    <button type="submit">Conferma</button>
    <button action="<?php echo $_SERVER['PHP_SELF']; ?>">Annulla</button>
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
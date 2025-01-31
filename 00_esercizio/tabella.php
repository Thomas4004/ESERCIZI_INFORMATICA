<!DOCTYPE html>
<html>
<head>
<title>Tabella Pitagorica</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
  border: 1px solid black;
}

td.non-moltiplicato {
  background-color: white;
}

td.quadrato {
  background-color: yellow;
}

td.primo {
  background-color: lightblue;
}
</style>
</head>
<body>

<?php

class TabellaPitagorica {
  private $dimensione ;

  public function __construct($dimensione) {
    $this->dimensione = $dimensione;
  }

  public function generaTabella() {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>&nbsp;</th>";
    for ($i = 1; $i <= $this->dimensione; $i++) {
      echo "<th>$i</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 1; $i <= $this->dimensione; $i++) {
      echo "<tr>";
      echo "<th>$i</th>";
      for ($j = 1; $j <= $this->dimensione; $j++) {
        $numero = $i * $j;
        $classe = $this->getClassi($i, $j, $numero);
        echo "<td class='$classe'>$numero</td>";
      }
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }

  private function getClassi($i, $j, $numero) {
    $classi = "";
    if ($i == 1 || $j == 1) {
      $classi .= "non-moltiplicato ";
    }
    if ($i == $j) {
      $classi .= "quadrato ";
    }
    if ($this->eprimo($numero)) {
      $classi .= "primo ";
    }
    return $classi;
  }

  private function eprimo($numero) {
    if ($numero <= 1) {
      return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
      if ($numero % $i == 0) {
        return false;
      }
    }
    return true;
  }
}

$tabella = new TabellaPitagorica(15);
$tabella->generaTabella();

?>

</body>
</html>

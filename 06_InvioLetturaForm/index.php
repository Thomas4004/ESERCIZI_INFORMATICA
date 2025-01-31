<?php
class GestioneForm {
    private $n;
    public function  __construct() {
      
    }
    public function  creaComponenti(){
        // Questa funzione andrebbe scritta meglio, per esempio creare un metodo creaComponente(..)
        // oppure adirittura creare una classe Componente
        $output = '<table border=1>';
        // Campo Nome
        $output .= '<tr>';
        $output .= '<td><label for="nome">Nome:</label></td>';
        $output .= '<td><input type="text" id="nome" name="nome" ></td>';
        $output .= '</tr>';

        // Campo Cognome
        $output .= '<tr>';
        $output .= '<td><label for="cognome">Cognome:</label></td>';
        $output .= '<td><input type="text" id="cognome" name="cognome" ></td>';
        $output .= '</tr>';

        // Checkbox
        $output .= '<tr>';
        $output .= '<td><label>Interessi:</label></td>';
        $output .= '<td>';
        $output .= '<input type="checkbox" name="interessi[]" value="Sport"> Sport<br>';
        $output .= '<input type="checkbox" name="interessi[]" value="Musica"> Musica<br>';
        $output .= '<input type="checkbox" name="interessi[]" value="Arte"> Arte<br>';
        $output .= '</td>';
        $output .= '</tr>';

        // Radio button
        $output .= '<tr>';
        $output .= '<td><label>Scelta:</label></td>';
        $output .= '<td>';
        $output .= '<input type="radio" name="scelta[]" value="caldo" > Caldo<br>';
        $output .= '<input type="radio" name="scelta[]" value="giusto"> Giusto<br>';
        $output .= '<input type="radio" name="scelta[]" value="freddo"> Freddo<br>';
        $output .= '</td>';
        $output .= '</tr>';

        // Campi hidden
        $output .= '<tr style="display:none;">';
        $output .= '<td><label>Hidden 1:</label></td>';
        $output .= '<td><input type="hidden" name="segreto1" value="ABFCAA00"></td>';
        $output .= '</tr>';
        $output .= '<tr style="display:none;">';
        $output .= '<td><label>Hidden 2:</label></td>';
        $output .= '<td><input type="hidden" name="segreto2" value="154978345"></td>';
        $output .= '</tr>';

        // Campo Select
        $output .= '<tr>';
        $output .= '<td><label for="valutazione">Valutazione:</label></td>';
        $output .= '<td>';
        $output .= '<select id="valutazione" name="valutazione">';
        $output .= '<option value="eccellente">Eccellente</option>';
        $output .= '<option value="ottimo">Ottimo</option>';
        $output .= '<option value="buono">Buono</option>';
        $output .= '<option value="discreto">Discreto</option>';
        $output .= '<option value="sufficiente">Sufficiente</option>';
        $output .= '</select>';
        $output .= '</td>';
        $output .= '</tr>';

        $output .= '</table>';
        return $output;
}
    public function  invioForm(){
        $output = '<form method="POST">';
        $output .= $this->creaComponenti();
  
        $output .= '<br>';
        $output .= '<input type="submit" value="Invia">';
        $output .= '</form>';
        echo $output;
    }
    public function  letturaForm(){
       $this->leggiText();
       $this->leggiCheckBox();
       $this->leggiRadioButton();
       $this->leggiCampiHidden();
       $this->leggiSelect();
   }
    private function leggiText(){
         if (isset($_POST['nome'])) {
              echo "nome inserito=".$_POST['nome'];
         } else {
            $output = '<h3>Nome non selezionato</h3>';
         }
         echo "<br>";
         if (isset($_POST['cognome'])) {
              echo "Cognome inserito=".$_POST['cognome'];
         } else {
            $output = '<h3>c ognome non selezionato</h3>';
         }
         echo "<br>";
       
    }
    private function leggiCheckBox(){
           if (isset($_POST['interessi'])) {
            $output = '<h3>Checkbox selezionate:</h3>';
            foreach ($_POST['interessi'] as $cella) {
                $output .= $cella . '<br>';
        }
        } else {
            $output = '<h3>Nessuna checkbox selezionata.</h3>';
        }
        echo $output;
        echo "<br>";
         
    }
    private function leggiRadioButton(){
      // Lettura dei radio button
        if (isset($_POST['scelta'])) {
            $output = '<h3>Radio Button selezionato:</h3>';
            foreach ($_POST['scelta'] as $cella) {
                $output .= $cella . '<br>';
        }
        } else {
            $output = '<h3>Nessun radioButton selezionato.</h3>';
        }
        echo $output;
        echo "<br>";
          
    }
    private function leggiCampiHidden(){
        // Campi hidden
        if (isset($_POST['segreto1'])) {
              echo "campo segreto1 inserito=".$_POST['segreto1'];
         } 
         echo "<br>";
         if (isset($_POST['segreto2'])) {
              echo "campo segreto2 inserito".$_POST['segreto2'];
         } 
         echo "<br>";
    }
    private function leggiSelect(){
        if (isset($_POST['valutazione'])) {
            $output = '<h3>Opzione selezionata:'.$_POST['valutazione'].'</h3>';
        } 
        else {
            $output = '<h3>Nessuna selezione fatta.</h3>';
        }
        echo $output;
        echo "<br>";
     
    }
}
$GestioneForm = new GestioneForm();
if ($_SERVER['REQUEST_METHOD'] == 'POST')   $GestioneForm->letturaForm();
else $GestioneForm->invioForm();
 ?>
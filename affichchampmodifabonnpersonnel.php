<?php
require('connect.php');
$choix = $_GET['choixmodif'];
$sep = " SELECT * FROM abonnement WHERE tiers='personnel'";
if($selp = $connec -> query($sep)){
    while($selep = $selp -> fetch()){
if($choix == 'payant'){
    echo '<label for="montabonnemoismodifpersonnel" class="form-label">Montant de l\'abonnement par mois(30 jours)</label>
    <input type="text" class="form-control" id="montabonnemoismodifpersonnel" value="'.$selep["montabonne"].'">';

}else if($choix == 'gratuit'){

}
    }}
?>
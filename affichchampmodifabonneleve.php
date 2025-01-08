<?php
require('connect.php');
$choix = $_GET['choixmodif'];
$see = " SELECT * FROM abonnement WHERE tiers='eleves'";
if($sele = $connec -> query($see)){
    while($selee = $sele -> fetch()){
if($choix == 'payant'){
    echo '<label for="montabonnemoismodif" class="form-label">Montant de l\'abonnement par mois(30 jours)</label>
    <input type="text" class="form-control" id="montabonnemoismodif" value="'.$selee["montabonne"].'">';

}else if($choix == 'gratuit'){

}
    }}
?>
<?php
require('connect.php');
$choix = $_GET['choixabonne'];
if($choix == 'payant'){
    echo '<label for="montabonnemois" class="form-label">Montant de l\'abonnement par mois(30 jours)</label>
    <input type="text" class="form-control" id="montabonnemois">';

}else if($choix == 'gratuit'){

}
?>
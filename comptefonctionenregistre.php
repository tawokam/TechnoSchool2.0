<?php
require('connect.php');
$ve = "SELECT *,count(id_fonction) as nbre FROM fonction";
if($ver = $connec->query($ve)){
  while($vere = $ver->fetch()){
    $nbre = $vere['nbre'];
    if($nbre < 1){
    echo ' Aucune fonction n\'a été enregistrer pour le moment. Cliquer sur le bouton Ajouter ci-dessus pour ajouter une fonction';

    }else if($nbre >= 1){ 
    echo ucwords($nbre).' fonction(s) enregistrées pour le moment';
       
    }
  }
}

?>
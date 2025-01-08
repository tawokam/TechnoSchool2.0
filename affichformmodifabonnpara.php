<?php
require('connect.php');
echo '<div class="card" style="width:100%;">
<div class="card-body">
  <h5 class="card-title">Modification des paramètres d\'abonnement à la bibliothèque pour les élèves.</h5>';
$see = " SELECT * FROM abonnement WHERE tiers='eleves'";
if($sele = $connec -> query($see)){
    while($selee = $sele -> fetch()){
      ?>
<div class="col-md-12">
                  <label for="abonnebibliotheqmodif" class="form-label">L'abonnement à la bibliothèque est</label>
                  <select id="abonnebibliotheqmodif" class="form-select" onchange="affichchampmodifabonneleve()">
                    <option value="gratuit" <?php if($selee['typeabonne'] == 'gratuit'){echo 'selected';}else{} ?>>Gratuit</option>
                    <option value="payant" <?php if($selee['typeabonne'] == 'payant'){echo 'selected';}else{} ?>>Payant</option>;
                  </select>
                </div>
                <div class="col-md-12" id="choixmodifelevebibilioabonne">
                    <?php 
                    $choix = $selee['typeabonne'];
                    if($choix == 'payant'){
                        echo '<label for="montabonnemoismodif" class="form-label">Montant de l\'abonnement par mois(30 jours)</label>
                        <input type="text" class="form-control" value="'.$selee['montabonne'].'" id="montabonnemoismodif">';
                    
                    }else{}
                    ?>
                </div> 
                <br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertmodifparabonneelelve()">Enregistrer les modifications</button>
                </div> <br/>
                <div id="resultinsertabonnelevemodif"></div>       
      <?php
    }
}
 echo ' <h5 class="card-title">Modification des paramètres d\'abonnement à la bibliothèque pour le personnel</h5>';
  
$sep = " SELECT * FROM abonnement WHERE tiers='personnel'";
if($selp = $connec -> query($sep)){
    while($selep = $selp -> fetch()){
      ?>
<div class="col-md-12">
                  <label for="abonnebibliotheqmodifpersonnel" class="form-label">L'abonnement à la bibliothèque est</label>
                  <select id="abonnebibliotheqmodifpersonnel" class="form-select" onchange="affichchampmodifabonnpersonnel()">
                    <option value="gratuit" <?php if($selep['typeabonne'] == 'gratuit'){echo 'selected';}else{} ?>>Gratuit</option>
                    <option value="payant" <?php if($selep['typeabonne'] == 'payant'){echo 'selected';}else{} ?>>Payant</option>;
                  </select>
                </div>
                <div class="col-md-12" id="choixmodifpersonnelbibilioabonne">
                    <?php 
                    $choix = $selep['typeabonne'];
                    if($choix == 'payant'){
                        echo '<label for="montabonnemoismodif" class="form-label">Montant de l\'abonnement par mois(30 jours)</label>
                        <input type="text" class="form-control" value="'.$selep['montabonne'].'" id="montabonnemoismodif">';
                    
                    }else{}
                    ?>
                </div> 
                <br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertmodifparabonnepersonnel()">Enregistrer les modifications</button>
                </div> <br/>
                <div id="resultinsertabonnpersonnelmodif"></div>       
      <?php
    }
}

echo '</div></div>';
?>
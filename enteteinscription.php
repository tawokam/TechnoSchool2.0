<?php
$session = $_GET['session'];
?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des inscriptions</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listelevenregInscription()"><i class="bi bi-plus"></i> Nouvelle inscription</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listeleveinscript()"><i class="bi bi-receipt-cutoff"></i> Liste des élèves inscrits.</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportinscription.php?session=<?php echo $session;?>"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listelevemodifInscription()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listelevesuppInscription()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      
      </div>
      <br/>
      <div class="alert alert-dark" role="alert" id="searchcritereleve" style="display: flex;word-wrap:wrap">
      <div class="col-md-8" id="blocknbrelign">
      <span id="nbreeleveinscript">Nombre de ligne enregistrer</span>
      </div>&nbsp;&nbsp;&nbsp;
      <div class="col-md-4" id="searcheleveAinscript" style="display:none;padding:0px">
                <input type="text" class="form-control"  id="nomeleveAinscript" onkeyup="listelevenregInscription()" placeholder="nom de l'élève">
                </div>
       </div>
</div>
<?php

?>
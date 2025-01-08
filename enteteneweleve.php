<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des élèves</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="formneweleve()"><i class="bi bi-plus"></i> Ajouter</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listneweleve()"><i class="bi bi-receipt-cutoff"></i> Liste des élèves</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistelevenregistrer.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listnewelevemodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listnewelevesupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <div class="alert alert-dark" role="alert" id="searchcritereleve" style="display: flex;word-wrap:wrap">
      <div class="col-md-3">
      <span id="nbreelevenreg">Nombre de ligne enregistrer</span>
      </div>&nbsp;&nbsp;&nbsp;
                <div class="col-md-2">
                  <select id="sexeelevesearch" class="form-select" onchange="listneweleve()">
                    <option value="" selected>Sexe</option>
                    <option value="maxulin" >Maxulin</option>
                    <option value="feminin">Feminin</option>
                  </select>
                </div>
    &nbsp;&nbsp;&nbsp;
                <div class="col-md-2">
                <input type="text" class="form-control"  id="nomeleve" onkeyup="listneweleve()" placeholder="nom de l'élève">
                </div>
       </div>
<?php

?>
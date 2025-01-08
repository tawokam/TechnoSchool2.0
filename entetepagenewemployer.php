<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des employés</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="formnewemployer()"><i class="bi bi-plus"></i> Ajouter</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listemploye()"><i class="bi bi-receipt-cutoff"></i> Liste des employer</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistemployer.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listemployermodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listemployersupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <div class="alert alert-warning" role="alert" id="searchcritere" style="display: flex;word-wrap:wrap">
      Critères de recherche&nbsp;&nbsp;&nbsp;
                <div class="col-md-3">
                  <select id="sexeemployersearch" class="form-select" onchange="listemploye()">
                    <option value="" selected>Sexe</option>
                    <option value="maxulin" >Maxulin</option>
                    <option value="feminin">Feminin</option>
                  </select>
                </div>&nbsp;&nbsp;&nbsp;
                <div class="col-md-3">
                  <select id="diplomemployersearch" class="form-select" onchange="listemploye()">
                    <option value="" selected>Diplome</option>
                    <option value="BEPC" >BEPC</option>
                    <option value="CAP" >CAP</option>
                    <option value="PROBATOIRE">PROBATOIRE</option>
                    <option value="BACC">BACCALAUREAT</option>
                    <option value="BTS">BTS</option>
                    <option value="licence">LICENCE</option>
                    <option value="MASTER 2">MASTER 2</option>
                    <option value="DOCTORAT">DOCTORAT</option>
                  </select>
                </div>&nbsp;&nbsp;&nbsp;
                <div class="col-md-3">
                    <select id="fonctionemployersearch" class="form-select" onchange="listemploye()">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM fonction order by nom_fonction asc";
                    echo '<option value="">fonction</option>';
                    if($sel = $connec->query($se)){
                        while($sele = $sel->fetch()){
                           echo '<option value="'.$sele['id_fonction'].'">'.$sele['nom_fonction'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>
       </div>
<?php

?>
<?php
$session = $_GET['session'];
?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion de la scolarité</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listeleveInscriptScolarite()"><i class="bi bi-plus"></i> Nouveau versement</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listeleveScolarite()"><i class="bi bi-receipt-cutoff"></i> scolarité par élève</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportscolarite.php?session=<?php echo $session;?>"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listeleveScolaritemodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listeleveScolaritesupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      
      </div>
      <br/>
      <div class="alert alert-dark" role="alert" id="searchcriterelevescolarite" style="display: flex;word-wrap:wrap">
      <div class="col-md-8" id="blocknbrelignscolarite">
      <span id="nbreelevescolarite">Nombre de ligne enregistrer</span>
      </div>&nbsp;&nbsp;&nbsp;
      <div class="col-md-4" id="searcheleveAscolarite" style="display:none;padding:0px;">
                <input type="text" class="form-control"  id="nomeleveAscolarite" onkeyup="listeleveInscriptScolarite()" placeholder="nom de l'élève">
      </div>
      <div class="col-md-4" id="searchclassescolarite" style="margin-left: 20px;">
                <select id="rechercheclassescolarite" class="form-select" style="width: 100px;" onchange="listeleveInscriptScolarite()">
                    <option value="">Classe</option>
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM classe order by nom_classe asc";
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                           echo '<option value="'.$sele['id_classe'].'">'.$sele['nom_classe'].'</option>';
                        }
                    }
                    ?>
                  </select>
        </div>
       </div>
</div>
<?php

?>
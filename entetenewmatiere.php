<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des matières</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="formnewmatiere()"><i class="bi bi-plus"></i> Ajouter</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listmatiere()"><i class="bi bi-receipt-cutoff"></i> Liste des matières</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistmatiere.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listmatieremodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listmatieresupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <br/>
<div class="alert alert-dark" role="alert" id="comptmatiere" style="font-size:14px;padding-top:4px;padding-bottom:4px">
<div class="col-md-3">
                  <select id="typmatsearch" class="form-select" onchange="listmatiere()">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM typematiere order by nom_typmat asc";
                    echo '<option value="">Type de matière</option>';
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                           echo '<option value="'.$sele['id_typmat'].'">'.$sele['nom_typmat'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>      
    
</div>
<?php

?>
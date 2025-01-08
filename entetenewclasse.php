<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des classes</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="formnewclasse()"><i class="bi bi-plus"></i> Ajouter</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listclasse()"><i class="bi bi-receipt-cutoff"></i> Liste des classes</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistclasse.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listclassemodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listclassesupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <br/>
<div class="alert alert-dark" role="alert" id="comptclasse" style="font-size:14px;padding-top:4px;padding-bottom:4px">
<div class="col-md-2">
                  <select id="sectionsearch" class="form-select" onchange="listclasse()">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM tabsection order by nom_section asc";
                    echo '<option value="">section</option>';
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                           echo '<option value="'.$sele['id_section'].'">'.$sele['nom_section'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>      
    
</div>
<?php

?>
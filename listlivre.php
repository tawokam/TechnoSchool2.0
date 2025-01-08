<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Liste des livres de la bibliothèque</h5>
<form class="row g-3">
    <div class="col-md-4">
      <label for="nomlivrelist" class="form-label">Type de livre</label>
      <select id="typlivrelist" class="form-select" onchange="listlivrecriteres()">
                                              <?php
                                              require('connect.php');
                                              $se = "SELECT * FROM typelivre order by nom_typelivre asc";
                                              echo '<option value="">...</option>';
                                              if($sel = $connec -> query($se)){
                                                  while($sele = $sel -> fetch()){
                                                     echo '<option value="'.$sele['id_typelivre'].'">'.$sele['nom_typelivre'].'</option>';
                                                }
                                              }
                    ?>
                                            </select>
</div>
<div class="col-md-4">
      <label for="etagerelivrelist" class="form-label">Étagère</label>
    <select id="etagerelivrelist" class="form-select" onchange="listlivrecriteres()">
                                              <?php
                                              require('connect.php');
                                              $se = "SELECT * FROM etageres order by nom_etagere asc";
                                              echo '<option value="">...</option>';
                                              if($sel = $connec -> query($se)){
                                                  while($sele = $sel -> fetch()){
                                                     echo '<option value="'.$sele['id_etagere'].'">'.$sele['nom_etagere'].'</option>';
                                                }
                                              }
                    ?>
                                            </select>
</div>
<div class="col-md-4">
      <label for="nomlivrelist" class="form-label">Nom du livre</label>
      <input type="text" class="form-control" id="nomlivrelist" placeholder="Recherche..." onkeyup="listlivrecriteres()">
</div></form><br>

<?php
echo '<div id="zonelistlivre">';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;border-collapse:collapse" border="1">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du livre</th><th>Type de livre</th><th>Etagère</th><th>Nombre de livre</th><th>Nombre emprunté</th><th>Nombre en bibliothèque</th></tr>
  </thead>';
  $n = 1;
$li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre";
if($liv = $connec -> query($li)){
    while($livr = $liv -> fetch()){
        $emprunte = $livr['nbrelivre'] - $livr['stock'];
        echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
        $n++;
    }
}
echo '</table>';
echo '</div>';
?>

</div></div>
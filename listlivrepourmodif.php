<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Liste des livres de la bibliothèque</h5>
  <div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
       Veuillez cliquer sur le livre que vous souhaitez modifier 
</div>
<form class="row g-3">
<div class="col-md-12">
      <label for="nomlivrelistpourmodif" class="form-label">Nom du livre</label>
      <input type="text" class="form-control" id="nomlivrelistpourmodif" placeholder="Recherche..." onkeyup="listlivremodifcomx()">
</div></form><br>

<?php
require('connect.php');
echo '<div id="zonelistlivrepourmodif">';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;border-collapse:collapse" border="1">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du livre</th><th>Type de livre</th><th>Etagère</th><th>Nombre de livre</th><th>Nombre emprunté</th><th>Nombre en bibliothèque</th></tr>
  </thead>';
  $n = 1;
$li = "SELECT livres.id_livre,livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre";
if($liv = $connec -> query($li)){
    while($livr = $liv -> fetch()){
        $emprunte = $livr['nbrelivre'] - $livr['stock'];
        echo '<tr class="linejustabsent" style="cursor:pointer" id="'.$livr['id_livre'].'" onclick="formlivremodif(this.id)"><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
        $n++;
    }
}
echo '</table>';
echo '</div>';
?>

</div></div>
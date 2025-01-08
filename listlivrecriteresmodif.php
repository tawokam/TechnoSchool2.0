<?php
require('connect.php');
$nomlivre = $_GET['nomlivre'];
$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;border-collapse:collapse" border="1">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du livre</th><th>Type de livre</th><th>Etagère</th><th>Nombre de livre</th><th>Nombre emprunté</th><th>Nombre en bibliothèque</th></tr>
  </thead>';
if($nomlivre == ''){
    $li = "SELECT livres.id_livre,livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr class="linejustabsent" style="cursor:pointer" id="'.$livr['id_livre'].'" onclick="formlivremodif(this.id)"><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($nomlivre != ''){
    $li = "SELECT livres.id_livre,livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.nom_livre like '%$nomlivre%'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr class="linejustabsent" style="cursor:pointer" id="'.$livr['id_livre'].'" onclick="formlivremodif(this.id)"><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}
echo '</table>';

?>
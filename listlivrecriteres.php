<?php
require('connect.php');
$typlivre = $_GET['typlivre'];
$etagere = $_GET['etagere'];
$nomlivre = $_GET['nomlivre'];
$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;border-collapse:collapse" border="1">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom du livre</th><th>Type de livre</th><th>Etagère</th><th>Nombre de livre</th><th>Nombre emprunté</th><th>Nombre en bibliothèque</th></tr>
  </thead>';
if($typlivre != '' && $etagere == '' && $nomlivre == ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_typelivre='$typlivre'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre != '' && $etagere != '' && $nomlivre == ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_typelivre='$typlivre' AND livres.id_etagere='$etagere'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre != '' && $etagere != '' && $nomlivre != ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_typelivre='$typlivre' AND livres.nom_livre LIKE '%$nomlivre%' AND livres.id_etagere='$etagere'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre == '' && $etagere != '' && $nomlivre == ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_etagere='$etagere'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre == '' && $etagere != '' && $nomlivre != ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_etagere='$etagere' AND livres.nom_livre LIKE '%$nomlivre%'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre == '' && $etagere == '' && $nomlivre != ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre where livres.nom_livre LIKE '%$nomlivre%'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre != '' && $etagere == '' && $nomlivre != ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre WHERE livres.id_typelivre='$typlivre' AND livres.nom_livre LIKE '%$nomlivre%'";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}else if($typlivre == '' && $etagere == '' && $nomlivre == ''){
    $li = "SELECT livres.nom_livre,livres.id_etagere,livres.id_typelivre,livres.nbrelivre,livres.stock,etageres.id_etagere,etageres.nom_etagere,typelivre.id_typelivre,typelivre.nom_typelivre FROM livres inner join etageres on livres.id_etagere=etageres.id_etagere inner join typelivre on livres.id_typelivre=typelivre.id_typelivre";
    if($liv = $connec -> query($li)){
        while($livr = $liv -> fetch()){
            $emprunte = $livr['nbrelivre'] - $livr['stock'];
            echo '<tr><td>'.$n.'</td><td>'.$livr['nom_livre'].'</td><td>'.$livr['nom_typelivre'].'</td><td>'.$livr['nom_etagere'].'</td><td>'.$livr['nbrelivre'].'</td><td>'.$emprunte.'</td><td>'.$livr['stock'].'</td></tr>';
            $n++;
        }
    }
}
echo '</table>';

?>
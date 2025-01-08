<?php
require('connect.php');
$search = $_GET['search'];

$n = 1;
$su = "DELETE FROM classe where selecte='check'";
if($sup = $connec->query($su)){

echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th colspan=2></th><th>N°</th><th> Nom de la classe</th><th>Montant scolarité</th><th>Montant inscription</th><th>Section</th></tr>
  </thead>';
if($search == ''){
    $se = "SELECT classe.id_classe,classe.nom_classe,classe.montinscription,classe.montscolarite,classe.id_section,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
             echo '<tr id="ligne'.$sele['id_classe'].'"><td><input class="form-check-input" id="'.$sele['id_classe'].'" onchange="listclasselectsupp(this.id)" style="border:1px solid blue" type="checkbox"></td><td style="cursor:pointer;color:gray;" id="'.$sele['id_classe'].'" onclick="suppUnClasse(this.id)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }
}else if($search != ''){
    $se = "SELECT classe.id_classe,classe.nom_classe,classe.montinscription,classe.montscolarite,classe.id_section,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section where classe.id_section='$search'";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
             echo '<tr id="ligne'.$sele['id_classe'].'"><td><input class="form-check-input" id="'.$sele['id_classe'].'" onchange="listclasselectsupp(this.id)" style="border:1px solid blue" type="checkbox"></td><td style="cursor:pointer;color:gray;" id="'.$sele['id_classe'].'" onclick="suppUnClasse(this.id)"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }
}
}
?>
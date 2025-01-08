<?php
require('connect.php');
$search = $_GET['search'];

$n = 1;
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de la classe</th><th>Montant scolarité</th><th>Montant inscription</th><th>Section</th></tr>
  </thead>';
if($search == ''){
    $se = "SELECT classe.id_section,classe.nom_classe,classe.montscolarite,classe.montinscription,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section = tabsection.id_section";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){

            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }
}else if($search != ''){
    $se = "SELECT classe.id_section,classe.nom_classe,classe.montscolarite,classe.montinscription,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section = tabsection.id_section where classe.id_section='$search'";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
          
            echo '<tr><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['montscolarite'].'</td><td>'.$sele['montinscription'].'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }
}

?>
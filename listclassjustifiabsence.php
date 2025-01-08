<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez sélectionner une classe pour avoir accès à la liste des élèves qui ont été absents à un ou plusieurs cours.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de la classe</th><th>Section</th></tr>
  </thead>';

    $se = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section = tabsection.id_section";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){

            echo '<tr id="'.$sele['id_classe'].'" onclick="listabsentjustifier(this.id)" style="cursor:pointer"><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['nom_section'].'</td></tr>';
            $n++;
        }
    }


?>
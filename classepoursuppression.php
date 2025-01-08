<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark" role="alert" style="font-size:12px">
Veuillez cliquer sur une classe pour voir la liste des enseignats programmés pour une suppression
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom classe</th><th>Section</th>
  </thead>';
$se = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section order by classe.id_section asc";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr id="'.$sele['id_classe'].'" style="cursor:pointer" onclick="profprogrammesupp(this.id)"><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['nom_section'].'</td></tr>';
        $n++;
    }
}
echo '</table>';

  
?>
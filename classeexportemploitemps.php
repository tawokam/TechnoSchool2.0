<?php
require('connect.php');
$n = 1;
echo '<div class="alert alert-dark bg-secondary" role="alert" style="font-size:12px">
<i class="bi bi-arrow-right text-light"> Veuillez cliquer sur une classe pour avoir la liste des professeurs programmés pour une modification
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary bg-primary">
  <tr><th>N°</th><th> Nom classe</th><th>Section</th><th>Exportation</th><tr>
  </thead>';
$se = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section order by classe.id_section asc";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){     
        echo '<tr><td>'.$n.'</td><td>'.$sele['nom_classe'].'</td><td>'.$sele['nom_section'].'</td><td ><a href="exporteemploiclasse.php?ident='.$sele['id_classe'].'" style="text-decoration:none"><i class="bi bi-download fw-bold text-success "> Exporter (Excel)</a></td></tr>';
        $n++;
    }
}
echo '</table>';

  
?>
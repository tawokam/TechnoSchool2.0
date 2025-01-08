<?php
require('connect.php');
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez cliquer sur une classe pour obtenir la liste des élèves de cette classe afin de leur attribuer une note séquentielle.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Section</th><th>Classe</th></tr>
  </thead>';
  $nbr = 1;
$se = 'SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section';
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
?>
        <tr id="<?php echo $sele['id_classe']; ?>" style="cursor: pointer;" onclick="listelevenote(this.id)"><td><?php echo $nbr;?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['nom_section'];?></td></tr>
<?php
$nbr++;
    }
}

?>
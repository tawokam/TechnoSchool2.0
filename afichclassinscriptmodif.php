<?php
require('connect.php');
$section = $_GET['section'];
$ident = $_GET['ident'];
$se = "SELECT * FROM classe where id_section = '$section'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     $class = $sele['id_classe'];
     ?>
  <option value="<?php echo $sele['id_classe'];?>"><?php echo $sele['nom_classe'];?></option>
     <?php
    }
}
?>
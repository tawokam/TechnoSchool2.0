<?php
require('connect.php');
$section = $_GET['section'];
echo '<option value="">Selectionnez une classe</option>';
$se = "SELECT * FROM classe where id_section='$section'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        echo '<option value="'.$sele['id_classe'].'">'.$sele['nom_classe'].'</option>';

    }
}
?>
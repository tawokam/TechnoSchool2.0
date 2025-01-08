<?php
require('connect.php');
$sexe = $_GET['sexe'];
$nom = $_GET['nom'];

if($sexe == '' && $nom == ''){
    $se = "SELECT *,count(id_eleve) as nbre FROM eleves ";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
            $nbre = $sele['nbre'];
       if($nbre < 1){
        echo 'Aucun élève enregistrer';
       }else if($nbre >= 1){
        echo $nbre.' élève(s) enregistrés';
       }
        }
    }
}else if($sexe != '' && $nom == ''){
    $se = "SELECT *,count(id_eleve) as nbre FROM eleves where sexe_eleve='$sexe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
            $nbre = $sele['nbre'];
            if($nbre < 1){
                echo 'Aucun élève enregistrer';
               }else if($nbre >= 1){
                echo $nbre.' élève(s) enregistrés';
               }
        }
    }
}else if($sexe == '' && $nom != ''){
    $se = "SELECT *,count(id_eleve) as nbre FROM eleves where nom_eleve LIKE '%$nom%'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
            $nbre = $sele['nbre'];
            if($nbre < 1){
                echo 'Aucun élève enregistrer';
               }else if($nbre >= 1){
                echo $nbre.' élève(s) enregistrés';
               }
        }
    }
}else if($sexe != '' && $nom != ''){
    $se = "SELECT *,count(id_eleve) as nbre FROM eleves where nom_eleve LIKE '%$nom%' AND sexe_eleve='$sexe'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
            $nbre = $sele['nbre'];
            if($nbre < 1){
                echo 'Aucun élève enregistrer';
               }else if($nbre >= 1){
                echo $nbre.' élève(s) enregistrés';
               }
        }
    }
}
echo '</table>';
?>
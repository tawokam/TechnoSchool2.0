<?php

//caché les erreurs généré par php
error_reporting(E_ALL);
ini_set("display_errors",0);

require('connect.php');
$nomeleve = htmlspecialchars($_POST['nomeleve']);
$prenomeleve = htmlspecialchars($_POST['prenomeleve']);
$matriculeleve = htmlspecialchars($_POST['matriculeleve']);
$datenaisseleve = htmlspecialchars($_POST['datenaisseleve']);
$lieunaisseleve = htmlspecialchars($_POST['lieunaisseleve']);
$sexeleve = htmlspecialchars($_POST['sexeleve']);
$nationalite = htmlspecialchars($_POST['nationalite']);
$adresse = htmlspecialchars($_POST['adresse']);
$maladie = htmlspecialchars($_POST['maladie']);
$apteEPS = htmlspecialchars($_POST['apteEPS']);
$autreinfo = htmlspecialchars($_POST['autreinfo']);
$nompere = htmlspecialchars($_POST['nompere']);
$telephonepere = htmlspecialchars($_POST['telephonepere']);
$nomere = htmlspecialchars($_POST['nomere']);
$telephonemere = htmlspecialchars($_POST['telephonemere']);
$nomtitteur = htmlspecialchars($_POST['nomtitteur']);
$phonetitteur = htmlspecialchars($_POST['phonetitteur']);
$datentreeleve = date('Y/m/d');
$namephotoeleve = $_FILES['photoeleve']['name'];
if($nomeleve == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom de l\'élève, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($matriculeleve == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le matricule de l\'élève, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($sexeleve == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez selectionnez le sexe de l\'élève, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else{
if($namephotoeleve){
    $ve = "SELECT *,count(id_eleve) as nbre FROM eleves where matricule='$matriculeleve'";
    if($ver = $connec -> query($ve)){
        while($veri = $ver ->fetch()){
     $nbre = $veri['nbre'];
     if($nbre < 1){     
if(move_uploaded_file($_FILES['photoeleve']['tmp_name'],"eleve/".$_FILES['photoeleve']['name'])){
    $in = "INSERT INTO eleves VALUES('','$nomeleve','$prenomeleve','$matriculeleve','$datenaisseleve','$lieunaisseleve','$datentreeleve','$sexeleve','$nationalite','$adresse','$maladie','$apteEPS','$autreinfo','$namephotoeleve','$nompere','$telephonepere','$nomere','$telephonemere','$nomtitteur','$phonetitteur','')";
    if($ins = $connec -> exec($in)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvel élève enregistré avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Problème de connexion. Veuillez recommencer, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Problème de connexion. Veuillez recommencer, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
}else if($nbre >= 1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Ce matricule a déjà été attribué à un autre élève.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
        }
}
}else{
    $ve = "SELECT *,count(id_eleve) as nbre FROM eleves where matricule='$matriculeleve'";
    if($ver = $connec -> query($ve)){
        while($veri = $ver ->fetch()){
     $nbre = $veri['nbre'];
     if($nbre < 1){     
    $in = "INSERT INTO eleves VALUES('','$nomeleve','$prenomeleve','$matriculeleve','$datenaisseleve','$lieunaisseleve','$datentreeleve','$sexeleve','$nationalite','$adresse','$maladie','$apteEPS','$autreinfo','','$nompere','$telephonepere','$nomere','$telephonemere','$nomtitteur','$phonetitteur','')";
    if($ins = $connec -> exec($in)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvel élève enregistré avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Problème de connexion. Veuillez recommencer, s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}else if($nbre >= 1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Ce matricule a déjà été attribué à un autre élève.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
}
        }

}
}         
?>
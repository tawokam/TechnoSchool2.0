<?php
require('connect.php');
$nomtypmatiere = ucwords($_POST['nomtypmatiere']);
if($nomtypmatiere == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le type de matière s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
    $se = "SELECT *,count(id_typmat) as nbre FROM typematiere where nom_typmat='$nomtypmatiere'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
         $nbre = $sele['nbre'];
         if($nbre < 1){
            $in = "INSERT INTO typematiere values('','$nomtypmatiere','')";
            if($ins = $connec -> query($in)){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Nouveau type de matière enregistré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';      
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Problème de connexion. veuillez réessayer s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
         }else if($nbre >= 1){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Ce type de matière a déja été enregistré <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
        }
    }

}
?>
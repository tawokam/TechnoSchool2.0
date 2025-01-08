<?php
require('connect.php');
$nomsection = ucwords($_POST['nomsection']);
if($nomsection == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veillez entrez la nouvelle section s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
    $se = "SELECT *,count(id_section) as nbre FROM tabsection where nom_section='$nomsection '";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
         $nbre = $sele['nbre'];
         if($nbre < 1){
            $in = "INSERT INTO tabsection values('','$nomsection','')";
            if($ins = $connec -> query($in)){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Nouvelle section enregistré avec succès <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';      
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Problème de connexion. veillez réessayer s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
         }else if($nbre >= 1){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Cette section a déja été enregistrer <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
        }
    }

}
?>
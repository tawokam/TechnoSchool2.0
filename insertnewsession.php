<?php
require('connect.php');
$nomsession = $_POST['nomsession'];
if($nomsession == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer la nouvelle session s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}else{
    $se = "SELECT *,count(id_session) as nbre FROM tabsession where nom_session='$nomsession'";
    if($sel = $connec -> query($se)){
        while($sele = $sel -> fetch()){
         $nbre = $sele['nbre'];
         if($nbre < 1){
            $up = "UPDATE tabsession SET statut='Desactiver'";
            if($upd = $connec -> query($up)){
                 $in = "INSERT INTO tabsession values('','$nomsession','','Activer')";
                if($ins = $connec -> query($in)){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Nouvelle session enregistrée avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';      
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Problème de connexion. veuillez réessayer s\'il vous plait <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
           
         }else if($nbre >= 1){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Cette session a déja été enregistrée <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
         }
        }
    }

}
?>
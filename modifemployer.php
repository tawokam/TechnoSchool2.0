<?php
require('connect.php');

$nomemployer = htmlspecialchars($_POST['nomemployer']);
$phone1employer = htmlspecialchars($_POST['phone1employer']);
$phone2employer = htmlspecialchars($_POST['phone2employer']);
$sexeemployer = htmlspecialchars($_POST['sexeemployer']);
$mailemployer = htmlspecialchars($_POST['mailemployer']);
$quartieremployer = htmlspecialchars($_POST['quartieremployer']);
$fonctionemployer = htmlspecialchars($_POST['fonctionemployer']);
$datenaissemployer = htmlspecialchars($_POST['datenaissemployer']);
$travaildepuisemployer = htmlspecialchars($_POST['travaildepuisemployer']);
$diplomemployer = htmlspecialchars($_POST['diplomemployer']);
$specialitemployer = htmlspecialchars($_POST['specialitemployer']);
$numerourgence = htmlspecialchars($_POST['numerourgence']);
$salaireemployer = htmlspecialchars($_POST['salaireemployer']);
$ident = $_POST['ident'];
$namephotocv = $_FILES['cvemployer']['name'];
if($nomemployer == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer le nom de l\'employé s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}else if($phone1employer == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer un numéro dans téléphone 1. l\'employer utilisera ce numéro pour se connecter<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}
else if($fonctionemployer == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez choisir la fonction de l\'employé s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'; 
}
else{
if($namephotocv){
        if(move_uploaded_file($_FILES['cvemployer']['tmp_name'],"employer/".$_FILES['cvemployer']['name'])){
            $in = "UPDATE employer SET nom_employer='$nomemployer',telephone1_employer='$phone1employer',telephone2_employer='$phone2employer',sexe_employer='$sexeemployer',adresseMail_employer='$mailemployer',quartier_employer='$quartieremployer',id_fonction='$fonctionemployer',datenaiss_employer='$datenaissemployer',travaildepuis='$travaildepuisemployer',grandiplome='$diplomemployer',specialitediplome='$specialitemployer',cv_employer='$namephotocv',numerourgence='$numerourgence',salaireemployer='$salaireemployer' where id_employer='$ident'";
            if($ins = $connec->query($in)){
             echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Modification éffectuée avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
           
            }else{
             echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                 }
         }else{
             echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
         }

}else{
        $in = "UPDATE employer SET nom_employer='$nomemployer',telephone1_employer='$phone1employer',telephone2_employer='$phone2employer',sexe_employer='$sexeemployer',adresseMail_employer='$mailemployer',quartier_employer='$quartieremployer',id_fonction='$fonctionemployer',datenaiss_employer='$datenaissemployer',travaildepuis='$travaildepuisemployer',grandiplome='$diplomemployer',specialitediplome='$specialitemployer',numerourgence='$numerourgence',salaireemployer='$salaireemployer' where id_employer='$ident'";
        if($ins = $connec->query($in)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Modification éffectuée avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';    
        }else{
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
             }
     }
    }
?>
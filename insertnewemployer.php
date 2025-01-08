<?php
require('connect.php');
//caché les erreurs généré par php
error_reporting(E_ALL);
ini_set("display_errors",0);

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
$mdp = htmlspecialchars($_POST['mdpemployer']);
$salaireemployer = htmlspecialchars($_POST['salaireemployer']);
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
}else if($mdp == ''){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Veuillez entrer un mot de passe provisoire <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
else{
    $mdpemployer = md5($mdp);
if($namephotocv){
        if(move_uploaded_file($_FILES['cvemployer']['tmp_name'],"employer/".$_FILES['cvemployer']['name'])){
            $in = "INSERT INTO employer VALUES('','$nomemployer','$phone1employer','$phone2employer','$sexeemployer','$mailemployer','$quartieremployer','$fonctionemployer','$datenaissemployer','$travaildepuisemployer','$diplomemployer','$specialitemployer','$namephotocv','','$numerourgence','$salaireemployer','$mdpemployer','')";
            if($ins = $connec->exec($in)){
             echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvel employé enregistré avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
           
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
       $in = "INSERT INTO employer VALUES('','$nomemployer','$phone1employer','$phone2employer','$sexeemployer','$mailemployer','$quartieremployer','$fonctionemployer','$datenaissemployer','$travaildepuisemployer','$diplomemployer','$specialitemployer','','','$numerourgence','$salaireemployer','$mdpemployer','')";
        if($ins = $connec->exec($in)){
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Nouvel employé enregistré avec succès.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
       
        }else{
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Problème de connexion. Veuillez recommencer s\'il vous plait<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
             }
     }
    }
?>
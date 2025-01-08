<?php   
 require('connect.php');  
 $connec -> beginTransaction();
try
{

    $session   = $_POST['session'];
    $classe    = $_POST['classe'];
    $seqdepart = $_POST['seqdepart'];
    $seqarrive = $_POST['seqarrive'];
    $gardeNote = $_POST['gardeNote'];
    $date = date('Y/m/d');
    $noteInsert = 0;

    // nombre d'élèves inscrit dans la salle
    $se = $connec->prepare("SELECT count(matricule) as nbreIns FROM inscription WHERE nom_session='$session' AND id_classe='$classe'");
    if($se->execute()){
        while($sele = $se -> fetch()){
            $nbreInscript = $sele['nbreIns'];
        }
    }

    if($gardeNote == 'true')
    {
         // recuperation du matricule de tous les inscrit de la classe
        $se = $connec -> prepare("SELECT matricule FROM inscription WHERE nom_session='$session' AND id_classe='$classe'");
        if($se->execute()){
            while($sele = $se -> fetch()){
                $matricule = $sele['matricule'];

                 // parcour des matieres de la classe selectionné
                 $se2 = $connec -> prepare("SELECT programme.id_matiere,matieres.id_matiere,matieres.nom_matiere FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere  where programme.id_classe='$classe' AND nom_session='$session' group by programme.id_matiere");
                 if($se2->execute()){
                    while($sele2 = $se2 -> fetch()){
                    $matiere = $sele2['id_matiere'];

                // vérifi si l'eleve a une note a la matiere x pour la sequence de destination
                $se3 = $connec -> prepare("SELECT note FROM evaluation WHERE session='$session' AND id_classe='$classe' AND sequence='$seqarrive' AND matricule='$matricule' AND id_matiere='$matiere'");
                if($se3->execute()){
                    $siNote = $se3 -> rowCount();
                    if($siNote == 0){ // l'élève n'a pas encore de note a la matiere x

                       

                               
                                // recuperation de la note de l'élève a la sequence de depart sur la matiere x
                                $se4 = $connec -> prepare("SELECT note,coef FROM evaluation WHERE session='$session' AND id_classe='$classe' AND sequence='$seqdepart' AND matricule='$matricule' AND id_matiere='$matiere'");
                                if($se4->execute()){
                                    while($sele4 = $se4 -> fetch()){
                                        $NoteDepart = $sele4['note'];
                                        $CoefDepart = $sele4['coef'];
                                    } 
                                }
                                $in = $connec -> prepare("INSERT INTO evaluation VALUES('','$matricule','$classe','$seqarrive','$NoteDepart','$matiere','$CoefDepart','$date','$session')");
                                if($in->execute()){$noteInsert++;}
                            }else
                            {
                                // l'élève a déja une note a la sequence de destination et a cette matiere
                            } 
                        }

                       

                    }
                }
            }
        }
    }
    else if($gardeNote == 'false')
    {
        // supression de toutes les note de la sequence d'arrivé
        $dro = $connec -> prepare("DELETE FROM evaluation WHERE id_classe='$classe' AND session='$session' AND sequence='$seqarrive'");
        $dro -> execute();

         // recuperation du matricule de tous les inscrit de la classe
        $se = $connec -> prepare("SELECT matricule FROM inscription WHERE nom_session='$session' AND id_classe='$classe'");
        if($se->execute()){
            while($sele = $se -> fetch()){
                $matricule = $sele['matricule'];

                 // parcour des matieres de la classe selectionné
                 $se2 = $connec -> prepare("SELECT programme.id_matiere,matieres.id_matiere,matieres.nom_matiere FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere  where programme.id_classe='$classe' AND nom_session='$session' group by programme.id_matiere");
                 if($se2->execute()){
                    while($sele2 = $se2 -> fetch()){
                    $matiere = $sele2['id_matiere'];

                // vérifi si l'eleve a une note a la matiere x pour la sequence de destination
                $se3 = $connec -> prepare("SELECT note FROM evaluation WHERE session='$session' AND id_classe='$classe' AND sequence='$seqarrive' AND matricule='$matricule' AND id_matiere='$matiere'");
                if($se3->execute()){
                    $siNote = $se3 -> rowCount();
                    if($siNote == 0){ // l'élève n'a pas encore de note a la matiere x

                       

                               
                                // recuperation de la note de l'élève a la sequence de depart sur la matiere x
                                $se4 = $connec -> prepare("SELECT note,coef FROM evaluation WHERE session='$session' AND id_classe='$classe' AND sequence='$seqdepart' AND matricule='$matricule' AND id_matiere='$matiere'");
                                if($se4->execute()){
                                    while($sele4 = $se4 -> fetch()){
                                        $NoteDepart = $sele4['note'];
                                        $CoefDepart = $sele4['coef'];
                                    } 
                                }
                                $in = $connec -> prepare("INSERT INTO evaluation VALUES('','$matricule','$classe','$seqarrive','$NoteDepart','$matiere','$CoefDepart','$date','$session')");
                                if($in->execute()){$noteInsert++;}
                            }else
                            {
                                // l'élève a déja une note a la sequence de destination et a cette matiere
                            } 
                        }

                       

                    }
                }
            }
        }
    }
    $connec -> commit();
    $data = array(
        "NbreEleveInscrit" => $nbreInscript,
        "DataInsert" => $noteInsert,
        "Message" => 'success'
        );
          // convertir le tableau en JSON
  $json_data = json_encode($data);
                    
  // Afficher le JSON
  echo $json_data;
}
catch(Exception $ex){
    $connec -> rollback();
    $data = array(
        "Message" => 'Echec '.$ex
        );
          // connecvertir le tableau en JSON
  $json_data = json_encode($data);
                    
  // Afficher le JSON
  echo $json_data;
}
?>
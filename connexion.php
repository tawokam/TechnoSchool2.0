<?php
try{
 if(require('connect.php'))
 {
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    $passwordMD5 = md5($password);
    $date = array();
    $se="SELECT fonction.nom_fonction,fonction.inscription,fonction.scolarite,fonction.gest_enseignent,fonction.discipline_eleves,fonction.enseignement,employer.id_employer FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction WHERE employer.telephone1_employer ='$phone' AND employer.mdpemployer='$passwordMD5'";
    if($sel = $connec -> query($se)){
        $nbre = $sel -> rowCount();
        if($nbre == 0){
            $orphelinat = array(
                "statut" => 'error',
                "id" => 'Données non valide. Veuillez reessayer svp', 
              );
            $data[] = $orphelinat;
        }else{
            while($sele = $sel -> fetch()){
                $inscrit = $sele['inscription'];
                $scolarite = $sele['scolarite'];
                $gestEnseignant = $sele['gest_enseignent'];
                $disciplineEleve = $sele['discipline_eleves'];
                $enseignement = $sele['enseignement'];
                $id = $sele['id_employer'];

                if($inscrit == 'NON' && $scolarite == 'NON' && $gestEnseignant == 'NON' && $disciplineEleve == 'NON' && $enseignement == 'OUI')
                {
                    $orphelinat = array(
                        "statut" => '1',
                        "id" => $id, 
                      );
                    $data[] = $orphelinat;  
                }else
                {
                    $orphelinat = array(
                        "statut" => '2',
                        "id" => $id, 
                      );
                    $data[] = $orphelinat; 
                }
            }
        }
       
    }


 }
   // Convertir le tableau en JSON
   $json_data = json_encode($data);
                    
   // renvoi le json
   echo $json_data;
}catch(Exception $ex){
    $orphelinat = array(
        "statut" => 'error',
        "id" => 'Serveur non disponible. Veuillez réessayer svp', 
      );
    $data[] = $orphelinat; 
      // Convertir le tableau en JSON
  $json_data = json_encode($data);
                    
  // renvoi le json
  echo $json_data;
}
?>
<?php
require('connect.php');
$matricule = $_GET['matricule'];
$session = $_GET['session'];

$se = "SELECT inscription.resteinscription,inscription.etatinscription,inscription.nom_session,inscription.id_classe,classe.id_classe,classe.nom_classe,eleves.matricule,eleves.nom_eleve,eleves.nationalite_eleve,eleves.adresse_eleve,eleves.sexe_eleve FROM inscription inner join classe on inscription.id_classe=classe.id_classe inner join eleves on inscription.matricule=eleves.matricule where inscription.nom_session='$session' AND inscription.matricule='$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $matricule = $sele['matricule'];
        ?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Payement de la scolarité de <span style="font-weight:bold;font-size:20px"><?php echo $sele['nom_eleve'] ?></span></h5>
              <form class="row g-3">
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
$mo = "SELECT * FROM scolarite where nom_session='$session' AND matricule='$matricule'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Monant a payé: '.$mont['montscolarite'].' Fcfa';
                        }
                       }
                    ?>
                  </label>
                </div>
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
                       $mo = "SELECT * FROM scolarite where nom_session='$session' AND matricule='$matricule'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Monant versé: '.$mont['montverse'].' Fcfa';
                        }
                       }
                    ?>
                  </label>
                </div>
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
                       $mo = "SELECT * FROM scolarite where nom_session='$session' AND matricule='$matricule'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Reste a versé: '.$mont['restescolarite'].' Fcfa';
                        }
                       }
                    ?>
                  </label>
                </div>
              </form>
              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-6">
                  <label for="nomeleveinscript" class="form-label">Nom de l'élève</label>
                  <input type="text" class="form-control" id="nomelevescolarite" value="<?php echo $sele['nom_eleve'] ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label for="matriculeinscript" class="form-label">Matricule</label>
                  <input type="text" class="form-control" id="matriculescolarite" value="<?php echo $sele['matricule'] ?>" readonly>
                </div>
                <div class="col-md-6">
                <?php 
                $ves = "SELECT * FROM inscription where matricule= '$matricule' AND nom_session='$session'";
                if($vesi = $connec -> query($ves)){
                  while($vesis = $vesi -> fetch()){
                               $idsec = $vesis['id_section'];
                              ?>
                              <label for="sectioninscript" class="form-label">Section</label>
                               <?php
                                $se = "SELECT * FROM tabsection where id_section='$idsec'";
                                if($sel = $connec -> query($se)){
                                    while($sele = $sel -> fetch()){
                                       echo '<input type="text"  class="form-control" id="sectioninscript" value="'.$sele['nom_section'].'" readonly>';
          }
                                }
      ?>
                              
                            
                  <?php
                             }
                  }
                
?>
                </div>
                <div class="col-md-6">
                  <label for="classeinscriptionauto" class="form-label">Classe de l'élève</label>
                <?php 
                $ves = "SELECT *,count(id_inscript) as nbreins FROM inscription where matricule= '$matricule' AND nom_session='$session'";
                if($vesi = $connec -> query($ves)){
                  while($vesis = $vesi -> fetch()){
                             $nbreinscrip = $vesis['nbreins'];
                             $idsecl = $vesis['id_classe'];
  

                                $se = "SELECT * FROM classe where id_classe='$idsecl'";
                                if($sel = $connec -> query($se)){
                                    while($sele = $sel -> fetch()){
                                       echo '<input type="text" class="form-control" id="classeinscriptionauto" value="'.$sele['nom_classe'].'" readonly>';
          }
                                }
      ?>
                              
                            
                  <?php
                             
                  }
                }
                
?>
                </div>
                <div class="col-md-6">
                  <label for="montapayeinscript" class="form-label">Montant a payer</label>
                  <?php 
                $veso = "SELECT *,count(id_scolarite) as nbrescol FROM scolarite where matricule= '$matricule' AND nom_session='$session'";
                if($vesio = $connec -> query($veso)){
                  while($vesiso = $vesio -> fetch()){
                             $nbreinscrip = $vesiso['nbrescol'];
                             $idrestins = $vesiso['restescolarite'];
                             if($nbreinscrip < 1){
                        $rcl = "SELECT inscription.nom_session,inscription.matricule,inscription.id_classe,classe.id_classe,classe.montscolarite FROM inscription inner join classe on inscription.id_classe = classe.id_classe where inscription.nom_session='$session' AND inscription.matricule='$matricule'";
                        if($recl = $connec -> query($rcl)){
                           while($reccl = $recl -> fetch()){
                 echo '<input type="text" class="form-control" id="montapayeinscript" value="'.$reccl['montscolarite'].'"  readonly>';
                           }
                        }
                 }else if($nbreinscrip >= 1){

                 echo '<input type="text" class="form-control" id="montapayeinscript" value="'.$idrestins.'"  readonly>';
     
                                }
                              }
                            }
                ?>  
                </div>
                <div class="col-md-6">
                  <label for="montverseinscript" class="form-label">Montant versé</label>
                  <input type="text" class="form-control" id="montversescolarite" >
                </div>
                  <div class="col-md-6">
                  <label for="dateinscript" class="form-label">Date de versement</label>
                  <input type="date" class="form-control" id="datescolarite" value="<?php echo date('Y-m-d'); ?>">
                </div>
                  <div class="col-md-6">
                  <label for="heureinscript" class="form-label">Heure de versement</label>
                  <input type="time" class="form-control" id="heurescolarite" value="<?php echo date('H:i'); ?>">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertScolarite()">Enregistrer le versement</button>
                </div><br/>
                <div id="resultinsertscolarite">

                </div>

            </div>
          </div>

        </div>



        <?php
    }
}
?>
<?php
require('connect.php');
$ident = $_GET['ident'];
$sessionencours = $_GET['sessionencours'];
$se = "SELECT * FROM eleves where id_eleve='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $matricule = $sele['matricule'];
        ?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Inscription de <span style="font-weight:bold;font-size:20px"><?php echo $sele['nom_eleve'] ?></span></h5>
              <form class="row g-3">
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
                       $mo = "SELECT * FROM inscription where matricule='$matricule' AND nom_session='$sessionencours'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Monant a payé: '.$mont['montinscription'].' Fcfa';
                        }
                       }
                    ?>
                  </label>
                </div>
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
                       $mo = "SELECT * FROM inscription where matricule='$matricule' AND nom_session='$sessionencours'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Monant versé: '.$mont['montverseinscription'].' Fcfa';
                        }
                       }
                    ?>
                  </label>
                </div>
                <div class="col-md-4">
                  <label for="nomclasse" class="form-label" style="font-weight:bold;color:gray">
                    <?php 
                       $mo = "SELECT * FROM inscription where matricule='$matricule' AND nom_session='$sessionencours'";
                       if($mon = $connec -> query($mo)){
                        while($mont = $mon -> fetch()){
                            echo 'Reste a versé: '.$mont['resteinscription'].' Fcfa';
                            $idsec = $mont['id_section'];
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
                  <input type="text" class="form-control" id="nomeleveinscript" value="<?php echo $sele['nom_eleve'] ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label for="matriculeinscript" class="form-label">Matricule</label>
                  <input type="text" class="form-control" id="matriculeinscript" value="<?php echo $sele['matricule'] ?>" readonly>
                </div>
                <div class="col-md-6">
                <?php 
                $ves = "SELECT *,count(id_inscript) as nbreins FROM inscription where matricule= '$matricule' AND nom_session='$sessionencours'";
                if($vesi = $connec -> query($ves)){
                  while($vesis = $vesi -> fetch()){
                             $nbreins = $vesis['nbreins'];
                            // $idsec = $vesis['id_section'];
                             if($nbreins < 1){
                                ?>
                                            <label for="sectioninscript" class="form-label">Section</label>
                                            <select id="sectioninscript" class="form-select" onchange="filtreclasse()">
                                              <?php
                                              $se = "SELECT * FROM tabsection order by nom_section asc";
                                              echo '<option value="">Selectionnez une section</option>';
                                              if($sel = $connec -> query($se)){
                                                  while($sele = $sel -> fetch()){
                                                     echo '<option value="'.$sele['id_section'].'">'.$sele['nom_section'].'</option>';
                        }
                                              }
                    ?>
                                            </select>
                                          
                                <?php
                             }else if($nbreins >= 1){
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
                }
?>
                </div>
                <div class="col-md-6">
                  <label for="classeinscriptionauto" class="form-label">Classe de l'élève</label>
                <?php 
                $ves = "SELECT *,count(id_inscript) as nbreins FROM inscription where matricule= '$matricule' AND nom_session='$sessionencours'";
                if($vesi = $connec -> query($ves)){
                  while($vesis = $vesi -> fetch()){
                             $nbreinscrip = $vesis['nbreins'];
                             $idsecl = $vesis['id_classe'];
                             if($nbreinscrip < 1){
                                ?>
                  <select id="classeinscriptionauto" class="form-select" onchange="montantclasseinscript()">
                       
                  </select>
                                                           
                  <?php
                             }else if($nbreinscrip >= 1){
    
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
                }
?>
                </div>
                <div class="col-md-6">
                  <label for="montapayeinscript" class="form-label">Montant a payer</label>
                  <?php 
                $veso = "SELECT *,count(id_inscript) as nbreins FROM inscription where matricule= '$matricule' AND nom_session='$sessionencours'";
                if($vesio = $connec -> query($veso)){
                  while($vesiso = $vesio -> fetch()){
                             $nbreinscrip = $vesiso['nbreins'];
                             $idrestins = $vesiso['resteinscription'];
                             if($nbreinscrip < 1){
                                ?>
                  <input type="text" class="form-control" id="montapayeinscript"  readonly>                                                           
                  <?php 
                 }else if($nbreinscrip >= 1){

                 echo '<input type="text" class="form-control" id="montapayeinscript" value="'.$idrestins.'"  readonly>';
     
                                }
                              }
                            }
                ?>  
                </div>
                <div class="col-md-6">
                  <label for="montverseinscript" class="form-label">Montant versé</label>
                  <input type="text" class="form-control" id="montverseinscript" >
                </div>
                <div class="col-md-6">
                  <label for="redoublantinscript" class="form-label">Redoublant(e) ??</label>
                  <select id="redoublantinscript" class="form-select">
                    <option value="non">NON</option>
                    <option value="oui">OUI</option>    
                  </select>
                </div>
                  <div class="col-md-6">
                  <label for="dateinscript" class="form-label">Date inscription</label>
                  <input type="date" class="form-control" id="dateinscript" value="<?php echo date('Y-m-d'); ?>">
                </div>
                  <div class="col-md-12">
                  <label for="heureinscript" class="form-label">Heure inscription</label>
                  <input type="time" class="form-control" id="heureinscript" value="<?php echo date('H:i'); ?>">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertinscription()">Enregistrer l'inscription</button>
                </div><br/>
                <div id="resultinsertinscription">

                </div>

            </div>
          </div>

        </div>



        <?php
    }
}
?>
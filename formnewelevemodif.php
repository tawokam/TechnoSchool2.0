<?php 
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM eleves where id_eleve='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){

 ?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de l'élève <span style="font-size:20px;font-weight:bold"><?php echo $sele['nom_eleve'];?></span></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">

                <div class="col-md-12">
                  <label for="nomelevemodif" class="form-label">Nom complèt de l'élève</label>
                  <input type="text" class="form-control" id="nomelevemodif" value="<?php echo $sele['nom_eleve'];?>" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="matriculelevemodif" class="form-label">Matricule de l'élève</label>
                  <input type="text" class="form-control" id="matriculelevemodif" value="<?php echo $sele['matricule'];?>">
                </div>
                <div class="col-md-6">
                  <label for="datenaisselevemodif" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="datenaisselevemodif" value="<?php echo $sele['datenaiss_eleve'];?>">
                </div>
                <div class="col-md-6">
                  <label for="datentreelevemodif" class="form-label">Date d'enregistrement.</label>
                  <input type="date" class="form-control" id="datentreelevemodif" value="<?php echo $sele['dateentre_eleve'];?>">
                </div>
                <div class="col-md-6">
                  <label for="sexelevemodif" class="form-label">Sexe de l'élève</label>
                  <select id="sexelevemodif" class="form-select">
                    <option value="">Sélectionnez le sexe de l'élève</option>
                    <option value="maxulin" <?php if($sele['sexe_eleve'] == 'maxulin'){echo 'selected';}else{} ?>>Maxulin</option>
                    <option value="feminin" <?php if($sele['sexe_eleve'] == 'feminin'){echo 'selected';}else{} ?>>Feminin</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="nationalitemodif" class="form-label">Nationalité</label>
                  <input type="text" class="form-control" value="camerounais(e)" value="<?php echo $sele['nationalite_eleve'];?>" id="nationalitemodif">
                </div>
                <div class="col-md-6">
                  <label for="adressemodif" class="form-label">Adresse</label>
                  <input type="text" class="form-control"  id="adressemodif" value="<?php echo $sele['adresse_eleve'];?>">
                </div>
                <div class="col-md-6">
                  <label for="maladiemodif" class="form-label">Maladie particulière</label>
                  <input type="text" class="form-control"  id="maladiemodif" value="<?php echo $sele['maladie_eleve'];?>">
                </div>
                <div class="col-md-6">
                  <label for="apteEPSmodif" class="form-label">Apte au cour d'EPS(Education Physique et Sportive) ??</label>
                  <select id="apteEPSmodif" class="form-select">
                    <option value="oui" <?php if($sele['apteeps'] == 'oui'){echo 'selected';}else{} ?>>OUI</option>
                    <option value="non" <?php if($sele['apteeps'] == 'non'){echo 'selected';}else{} ?>>Non</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="autreinfomodif" class="form-label">Autre informations ??</label>
                  <input type="text" class="form-control"  id="autreinfomodif" value="<?php echo $sele['autreinfo_eleve'];?>">
                </div>
                <div class="col-md-6">
                  <label for="photoelevemodif" class="form-label">
                    <?php
                    $foto = $sele['photo_eleve'];
                    if($foto == ''){
                        echo 'Photo: <span style="color:blue;font-weight:bold;font-size:14px">NON</span>. Importer la photo de l\'élève';
                    }else if($foto != ''){
                        echo 'Photo: <span style="color:blue;font-weight:bold;font-size:14px">OUI</span>. Changer la photo';
                    }
                    ?>
                  </label>
                  <input type="file" class="form-control"  id="photoelevemodif" accept="image/png, image/jpg, image/jpeg">
                </div>
                <div class="alert alert-info" role="alert" id="comptsession" style="font-size:14px">
                Informations supplémentaires concernant les parents et tuteur ou tutrice de l'élève
              </div>
              <div class="col-md-6">
                  <label for="nomperemodif" class="form-label">Nom du père</label>
                  <input type="text" class="form-control"  id="nomperemodif" value="<?php echo $sele['nompere'];?>">
                </div>
                <div class="col-md-6">
                  <label for="telephoneperemodif" class="form-label">Téléphone du père</label>
                  <input type="number" class="form-control"  id="telephoneperemodif" value="<?php echo $sele['telephonepere'];?>">
                </div>
                <div class="col-md-6">
                  <label for="nomeremodif" class="form-label">Nom de la mère</label>
                  <input type="text" class="form-control"  id="nomeremodif" value="<?php echo $sele['nomere'];?>">
                </div>
                <div class="col-md-6">
                  <label for="telephonemeremodif" class="form-label">Téléphone de la mère</label>
                  <input type="number" class="form-control"  id="telephonemeremodif" value="<?php echo $sele['telephonemere'];?>">
                </div>
                <div class="col-md-6">
                  <label for="nomtitteurmodif" class="form-label">Nom du tuteur ou tutrice</label>
                  <input type="text" class="form-control"  id="nomtitteurmodif" value="<?php echo $sele['nomtitteur'];?>">
                </div>
                <div class="col-md-6">
                  <label for="phonetitteurmodif" class="form-label">Téléphone du tuteur ou tutrice</label>
                  <input type="number" class="form-control"  id="phonetitteurmodif" value="<?php echo $sele['telephonetitteur'];?>">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_eleve'];?>" onclick="insertmodifeleve(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertmodifeleve">

                </div>

            </div>
          </div>

        </div>



 <?php

    }
}

?>

<?php
require('connect.php');
$ident = $_GET['ident'];
$no = "SELECT * FROM employer where id_employer='$ident'";
if($nom = $connec->query($no)){
    while($nome = $nom->fetch()){
  $fonction = $nome['id_employer'];
  $sicv = $nome['cv_employer'];
?>
<br/>
<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de l'employer <span style="font-weight:bold;font-size:20px"><?php echo ucwords($nome['nom_employer']); ?></span></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomemployersmodif" class="form-label">Nom complet de l'employer</label>
                  <input type="text" class="form-control" value="<?php echo $nome['nom_employer']; ?>" id="nomemployersmodif" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="phone1employermodif" class="form-label">Téléphone 1</label>
                  <input type="number" class="form-control" value="<?php echo $nome['telephone1_employer']; ?>" id="phone1employermodif">
                </div>
                <div class="col-md-6">
                  <label for="phone2employermodif" class="form-label">Téléphone 2 <i class="bi bi-whatsapp text-success"></i></label>
                  <input type="number" class="form-control" value="<?php echo $nome['telephone2_employer']; ?>" id="phone2employermodif">
                </div>
                <div class="col-md-6">
                  <label for="sexeemployermodif" class="form-label">Sexe</label>
                  <select id="sexeemployermodif" class="form-select">
                    <option value="maxulin" <?php $x=$nome['sexe_employer']; if($x=='maxulin'){echo 'selected';}else{} ?> >Maxulin</option>
                    <option value="feminin" <?php $x=$nome['sexe_employer']; if($x=='feminin'){echo 'selected';}else{} ?> >Feminin</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="mailemployermodif" class="form-label">Adresse mail</label>
                  <input type="mail" class="form-control" id="mailemployermodif" value="<?php echo $nome['adresseMail_employer']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="quartieremployermodif" class="form-label">Quartier de résidence</label>
                  <input type="text" class="form-control" id="quartieremployermodif" value="<?php echo $nome['quartier_employer']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="fonctionemployermodif" class="form-label">Fonction</label>
                  <select id="fonctionemployermodif" class="form-select">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM fonction order by nom_fonction asc";
                    if($sel = $connec->query($se)){
                        while($sele = $sel->fetch()){
                            $idf = $sele['id_fonction'];
                            $seo ='';
                            if($fonction ==  $idf){
                                $seo = 'selected';
                            }else{ $seo ='';}
                           echo '<option value="'.$sele['id_fonction'].'"'.$seo.'>'.$sele['nom_fonction'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="datenaissemployermodif" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="datenaissemployermodif" value="<?php echo $nome['datenaiss_employer']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="travaildepuisemployermodif" class="form-label">Travail ici depuis</label>
                  <select id="travaildepuisemployermodif" class="form-select">
                    <option value="1995" <?php $x=$nome['travaildepuis']; if($x=='1995'){echo 'selected';}else{} ?>>1995</option>
                    <option value="1996" <?php $x=$nome['travaildepuis']; if($x=='1996'){echo 'selected';}else{} ?>>1996</option>
                    <option value="1997" <?php $x=$nome['travaildepuis']; if($x=='1997'){echo 'selected';}else{} ?>>1997</option>
                    <option value="1998" <?php $x=$nome['travaildepuis']; if($x=='1998'){echo 'selected';}else{} ?>>1998</option>
                    <option value="1999" <?php $x=$nome['travaildepuis']; if($x=='1999'){echo 'selected';}else{} ?>>1999</option>
                    <option value="2000" <?php $x=$nome['travaildepuis']; if($x=='2000'){echo 'selected';}else{} ?>>2000</option>
                    <option value="2001" <?php $x=$nome['travaildepuis']; if($x=='2001'){echo 'selected';}else{} ?>>2001</option>
                    <option value="2002" <?php $x=$nome['travaildepuis']; if($x=='2002'){echo 'selected';}else{} ?>>2002</option>
                    <option value="2003" <?php $x=$nome['travaildepuis']; if($x=='2003'){echo 'selected';}else{} ?>>2003</option>
                    <option value="2004" <?php $x=$nome['travaildepuis']; if($x=='2004'){echo 'selected';}else{} ?>>2004</option>
                    <option value="2005" <?php $x=$nome['travaildepuis']; if($x=='2005'){echo 'selected';}else{} ?>>2005</option>
                    <option value="2006" <?php $x=$nome['travaildepuis']; if($x=='2006'){echo 'selected';}else{} ?>>2006</option>
                    <option value="2007" <?php $x=$nome['travaildepuis']; if($x=='2007'){echo 'selected';}else{} ?>>2007</option>
                    <option value="2008" <?php $x=$nome['travaildepuis']; if($x=='2008'){echo 'selected';}else{} ?>>2008</option>
                    <option value="2009" <?php $x=$nome['travaildepuis']; if($x=='2009'){echo 'selected';}else{} ?>>2009</option>
                    <option value="2010" <?php $x=$nome['travaildepuis']; if($x=='2010'){echo 'selected';}else{} ?>>2010</option>
                    <option value="2011" <?php $x=$nome['travaildepuis']; if($x=='2011'){echo 'selected';}else{} ?>>2011</option>
                    <option value="2012" <?php $x=$nome['travaildepuis']; if($x=='2012'){echo 'selected';}else{} ?>>2012</option>
                    <option value="2013" <?php $x=$nome['travaildepuis']; if($x=='2013'){echo 'selected';}else{} ?>>2013</option>
                    <option value="2014" <?php $x=$nome['travaildepuis']; if($x=='2014'){echo 'selected';}else{} ?>>2014</option>
                    <option value="2015" <?php $x=$nome['travaildepuis']; if($x=='2015'){echo 'selected';}else{} ?>>2015</option>
                    <option value="2016" <?php $x=$nome['travaildepuis']; if($x=='2016'){echo 'selected';}else{} ?>>2016</option>
                    <option value="2017" <?php $x=$nome['travaildepuis']; if($x=='2017'){echo 'selected';}else{} ?>>2017</option>
                    <option value="2018" <?php $x=$nome['travaildepuis']; if($x=='2018'){echo 'selected';}else{} ?>>2018</option>
                    <option value="2019" <?php $x=$nome['travaildepuis']; if($x=='2019'){echo 'selected';}else{} ?>>2019</option>
                    <option value="2020" <?php $x=$nome['travaildepuis']; if($x=='2020'){echo 'selected';}else{} ?>>2020</option>
                    <option value="2021" <?php $x=$nome['travaildepuis']; if($x=='2021'){echo 'selected';}else{} ?>>2021</option>
                    <option value="2022" <?php $x=$nome['travaildepuis']; if($x=='2022'){echo 'selected';}else{} ?>>2022</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="diplomemployermodif" class="form-label">Plus grand diplôme</label>
                  <select id="diplomemployermodif" class="form-select">
                    <option value="BEPC" <?php $x=$nome['grandiplome']; if($x=='BEPC'){echo 'selected';}else{} ?>>BEPC</option>
                    <option value="CAP" <?php $x=$nome['grandiplome']; if($x=='CAP'){echo 'selected';}else{} ?>>CAP</option>
                    <option value="PROBATOIRE" <?php $x=$nome['grandiplome']; if($x=='PROBATOIRE'){echo 'selected';}else{} ?>>PROBATOIRE</option>
                    <option value="BACC" <?php $x=$nome['grandiplome']; if($x=='BACC'){echo 'selected';}else{} ?>>BACCALAUREAT</option>
                    <option value="BTS" <?php $x=$nome['grandiplome']; if($x=='BTS'){echo 'selected';}else{} ?>>BTS</option>
                    <option value="licence" <?php $x=$nome['grandiplome']; if($x=='licence'){echo 'selected';}else{} ?>>LICENCE</option>
                    <option value="MASTER 2" <?php $x=$nome['grandiplome']; if($x=='MASTER 2'){echo 'selected';}else{} ?>>MASTER 2</option>
                    <option value="DOCTORAT" <?php $x=$nome['grandiplome']; if($x=='DOCTORAT'){echo 'selected';}else{} ?>>DOCTORAT</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="specialitemployermodif" class="form-label">Diplôme en (ex: informatique)</label>
                  <input type="text" class="form-control" id="specialitemployermodif" value="<?php echo $nome['specialitediplome']; ?>">
                </div>
                <div class="col-md-6">
                  <label for="cvemployermodif" class="form-label">CV :<?php if($sicv != ''){echo 'OUI. Changer le cv';}else if($sicv == ''){echo 'NON. Importer le cv';}  ?> <i class="bi bi-filetype-pdf"></i></label>
                  <input type="file" class="form-control" id="cvemployermodif" accept="image/pdf, image/docx">
                </div>
                <div class="col-md-6">
                  <label for="salaireemployermodif" class="form-label">Salaire (Ne rien mettre s'il s'agit d'un enseignant vacataire)</i></label>
                  <input type="number" class="form-control" id="salaireemployermodif" value="<?php echo $nome['salaireemployer']; ?>">
                </div>

                <div class="col-12">
                <label for="numerourgencemodif" class="form-label">Numéro de téléphone d'urgence</i></label>
                  <input type="number" class="form-control" id="numerourgencemodif" value="<?php echo $nome['numerourgence']; ?>">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $nome['id_employer']; ?>" onclick="modifemployer(this.id)">Valider la modification</button>
                </div><br/>
                <div id="resultinsertemployermodif">

                </div>

            </div>
          </div>

        </div>


<?php
    }
}
?>
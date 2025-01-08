<?php
require('connect.php');
$ident = $_GET['ident'];
$no = "SELECT * FROM classe where id_classe='$ident'";
if($nom = $connec -> query($no)){
    while($nome = $nom -> fetch()){
  $section = $nome['id_section'];
?>
<br/>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de <span style="font-weight:bold;font-size:20px"><?php echo $nome['nom_classe'] ?></span></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomclassemodif" class="form-label">Nom de la classe</label>
                  <input type="text" class="form-control" id="nomclassemodif" value="<?php echo $nome['nom_classe'] ?>" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="montscolaritemodif" class="form-label">Montant de la scolarité</label>
                  <input type="number" class="form-control" id="montscolaritemodif" value="<?php echo $nome['montscolarite'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="montinscriptionmodif" class="form-label">Montant de l'inscription</label>
                  <input type="number" class="form-control" id="montinscriptionmodif" value="<?php echo $nome['montinscription'] ?>">
                </div>
                <div class="col-md-12">
                  <label for="sectionclassemodif" class="form-label">Section</label>
                  <select id="sectionclassemodif" class="form-select">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM tabsection order by nom_section asc";
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                            $idsec = $sele['id_section'];
                            ?>
                           <option value="<?php echo $sele['id_section'];?>" <?php if($section == $idsec){echo 'selected';}else{}?>><?php echo $sele['nom_section'];?></option>
                        <?php
                        }
                    }
                    ?>
                  </select>
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $nome['id_classe'] ?>" onclick="insertmodifclasse(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertmodifclasse">

                </div>

            </div>
          </div>

        </div>



<?php
    }
}
?>
<?php
require('connect.php');
$ident = $_GET['ident'];
$no = "SELECT * FROM matieres where id_matiere='$ident'";
if($nom = $connec -> query($no)){
    while($nome = $nom -> fetch()){
  $typmat = $nome['id_typmat'];
?>
<br/>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de <span style="font-weight:bold;font-size:20px"><?php echo $nome['nom_matiere'] ?></span></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomatieremodif" class="form-label">Nom de la matiere</label>
                  <input type="text" class="form-control" id="nomatieremodif" value="<?php echo $nome['nom_matiere'] ?>" style="border:0.5px solid gray">
                </div>

                <div class="col-md-12">
                  <label for="typmatmodif" class="form-label">Type de matière</label>
                  <select id="typmatmodif" class="form-select">
                    <?php
                    $se = "SELECT * FROM typematiere order by nom_typmat asc";
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                            $idsec = $sele['id_typmat'];
                            ?>
                           <option value="<?php echo $sele['id_typmat'];?>" <?php if($typmat == $idsec){echo 'selected';}else{}?>><?php echo $sele['nom_typmat'];?></option>
                        <?php
                        }
                    }
                    ?>
                  </select>
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $nome['id_matiere'] ?>" onclick="insertmatieremodif(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertmodifmatiere">

                </div>

            </div>
          </div>

        </div>



<?php
    }
}
?>
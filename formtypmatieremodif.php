<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM typematiere where id_typmat='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){

     ?>
     
     <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification du type de matiere: <?php echo $sele['nom_typmat'];?></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">

                <div class="col-md-12">
                  <label for="nomtypmatmodif" class="form-label">Nom du type de matière</label>
                  <input type="text" class="form-control" id="nomtypmatmodif" value="<?php echo $sele['nom_typmat']; ?>" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_typmat'];?>" onclick="inserttypmatieremodif(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertypmatmodif">

                </div>

            </div>
          </div>

        </div>

     
     <?php
    }
}
?>
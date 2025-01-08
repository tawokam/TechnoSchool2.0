<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM tabsession where id_session='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){

     ?>
     
     <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de la session <?php echo $sele['nom_session'];?></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">

                <div class="col-md-12">
                  <label for="nomsession" class="form-label">Nom de la session( ex: 2022-2023)</label>
                  <input type="text" class="form-control" id="nomsessionmodif" value="<?php echo $sele['nom_session']; ?>" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_session'];?>" onclick="insertmodifsession(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertsessionmodif">

                </div>

            </div>
          </div>

        </div>

     
     <?php
    }
}
?>
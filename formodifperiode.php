<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM periode where id_periode='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        ?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="" style="font-size:14px">
                Après modification, cliquez sur le bouton valider la modification pour enregistrer votre modification.
              </div>
                <div class="col-md-6">
                  <label for="heurdebutperiodemodif" class="form-label">Heure de début de la période</label>
                  <input type="time" class="form-control" id="heurdebutperiodemodif" style="border:0.5px solid gray" value="<?php echo $sele['heuredebut'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="heurfinperiodemodif" class="form-label">Heure de fin de la période</label>
                  <input type="time" class="form-control" id="heurfinperiodemodif" style="border:0.5px solid gray" value="<?php echo $sele['heurefin'] ?>">
                </div>
                <div class="col-md-12">
                  <label for="typeperiodemodif" class="form-label">Type de période</label>
                  <select id="typeperiodemodif" class="form-select">
                    <option value="cours" <?php $x=$sele['typeperiode'];if($x=='cours'){echo 'selected';}else{} ?>>Cours</option>
                    <option value="pause" <?php $x=$sele['typeperiode'];if($x=='pause'){echo 'selected';}else{} ?>>Pause</option>
                  </select>
                </div>
              </form><br/>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_periode'];?>" onclick="insertmodifperiode(this.id)">Valider la modification</button>
                </div><br/>
                <div id="resultinsertmodifperiode">

                </div>

            </div>
          </div>

        </div>


        <?php
    }
}
?>
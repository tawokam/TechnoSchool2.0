<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM jours where id_jour='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){


?>

<div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="" style="font-size:14px">
              Après avoir modifié le jour, cliquez sur le bouton valider la modification pour enregistrer la modification.
              </div>
                <div class="col-md-12">
                  <label for="nomjourcour" class="form-label">Nom du jour(ex: lundi)</label>
                  <input type="text" class="form-control" id="modifnomjourcour" style="border:0.5px solid gray" value="<?php echo $sele['nom_jour'] ?>">
                </div>
              </form><br/>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $ident;?>" onclick="insertmodifjour(this.id)">Valider la modification</button>
                </div><br/>
                <div id="resultinsertmodifjour">

                </div>

            </div>
          </div>

        </div>
<?php
    }
}
?>
<?php
require('connect.php');
$ident = $_GET['ident'];
$se = "SELECT * FROM tabsection where id_section='$ident'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){

     ?>
     
     <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Modification de la section <?php echo $sele['nom_section'];?></h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">

                <div class="col-md-12">
                  <label for="nomsection" class="form-label">Nom de la section</label>
                  <input type="text" class="form-control" id="nomsectionmodif" value="<?php echo $sele['nom_section']; ?>" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_section'];?>" onclick="insertsectionmodif(this.id)">Enregistrer la modification</button>
                </div><br/>
                <div id="resultinsertsectionmodif">

                </div>

            </div>
          </div>

        </div>

     
     <?php
    }
}
?>
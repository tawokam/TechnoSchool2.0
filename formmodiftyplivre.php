<?php
require('connect.php');
$idtype = $_GET['idtype'];
$se = "SELECT * FROM typelivre WHERE id_typelivre='$idtype'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
     echo '<div class="card" style="width:100%;">
        <div class="card-body">
        
          <h5 class="card-title">Modifier un type de livre</h5>
          <form class="row g-3">
            <div class="col-md-12">
              <label for="nomtypelivremodif" class="form-label">Nom du type (exemple : litteraire, scientifique, ...)</label>
              <input type="text" class="form-control" id="nomtypelivremodif" value="'.$sele['nom_typelivre'].'">
        </div>
        <br/><div class="col-md-12" style="text-align: center;">
                            <button type="button" class="btn btn-primary" onclick="insertmodiftyplivre('.$idtype.')">Enregistrer la modification</button>
                        </div> <br/>
                        <div id="resultinserttyplivremodif"></div> 
          </form></div></div>';
    }
}
?>
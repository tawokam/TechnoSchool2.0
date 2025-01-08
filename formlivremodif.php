<?php
require('connect.php');
$idlivre = $_GET['idlivre'];
$se = "SELECT * FROM LIVRES where id_livre='$idlivre'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $idtyp = $sele['id_typelivre'];
        $idetag = $sele['id_etagere'];
?>
<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Modification d'un livre</h5>
  <form class="row g-3">
    <div class="col-md-12">
      <label for="nomlivrenodif" class="form-label">Nom du livre</label>
      <input type="text" class="form-control" id="nomlivremodif" value="<?php echo $sele['nom_livre'] ?>">
</div>
    <div class="col-md-6">
      <label for="typlivremodif" class="form-label">Type de livre</label>
    <select id="typlivremodif" class="form-select" onchange="filtreclasse()">
                                              <?php
                                              require('connect.php');
                                              $ty = "SELECT * FROM typelivre order by nom_typelivre asc";
                                              if($typ = $connec -> query($ty)){
                                                  while($typli = $typ -> fetch()){
                                                    $comptyplivr = $typli['id_typelivre'];
                                                    ?>
                                                    <option value="<?php echo $typli['id_typelivre']?>" <?php if($idtyp == $comptyplivr){echo 'selected';}else{} ?>><?php echo $typli['nom_typelivre']?></option>
                                                    <?php
                                                }
                                              }
                    ?>
                                            </select>
</div>
    <div class="col-md-6">
      <label for="etagerelivremodif" class="form-label">Étagère où est classé le livre</label>
    <select id="etagerelivremodif" class="form-select" onchange="filtreclasse()">
                                              <?php
                                              require('connect.php');
                                              $e = "SELECT * FROM etageres order by nom_etagere asc";
                                              if($et = $connec -> query($e)){
                                                  while($eta = $et -> fetch()){
                                                    $nwetag = $eta['id_etagere'];
                                                    ?>
                                                    <option value="<?php echo $eta['id_etagere']?>" <?php if($idetag == $nwetag){echo 'selected';}else{} ?>><?php echo $eta['nom_etagere']?></option>
                                                <?php
                                                    }
                                              }
                    ?>
                                            </select>
</div>
<div class="col-md-12">
      <label for="qtelivremodif" class="form-label">Quantité de ce livre présente sur cette étagère.</label>
      <input type="number" class="form-control" id="qtelivremodif" value="<?php echo $sele['nbrelivre'] ?>">
</div>
<br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" id="<?php echo $idlivre;?>" onclick="insertmodiflivre(this.id)">Enregistrer les modification</button>
                </div> <br/>
                <div id="resultinsertmodiflivre"></div> 
  </form></div></div>
<?php
    }
}
?>
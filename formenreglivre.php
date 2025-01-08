<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Créer les types de livres</h5>
  <div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
  L'enregistrement des livres permet le suivi du stock par type et/ou par étagère.
</div>
  <form class="row g-3">
    <div class="col-md-12">
      <label for="nomlivre" class="form-label">Nom du livre</label>
      <input type="text" class="form-control" id="nomlivre" >
</div>
    <div class="col-md-6">
      <label for="typlivre" class="form-label">Type de livre</label>
    <select id="typlivre" class="form-select" onchange="filtreclasse()">
                                              <?php
                                              require('connect.php');
                                              $se = "SELECT * FROM typelivre order by nom_typelivre asc";
                                              echo '<option value="">Selectionnez le type de livre</option>';
                                              if($sel = $connec -> query($se)){
                                                  while($sele = $sel -> fetch()){
                                                     echo '<option value="'.$sele['id_typelivre'].'">'.$sele['nom_typelivre'].'</option>';
                                                }
                                              }
                    ?>
                                            </select>
</div>
    <div class="col-md-6">
      <label for="etagerelivre" class="form-label"> Étagère où le livre est classé.</label>
    <select id="etagerelivre" class="form-select" onchange="filtreclasse()">
                                              <?php
                                              require('connect.php');
                                              $se = "SELECT * FROM etageres order by nom_etagere asc";
                                              echo '<option value="">Selectionnez l\'étagère</option>';
                                              if($sel = $connec -> query($se)){
                                                  while($sele = $sel -> fetch()){
                                                     echo '<option value="'.$sele['id_etagere'].'">'.$sele['nom_etagere'].'</option>';
                                                }
                                              }
                    ?>
                                            </select>
</div>
<div class="col-md-12">
      <label for="qtelivre" class="form-label">Quantité de ce livre present sur cette étagère</label>
      <input type="number" class="form-control" id="qtelivre" >
</div>
<br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertlivre()">Enregistrer le livre</button>
                </div> <br/>
                <div id="resultinsertlivre"></div> 
  </form></div></div>
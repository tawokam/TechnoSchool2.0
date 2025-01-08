<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Modifier le Paramétrage de la durée d'un emprunt</h5>

<?php
require('connect.php');
$se = "SELECT * FROM dureemprunt";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
?>
<div class="col-md-12">
<label for="dureempruntmodif" class="form-label">Quelle est la durée maximale d'un emprunt( en jours)</label>
    <input type="number" class="form-control" id="dureempruntmodif" value="<?php echo $sele['duree_emprunt']?>">
</div>
<br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertmodifdureemprunt()">Enregistrer la modification</button>
                </div> <br/>
                <div id="resultinsertmodifdureemprunt"></div> 
<?php
    }
}
?>
</div>
</div>
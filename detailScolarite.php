<?php
require('connect.php');
$matricule = $_GET['matricule'];
$session = $_GET['session'];
$nbr = 1;
$se = "SELECT inscription.matricule,inscription.nom_session,eleves.matricule,eleves.nom_eleve FROM inscription inner join eleves on inscription.matricule=eleves.matricule where inscription.matricule='$matricule' AND inscription.nom_session='$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        ?>
    <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Détails des versements de la scolarité de l'élève <?php echo $sele['nom_eleve'] ?>&nbsp;&nbsp;&nbsp;Matricule:  <?php echo $sele['matricule'] ?>&nbsp;&nbsp;&nbsp;Session: <?php echo $sele['nom_session'] ?></h5>
              <div class="alert alert-dark" role="alert" style="font-size: 12px;">
              Si vous souhaitez modifier le montant d'un versement, cliquez sur le versement que vous souhaitez modifier, entrez le nouveau montant, puis cliquez sur "Modifier" sur la ligne concernée pour valider la modification.
</div>
              <table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Montant versé</th><th>Date</th><th>Heure</th><th>Réçu</th><th>Modifier</th><th>Supprimer</tr>
  </thead>


        <?php
    }
}
$se = "SELECT caissescolarite.id_caissescolarite,caissescolarite.montverse,caissescolarite.dateverse,caissescolarite.heureverse,caissescolarite.matricule,caissescolarite.nom_session,eleves.matricule,eleves.nom_eleve FROM caissescolarite inner join eleves on caissescolarite.matricule=eleves.matricule where caissescolarite.matricule='$matricule' AND caissescolarite.nom_session='$session'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        ?>
        <tr><td><?php echo $nbr;?></td><td><input type="number" id="newmontscolarite<?php echo $sele['id_caissescolarite'];?>" value="<?php echo $sele['montverse'];?>" style="border:0px"></td><td><?php echo $sele['dateverse'];?></td><td><?php echo $sele['heureverse'];?></td><td style="cursor:pointer;color:green;font-size:12px;width:100px" id="<?php echo $sele['id_caissescolarite'];?>" onclick="affichrecudetailscolarite(this.id,'<?php echo $matricule;?>')"><i class="bi bi-credit-card-2-front text-success"></i> Réçu</td><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['id_caissescolarite'];?>" onclick="insertmodifersescolarite(this.id,'<?php echo $matricule;?>')"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td style="cursor:pointer;color:gray;width:100px;font-size:12px" id="<?php echo $sele['id_caissescolarite'];?>" onclick="suppversescolarite(this.id,'<?php echo $matricule;?>')"><i class="bi bi-trash3-fill text-danger"></i> Effacer</td></tr>
        <?php
        $nbr++;
    }
}
echo '</table></div></div>';
?>
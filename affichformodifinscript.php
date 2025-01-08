<?php
require('connect.php');
$matricule = $_POST['matricule'];
$ident = $_POST['ident'];
$session = $_POST['session'];
$se = "SELECT tabsection.id_section,tabsection.nom_section,eleves.matricule,eleves.nom_eleve,inscription.matricule,inscription.id_classe,inscription.resteinscription,inscription.etatinscription,classe.id_classe,classe.nom_classe,inscription.id_section,inscription.id_inscript FROM inscription inner join classe on inscription.id_classe = classe.id_classe inner join eleves on inscription.matricule = eleves.matricule inner join tabsection on inscription.id_section = tabsection.id_section where inscription.nom_session = '$session' AND inscription.matricule = '$matricule'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $sect = $sele['id_section'];
        $class = $sele['id_classe'];
        ?>

<div class="card">
  <div class="card-body">
   <div style="padding: 10px 0px;font-size:20px;color:gray;font-weght:bold"> <span>Modification de l'inscription de <?php echo $sele['nom_eleve'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <span>Matricule: <?php echo $sele['matricule'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;
   </div>
   <label for="newsectioninscript" class="form-label">Section de l'élève</label>
   <select id="newsectioninscript" class="form-select" onchange='afichclassinscriptmodif()'>
   <option value="">Séléectionnez la section</option>
                    <?php
                    $set = "SELECT * FROM tabsection order by nom_section asc";
                    if($selt = $connec -> query($set)){
                        while($selet = $selt -> fetch()){
                            ?>
                           <option value="<?php echo $selet['id_section'];?>" ><?php echo $selet['nom_section'];?></option>
                           <?php
                        }
                    }
                    ?>
                  </select>
<br/>
                  <label for="newclasseinscript" class="form-label">Nouvelle classe de l'élève</label>
              <select id="newclasseinscript" class="form-select">
             
                  </select><br/>
                  <div class="text-center">
                  <button class="btn btn-primary" id="<?php echo $sele['id_inscript'];?>" onclick='insertmodifinscription(this.id,"<?php echo $matricule;?>")'>Enregistrer la modification</button>
                </div><br/>
                <div id="resultmodifinscript">

                </div>

  </div>
</div>

        <?php
    }
}
?>
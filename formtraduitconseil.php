/<?php
require('connect.php');
$matricule = $_GET['matricule'];
$classe = $_GET['classe'];
$session = $_GET['session'];
$elevetrad = '';
$el = "SELECT * FROM eleves where matricule='$matricule'";
if($ele = $connec -> query($el)){
    while($elev = $ele -> fetch()){
        $elevetrad = $elev['nom_eleve'];
    }
}
echo '<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title"><i class="bi bi-arrow-left-circle" onclick="listelevetraduit('.$classe.')" style="font-size:30px;vertical-align:middle;cursor:pointer"></i>&nbsp;&nbsp;&nbsp; Traduire l\'élève <span style="font-weight:bold;font-size:20px">'.$elevetrad.'</span> au conseil de discipline</h5>

  <form class="row g-3">
    <div class="col-md-6">
      <label for="nomprofprogramme" class="form-label">Classe de l\'élève</label>
      ';
      $cl = "SELECT inscription.nom_session,inscription.id_classe,inscription.matricule,classe.id_classe,classe.nom_classe FROM inscription inner join classe on inscription.id_classe=classe.id_classe where inscription.matricule='$matricule' AND inscription.nom_session='$session'";
      if($cla = $connec -> query($cl)){
        while($clas = $cla -> fetch()){
            echo '<input type="text" class="form-control" value="'.$clas['nom_classe'].'" readonly>';
            echo '<input type="hidden"  value="'.$clas['id_classe'].'" id="idclassetraduit">';
        }
      }
   echo '</div>
   <div class="col-md-6">
   <label for="idconseiltraduir" class="form-label">Séléctionnez le conseil</label>
   <select id="idconseiltraduir" class="form-select">
 ';
   $se = "SELECT * FROM conseil order by date_conseil desc";
   if($sel = $connec -> query($se)){
       while($sele = $sel -> fetch()){
           $datecons = strtotime($sele['date_conseil']);
           $date = date('Y/m/d');
           $compoar = strtotime($date) - $datecons;
           $nbrejour = floor($compoar/(60*60*24));
           if($nbrejour < 0){
               echo '<option value="'.$sele['id_conseil'].'">'.$sele['lieu'].' / '.$sele['date_conseil'].' / '.$sele['heure_conseil'].'</option>';
           }else if($nbrejour > 0){

           }


       }
   }

 echo '</select>';
echo '</div>
<div class="col-md-12">
<label for="nomprofprogramme" class="form-label">Motif</label>
<textarea class="form-control" placeholder="Pourquoi l\'élève a été traduit au conseil de discipline" style="height: 100px;resize:none" id="motiftraduit"></textarea>
 </div> </form><br>
 <div style="text-align:center"><button class="btn btn-primary" id="'.$matricule.'" onclick="inserttraduitconseil(this.id)">Valider la traduction au conseil</button><br/></div>
<div style="height:7px"></div>
 <div id="resulttraduitconseil"></div>
</div></div>
';
?>
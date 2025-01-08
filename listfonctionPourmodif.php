<?php
require('connect.php');
?>
<br/>
<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th> Nom de la fonction</th><th>Inscription</th><th>Scolarité</th><th>Gestion enseignents</th><th>Discipline des élèves</th><th>Enseignement</th><th>Autres</th><th>Modifier</tr>
  </thead>
  <?php
  $n = 1;
  $se = "SELECT * FROM fonction ";
  if($sel = $connec->query($se)){
    while($sele = $sel->fetch()){
        $inscript = $sele['inscription'];
        $scolarite = $sele['scolarite'];
        $gestprof = $sele['gest_enseignent'];
        $disciplineleve = $sele['discipline_eleves'];
        $autre = $sele['autres'];
        $enseignement = $sele['enseignement'];
        $v = '';
        if($inscript == 'OUI'){
            $v= 'checked';
        }
        $vscol = '';
        if($scolarite == 'OUI'){
            $vscol= 'checked';
        }
        $gestprofs = '';
        if($gestprof == 'OUI'){
            $gestprofs= 'checked';
        }
        $discipeleve = '';
        if($disciplineleve == 'OUI'){
            $discipeleve= 'checked';
        }
        $autr = '';
        if($autre == 'OUI'){
            $autr= 'checked';
        }
        $prof = '';
        if($enseignement == 'OUI'){
            $prof= 'checked';
        }
      echo '<tr><td>'.$n.'</td><td><input type="text" class="form-control" id="nommodifonct'.$sele['id_fonction'].'" value='.$sele['nom_fonction'].'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifinscript'.$sele['id_fonction'].'" '.$v.'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifscolarite'.$sele['id_fonction'].'"'.$vscol.'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifgestprof'.$sele['id_fonction'].'" '.$gestprofs.'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifdiscipeleve'.$sele['id_fonction'].'" '.$discipeleve.'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifenseignement'.$sele['id_fonction'].'"'.$prof.'></td><td><input class="form-check-input" style="border:1px solid blue" type="checkbox" id="modifautre'.$sele['id_fonction'].'"'.$autr.'></td><td><button id="'.$sele['id_fonction'].'" class="btn btn-primary" onclick="insertmodifonction(this.id)"><i class="bi bi-pencil"></i></button></td></tr>';
    $n++;
    }
  }
  ?>
</table>

<?php

?>
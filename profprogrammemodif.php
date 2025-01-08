<?php
require('connect.php');
$ident = $_POST['ident'];
//------------Affiche la classe ----------------//
$cl = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section where classe.id_classe = '$ident'";
if($cla = $connec -> query($cl)){
    while($clas = $cla -> fetch()){

        echo '<div class="alert alert-success" role="alert" style="font-size:15px">
        Liste des enseignats programmés dans la classe de <strong>'.$clas['nom_classe'].'</strong> pour une modification
        </div>';
    }
}
echo '<div id="resulmodifprogram"></div>';


echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:12px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Heure de debut</th><th>Heure de fin</th><th>Jours</th><th>Professeur</th><th>Matière</th><th>Paie</th><th>Valider</th>
  </thead>';
$n = 1;
  $se = "SELECT programme.payeheure,programme.id_programme,programme.heuredebut,programme.heurefin,programme.jour,programme.id_employer,programme.id_matiere,programme.id_classe,matieres.id_matiere,matieres.nom_matiere,employer.id_employer,employer.nom_employer FROM programme inner join matieres on programme.id_matiere=matieres.id_matiere inner join employer on programme.id_employer=employer.id_employer where programme.id_classe='$ident'";
  if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
        $heurd = $sele['heuredebut'];
        $nomjr = $sele['jour'];
        $employ = $sele['id_employer'];
        $matieres = $sele['id_matiere'];
        $identprogram = $sele['id_programme'];
        ?>
    <tr style="text-align: center;"><td><?php echo $n;?></td>
    <td>
    <select id="heuredebutmodifprogram<?php echo $identprogram;?>" class="form-select" style="width: 80%;border:0px" onchange="affichheurefinprogrammodif('<?php echo $identprogram;?>')">
        <?php
$hd = "SELECT * FROM periode where typeperiode='cours'";
if($hed = $connec -> query($hd)){
    while($heud = $hed -> fetch()){
        $heuperiod = $heud['heuredebut'];
        ?>
        <option value="<?php echo $heud['heuredebut']?>" <?php if($heurd == $heuperiod){echo 'selected';}else{}  ?>><?php echo $heud['heuredebut']?></option>
        <?php
    }
}
        ?>
    </select>
    </td>
    <td>
    <input type="text" class="form-control" id="heurefinmodifprogram<?php echo $identprogram;?>" value="<?php echo $sele['heurefin'] ?>" readonly style="width: 90%;border:0px">
    </td>
    <td>
    <select id="jourmodifprogram<?php echo $identprogram;?>" class="form-select" style="width: 100%;border:0px">
        <?php
$njr = "SELECT * FROM jours";
if($njo = $connec -> query($njr)){
    while($njour = $njo -> fetch()){
        $jr = $njour['nom_jour'];
        ?>
        <option value="<?php echo $jr?>" <?php if($nomjr == $jr){echo 'selected';}else{}  ?>><?php echo $njour['nom_jour']?></option>
        <?php
    }
}
        ?>
    </select>
    </td>
    <td>
    <select id="profmodifprogram<?php echo $identprogram;?>" class="form-select" style="width: 80%;border:0px">
        <?php
$em = "SELECT employer.id_employer,employer.nom_employer,employer.id_fonction,fonction.id_fonction,fonction.enseignement FROM employer inner join fonction on employer.id_fonction=fonction.id_fonction where fonction.enseignement='OUI'";
if($emp = $connec -> query($em)){
    while($empl = $emp -> fetch()){
        $nomem = $empl['id_employer'];
        ?>
        <option value="<?php echo $nomem?>" <?php if($nomem == $employ){echo 'selected';}else{}  ?>><?php echo $empl['nom_employer']?></option>
        <?php
    }
}
        ?>
    </select>
    </td>
    <td>
    <select id="matieremodifprogram<?php echo $identprogram;?>" class="form-select" style="width: 80%;border:0px">
        <?php
$ma = "SELECT * FROM matieres";
if($mat = $connec -> query($ma)){
    while($mati = $mat -> fetch()){
        $matie = $mati['id_matiere'];
        ?>
        <option value="<?php echo $mati['id_matiere']?>" <?php if($matie == $matieres){echo 'selected';}else{}  ?>><?php echo $mati['nom_matiere']?></option>
        <?php
    }
}
        ?>
    </select>
    </td>
    <td style="width: 100px;">
    <input type="number" class="form-control" id="paieheurmodifprogram<?php echo $identprogram;?>" value="<?php echo $sele['payeheure'] ?>" style="width: 90%;border:0px">
    </td>
    <td class="text-success fw-bold" style="cursor:pointer" onclick="insertmodifprogramprof(<?php echo $ident;?>,<?php echo $identprogram;?>)">
    <i class="bi bi-check-lg text-success"></i> Modifier
    </td>
</tr>

      <?php
      $n ++;
    }
  }

  ?>
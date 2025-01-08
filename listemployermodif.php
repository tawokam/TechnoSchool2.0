<?php
require('connect.php');
$sexe = $_GET['sexe'];
$diplome = $_GET['diplome'];
$fonction = $_GET['fonction'];
$n = 1;
$su = "DELETE FROM employer where selecte='check'";
if($sup = $connec->query($su)){

echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th></th><th>N°</th><th> Nom de l\'employer</th><th>Téléphone 1</th><th>Téléphone 2</th><th>Sexe</th><th>Adresse mail</th><th>Fonction</th><th>Quartier</th><th>Diplome</th><th>Spécialité</th><th>CV</th><th>Numèro d\'urgence</th></tr>
  </thead>';
if($sexe == '' && $diplome == '' && $fonction == ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray;" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe !='' && $diplome == '' && $fonction == ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.sexe_employer='$sexe' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe !='' && $diplome != '' && $fonction == ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.sexe_employer='$sexe' AND employer.grandiplome='$diplome' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe !='' && $diplome != '' && $fonction != ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.sexe_employer='$sexe' AND employer.grandiplome='$diplome' AND employer.id_fonction='$fonction' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}else if($sexe =='' && $diplome != '' && $fonction == ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.grandiplome='$diplome' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}
else if($sexe !='' && $diplome == '' && $fonction != ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.sexe_employer='$sexe' AND employer.id_fonction='$fonction' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}
else if($sexe =='' && $diplome != '' && $fonction != ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.grandiplome='$diplome' AND employer.id_fonction='$fonction' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}
else if($sexe =='' && $diplome == '' && $fonction != ''){
    $se = "SELECT employer.id_employer,fonction.id_fonction, fonction.nom_fonction,employer.id_fonction,employer.nom_employer,employer.telephone1_employer,employer.telephone2_employer,employer.sexe_employer,employer.adresseMail_employer,employer.quartier_employer,employer.grandiplome,employer.specialitediplome,employer.cv_employer,employer.numerourgence FROM fonction inner join employer on fonction.id_fonction=employer.id_fonction where employer.id_fonction='$fonction' order by employer.nom_employer asc ";
    if($sel = $connec->query($se)){
        while($sele = $sel->fetch()){
            $cv = $sele['cv_employer'];
            $sicv = '';
            if($cv == ''){
                $sicv = 'NON';
            }else if($cv != ''){
                $sicv = 'OUI';
            }
            echo '<tr><td style="cursor:pointer;color:gray" id="'.$sele['id_employer'].'" onclick="formemployermodif(this.id)"><i class="bi bi-pencil-fill text-warning"></i> Modifier</td><td>'.$n.'</td><td>'.$sele['nom_employer'].'</td><td>'.$sele['telephone1_employer'].'</td><td>'.$sele['telephone2_employer'].'</td><td>'.$sele['sexe_employer'].'</td><td>'.$sele['adresseMail_employer'].'</td><td>'.$sele['nom_fonction'].'</td><td>'.$sele['quartier_employer'].'</td><td>'.$sele['grandiplome'].'</td><td>'.$sele['specialitediplome'].'</td><td>'.$sicv.'</td><td>'.$sele['numerourgence'].'</td></tr>';
            $n++;
        }
    }
}
echo '</table>';
}
?>
<?php
require('connect.php');
$matricule = $_GET['matricule'];
$session = $_GET['session'];
$max = 0;
$gr = "SELECT *,max(id_caissescolarite) as maximu FROM caissescolarite ";
if($gra = $connec -> query($gr)){
    while($grad = $gra -> fetch()){
        $max = $grad['maximu'];
    }
}
$se = "SELECT eleves.matricule,eleves.nom_eleve,inscription.matricule,inscription.id_classe,scolarite.restescolarite,scolarite.etatscolarite,caissescolarite.id_caissescolarite,caissescolarite.montverse,caissescolarite.dateverse,caissescolarite.heureverse,caissescolarite.matricule,caissescolarite.nom_session,classe.id_classe,classe.nom_classe,scolarite.matricule FROM inscription inner join caissescolarite on inscription.matricule = caissescolarite.matricule inner join classe on inscription.id_classe = classe.id_classe inner join eleves on inscription.matricule = eleves.matricule inner join scolarite on inscription.matricule=scolarite.matricule where caissescolarite.id_caissescolarite = '$max'";
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
?>
<table style="text-align:center;font-size:15px">
    <tr>
        <td>
            REPUBLIQUE DU CAMEROUN<br>
            Paix - Travail - Patrie<br>
            *************<br>
            REGION DE L'OUEST<br>
            *************
        </td>
        <td>
         <canvas style="border: 1px solid blue"></canvas>
        </td>
        <td>
            INSTITUT POLYVALENT BILINGUE DE MOYOPO<br>
            TEL: 699-388-115<br>
            E-MAIL: achilletawokam@gmail.com<br>
        </td>
    </tr>
    <tr style="text-align:left"><td colspan="3">
        ANNEE SCOLAIRE: <?php echo $sele['nom_session']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        RECU N° <?php echo $max; ?>
    </td></tr>
<tr style="text-align:left">
    <td colspan="2">
        NOM ET PRENOM: <?php echo $sele['nom_eleve']; ?>
    </td>
    <td>
        RECU DU <?php echo $sele['dateverse'];?>&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;<?php echo $sele['heureverse'];?>
    </td>
</tr>
<tr style="text-align:left">
    <td colspan="2">
      
    </td>

</tr>
<tr style="text-align:left">
    <td>
        CLASSE: <?php echo $sele['nom_classe']; ?>
    </td>
    <td >
        Motif du règlement: <?php $etat = $sele['etatscolarite'];if($etat == 'solde'){echo 'SOLDE SCOLARITE';}else if($etat == 'non solde'){echo 'SCOLARITE';}?>
    </td>
    <td>
      Montant: <?php echo $sele['montverse']; ?> FCFA
    </td>
</tr>
<tr style="text-align:left">
    <td>
        MATRICULE N° <?php echo $sele['matricule']; ?>
    </td>
    <td colspan="2">
        reste a payer: <?php echo $sele['restescolarite']; ?> FCFA
    </td>
</tr>
<tr style="text-align:left">
    <td colspan="2">
        REPRESENTANT:  Mr achille tawokam
    </td>
    <td>
        LE CAISSIER
    </td>
</tr>
<tr style="text-align:left">
    <td colspan="3">
   Chers élèves et Chers parents d'élèves:
    </td>
</tr>
<tr style="text-align:left">
    <td colspan="3">
   Nous avons bien rèçu votre règlement et nous vous remercions :(N.B: ce réçu ne peut faire l'objet d'aucun remboursement)
    </td>
</tr>
</table>
<?php
    }
}
?> 
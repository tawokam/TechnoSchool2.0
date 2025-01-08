<?php
require('connect.php');
$matricule = $_GET['matricule'];
$session = $_GET['session'];
$max = 0;
$gr = "SELECT *,max(id_caisse) as maximu FROM caissescolarite ";
if($gra = $connec -> query($gr)){
    while($grad = $gra -> fetch()){
        $max = $grad['maximu'];
    }
}
$se = "SELECT eleves.matricule,eleves.nom_eleve,inscription.matricule,inscription.id_classe,inscription.resteinscription,inscription.etatinscription,caisseinscription.id_caisseinscript,caisseinscription.montverse,caisseinscription.dateverse,caisseinscription.heureverse,caisseinscription.matricule,caisseinscription.nom_session,classe.id_classe,classe.nom_classe FROM inscription inner join caisseinscription on inscription.matricule = caisseinscription.matricule inner join classe on inscription.id_classe = classe.id_classe inner join eleves on inscription.matricule = eleves.matricule where id_caisseinscript = '$max'";
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
        Motif du règlement: <?php $etat = $sele['etatinscription'];if($etat == 'solde'){echo 'SOLDE INSCRIPTION';}else if($etat == 'non solde'){echo 'INSCRIPTION';}?>
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
        reste a payer: <?php echo $sele['resteinscription']; ?> FCFA
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
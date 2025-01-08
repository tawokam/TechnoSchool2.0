<?php
require('connect.php');
$idconseil = $_GET['idconseil'];
$session = $_GET['session'];
$datecons = '';
$co = "SELECT *,date_format(date_conseil, '%d/%m/%Y') as dateconseil FROM conseil where id_conseil='$idconseil'";
if($con = $connec -> query($co)){
    while($cons = $con -> fetch()){
        $datecons = $cons['dateconseil'];
    }
}
$matricule = $_GET['matricule'];
$nomele = '';
$el = "SELECT * FROM eleves WHERE matricule='$matricule'";
if($ele = $connec -> query($el)){
    while($elev = $ele -> fetch()){
        $nomele = $elev['nom_eleve'];
    }
}
echo '<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title"><i class="bi bi-arrow-left-circle" onclick="listeleveconseilxpourdecision('.$idconseil.')" style="font-size:30px;vertical-align:middle;cursor:pointer"></i>&nbsp;&nbsp;&nbsp; Décision du conseil disciplinaire du '.$datecons.' consernent l\'élève '.$nomele.'</h5>

  <section class="section">
  <div class="row">
    <div class="col-lg-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Les sanctions encouru au conseil disciplinaire</h5>
';
   ?>
<!-- accordion contenent les different santion du conseil -->
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Avertisssement
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Il est le premier grade dans l'échelle des sanctions et est porté au dossier administratif de l'élève
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Blâme
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        &nbsp;&nbsp;Il constitue une reprimande, un rappel a l'ordre verbal et solennel, qui explicite la faute
        et met l'élève en mesure de la comprendre et de s'en excuser. Les observations adressées à ce dernier
        presentent un caractère de gravité supérieur à l'Avertisssement. L'élève doit certifier en avoir
        connaissance. Le blâme versé à son dossier administratif peut être suivi d'une mesure d'accompagnement de nature éducative.
         
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        La mesure de responsabilisation
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         Elle consiste a participer, en dehors des heures d'enseignement,
        à des activités de solidarité, culturelles ou de formation à des fins éducatives
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingfour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
        L'exclusion temporaire de la classe
      </button>
    </h2>
    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         de huit jours maximum. Pendant l'accomplissement de la sanction, l'élève est accueilli dans l'établissement mais n'est pas autorisé dans une salle de classe.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseThree">
        L'exclusion temporaire de l'établissement
      </button>
    </h2>
    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         de huit jours maximum. Pendant l'accomplissement de la sanction, l'élève n'est pas autorisé dans l'établissement.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingsixe">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesixe" aria-expanded="false" aria-controls="collapseThree">
        L'exclusion définitive de l'établissement
      </button>
    </h2>
    <div id="collapsesixe" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
           L'élève est exclu durant la session encour ou definitivement de l'établissement scolaire
      </div>
    </div>
  </div>
</div>

<?php
 echo ' </div>
      </div>
    </div>

    <div class="col-lg-6">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Décision du conseil disciplinaire</h5>
        <div class="col-md-12">
        <label for="sanctioneleve" class="form-label">Sanction</label>';
        echo '<select class="form-select" id="sanctioneleve" onchange="infosupplesanction()">
        <option value="avertissement">Avertissement</option>
        <option value="Blâme">Blâme</option>
        <option value="Mesure de responsabilisation">Mesure de responsabilisation</option>
        <option value="L\'exclusion temporaire de la classe">L\'exclusion temporaire de la classe</option>
        <option value="L\'exclusion temporaire de l\'établissement">L\'exclusion temporaire de l\'établissement</option>
        <option value="L\'exclusion définitive de l\'établissemnt">L\'exclusion définitive de l\'établissemnt</option>
        </select>';
     echo '</div>
     <div id="infosanction"></div>
     <br/><div class="col-md-12" style="text-align:center">';
     ?>
     <button class="btn btn-primary" onclick="insertsanction('<?php echo $idconseil;?>','<?php echo $matricule;?>')">Enregistrer la sanction</button><br>
     <div id="resultnewdecision"></div>
     <?php
     echo '</div>
      </div>
    </div>
    </div>
   </div>
   </section>
    </div></form></div></div>
    ';
?>
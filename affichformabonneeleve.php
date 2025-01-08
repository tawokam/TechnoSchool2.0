<?php
require('connect.php');
$tiers = $_GET['tiers'];
if($tiers == 'eleves'){
?>
       <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Paramètre d'abonnement à la bibliothèque pour les élèves</h5>
<div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
Veuillez indiquer ci-dessous les conditions d'abonnement à la bibliothèque (payant, montant par mois, etc.).
</div><br/>
<div class="col-md-12">
                  <label for="abonnebibliotheq" class="form-label">L'abonnement à la bibliothèque est</label>
                  <select id="abonnebibliotheq" class="form-select" onchange="affichchampmontabonnpayant()">
                    <option value="gratuit">Gratuit</option>
                    <option value="payant">Payant</option>
                  </select>
                </div>
                <br><div class="col-md-12" id="montab">
                </div>      
                <br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertparaabonneeleve('eleves')">Enregistrer les paramètres</button>
                </div> <br/>
                <div id="resultinsertabonneleve"></div>       
</div></div>

<?php
}else if($tiers == 'personnel'){
    ?>
       <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Paramètre d'abonnement à la bibliothèque pour le personnel</h5>
<div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
Veuillez indiquer ci-dessous les conditions d'abonnement à la bibliothèque (payant, montant par mois, etc.).
</div><br/>
<div class="col-md-12">
                  <label for="abonnebibliotheq" class="form-label">L'abonnement à la bibliothèque est</label>
                  <select id="abonnebibliotheq" class="form-select" onchange="affichchampmontabonnpayant()">
                    <option value="gratuit">Gratuit</option>
                    <option value="payant">Payant</option>
                  </select>
                </div>
                <br><div class="col-md-12" id="montab">
                </div>      
                <br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="insertparaabonneeleve('personnel')">Enregistrer les paramètres</button>
                </div> <br/>
                <div id="resultinsertabonneleve"></div>       
</div></div>

    <?php
}
?>
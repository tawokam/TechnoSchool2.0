<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des sessions</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="formnewsession()"><i class="bi bi-plus"></i> Ajouter</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="listsession()"><i class="bi bi-receipt-cutoff"></i> Liste des sessions</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistsession.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listsessionmodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listsessionsupp()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <br/>
<div class="alert alert-warning" role="alert" id="comptsession" style="font-size:14px;">
          
          </div>
<?php

?>
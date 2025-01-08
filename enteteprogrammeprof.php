<?php
$session = $_GET['session'];
?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion de la programmation des enseignants</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listnewprogrammeprof()"><i class="bi bi-plus"></i> Programmé un prof</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="kelemploitemps()"><i class="bi bi-receipt-cutoff"></i> Emploi de temps par classe</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-dark" onclick="kelprofpoueemploitemps()"><i class="bi bi-receipt-cutoff"></i> Emploi de temps par enseignant</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-success" onclick="typexportation()"><i class="bi bi-reply-all"></i> Exporter Excel</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="classepourmodification()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="classepoursuppression()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      
      </div>
      <br/>
      <div class="alert alert-dark" role="alert" id="searchcriterprogramprof" style="display: flex;word-wrap:wrap">
      <div class="col-md-4" id="searcheleveAscolarite" style="display:block;padding:0px;">
                <input type="text" class="form-control"  id="nomprofprogramme" onkeyup="listnewprogrammeprof()" placeholder="nom de l'enseignent">
      </div>

       </div>
</div>
<?php

?>
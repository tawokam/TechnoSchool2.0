<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion de la discipline des élèves</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">   
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-plus"></i> Absences
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="listclassappel()" style="cursor: pointer;">Effectuer un appel</a></li>
    <li><a class="dropdown-item" onclick="listclassnewAbsence()" style="cursor: pointer;">Ajouter une absence</a></li>
    <li><a class="dropdown-item" onclick="listabsentclass()" style="cursor: pointer;">Liste des absents </a></li>
    <li><a class="dropdown-item" onclick="listclassjustifiabsence()" style="cursor: pointer;">Justifier une absence </a></li>
  </ul>
      <button class="btn btn-info dropdown-toggle" style="margin-bottom:1% ;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-steam"></i> Conseil disciplinaire 
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="gestconseildiscipline()" style="cursor: pointer;">programmé un conseil de discipline</a></li>
    <li><a class="dropdown-item" onclick="listclasstraduireconseil()" style="cursor: pointer;">Traduire un élève au conseil </a></li>
    <li><a class="dropdown-item" onclick="listconseilprogramme()" style="cursor: pointer;">Liste des élèves traduit au conseil</a></li>
    <li><a class="dropdown-item" onclick="listconseilprogrammedecision()" style="cursor: pointer;">Décision du conseil disciplinaire</a></li>
    <li><a class="dropdown-item" onclick="listconseilprogrammesuppeleve()" style="cursor: pointer;">Supprimer un élève du conseil</a></li>
  </ul>
      <button type="button" style="margin-bottom:1% ;" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlisttypematiere.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-primary" onclick="listconseilprogrammemodif()"><i class="bi bi-pencil"></i> Modifier</button>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" class="btn btn-danger" onclick="listconseilprogrammesuppression()"><i class="bi bi-trash3"></i> Supprimer</button>&nbsp;&nbsp;
      </div>
      <br/>
<div id="sousbtndiscipline">
          
          </div>
<?php

?>





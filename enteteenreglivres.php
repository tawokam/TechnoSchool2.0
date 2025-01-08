<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Enregistrement des livres</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">   
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-journal-bookmark"></i> Type de livre
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="formtyplivre()" style="cursor: pointer;"> Créer un type de livres </a></li>
    <li><a class="dropdown-item" onclick="listyplivre()" style="cursor: pointer;"> Liste des types de livre</a></li>
    <li><a class="dropdown-item" onclick="listyplivremodif()" style="cursor: pointer;"> Modifier un type de livre </a></li>
  </ul>
      <button class="btn btn-info dropdown-toggle" style="margin-bottom:1% ;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-journal"></i> Livres
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="formenreglivre()" style="cursor: pointer;"> Nouveau livre </a></li>
    <li><a class="dropdown-item" onclick="listlivre()" style="cursor: pointer;"> Liste des livres </a></li>
    <li><a class="dropdown-item" onclick="listlivreperte()" style="cursor: pointer;"> Déclaré une perte </a></li>
    <li><a class="dropdown-item" onclick="listlivrepourmodif()" style="cursor: pointer;"> Modifier un livre </a></li>
  </ul>
      <button type="button" style="margin-bottom:1% ;" onclick="javascript:imprime_bloc('','corplogiciel');" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistlivre.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      </div>
      <br/>
<div id="sousbtndiscipline">
          
          </div>
<?php

?>





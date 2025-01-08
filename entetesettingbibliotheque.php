<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Paramétrage de la bibliothèque</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">   
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-plus"></i> Abonnement
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="affichformabonneeleve('eleves')" style="cursor: pointer;"> Abonnement des élèves</a></li>
    <li><a class="dropdown-item" onclick="affichformabonneeleve('personnel')" style="cursor: pointer;"> Abonnemnt du personnel</a></li>
    <li><a class="dropdown-item" onclick="affichformmodifabonnpara()" style="cursor: pointer;">Modifer l'abonnemnt </a></li>
  </ul>
      <button class="btn btn-info dropdown-toggle" style="margin-bottom:1% ;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-steam"></i> Emprunt
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="formdureemprunt()" style="cursor: pointer;"> Durée d'un emprunt</a></li>
    <li><a class="dropdown-item" onclick="formmodifdureemprunt()" style="cursor: pointer;"> Modifier la durée </a></li>
  </ul>
      <button class="btn btn-info dropdown-toggle" style="margin-bottom:1% ;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-bookshelf"></i> Etagères
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="formnewetagere()" style="cursor: pointer;"> Créer les étagères</a></li>
    <li><a class="dropdown-item" onclick="listetagere()" style="cursor: pointer;"> Liste des étagères</a></li>
    <li><a class="dropdown-item" onclick="listetageremodif()" style="cursor: pointer;"> Modifier </a></li>
  </ul>
      <button type="button" style="margin-bottom:1% ;" onclick="javascript:imprime_bloc('','corplogiciel');" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlistetagere.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      </div>
      <br/>
<div id="sousbtndiscipline">
          
          </div>
<?php

?>





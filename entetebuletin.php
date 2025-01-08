<?php

?>

<div class="pagetitle">
      <h1 id="titrecorplogiciel">Gestion des bulletins</h1>
    </div><!-- fin de l'entete de page-->
    <div id="bontonchoix">   
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-plus"></i> Sequences
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 1')" style="cursor: pointer;"> Bulletin de la premier Sequence </a></li>
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 2')" style="cursor: pointer;"> Bulletin de la deuxième Sequence</a></li>
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 3')" style="cursor: pointer;"> Bulletin de la troixième Sequence </a></li>
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 4')" style="cursor: pointer;"> Bulletin de la quatrième Sequence </a></li>
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 5')" style="cursor: pointer;"> Bulletin de la cinquième Sequence </a></li>
    <li><a class="dropdown-item" onclick="buletinsequentiel('sequence 6')" style="cursor: pointer;"> Bulletin de la sixième Sequence </a></li>
  </ul>
      <button class="btn btn-info dropdown-toggle" style="margin-bottom:1% ;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:1% ;">
      <i class="bi bi-steam"></i> Trimestre
  </button>&nbsp;&nbsp;
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" onclick="buletintrimestriel('trimestre 1')" style="cursor: pointer;"> Bulletin du prémier Trimestre </a></li>
    <li><a class="dropdown-item" onclick="buletintrimestriel('trimestre 2')" style="cursor: pointer;"> Bulletin du deuxième Trimestre  </a></li>
    <li><a class="dropdown-item" onclick="buletintrimestriel('trimestre 3')" style="cursor: pointer;"> Bulletin du troixième Trimestre </a></li>
  </ul>
      <button type="button" style="margin-bottom:1% ;" onclick="javascript:imprime_bloc('','corplogiciel');" class="btn btn-warning"><i class="bi bi-printer-fill"></i> Imprimer</button>&nbsp;&nbsp;
      <a href="exportlisttypematiere.php"><button type="button" style="margin-bottom:1% ;" class="btn btn-success"><i class="bi bi-reply-all"></i> Exporter Excel</button></a>&nbsp;&nbsp;
      <button type="button" style="margin-bottom:1% ;" onclick="classReportNote()" class="btn btn-info"><i class="bi bi-reply"></i> Report Notes</button>&nbsp;&nbsp;
      </div>
      <br/>
  <div id="sousbtndiscipline">
          
  </div>
<?php

?>





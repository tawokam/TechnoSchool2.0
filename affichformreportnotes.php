<?php
require('connect.php');
$session = $_GET['session'];
$classe = $_GET['classe'];

?>
       <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Reporter les notes d'une séquence à une autre</h5>
<div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
Cette action ne peut être annulée.
</div><br/>
<div class="row g-3">
<div class="col-md-6">
    <label for="abonnebibliotheq" class="form-label">Reporter les notes de la </label>
    <select id="seqdepart" class="form-select" >
    <option value="sequence 1">Sequence 1</option>
    <option value="sequence 2">Sequence 2</option>
    <option value="sequence 3">Sequence 3</option>
    <option value="sequence 4">Sequence 4</option>
    <option value="sequence 5">Sequence 5</option>
    
    </select>
</div>
<div class="col-md-6">
    <label for="abonnebibliotheq" class="form-label">pour la </label>
    <select id="seqarrive" class="form-select" >
    <option value="sequence 2">Sequence 2</option>
    <option value="sequence 3">Sequence 3</option>
    <option value="sequence 4">Sequence 4</option>
    <option value="sequence 5">Sequence 5</option>
    <option value="sequence 6">Sequence 6</option>
    </select>
</div>
<div class="col-md-6">
    <input class="form-check-input" type="checkbox" id="gardeNote">
    <label class="form-check-label" for="gardeNote" style="cursor: pointer;">
    Garder les notes présentes
</div>

<div class="col-md-6">
<button type="button" class="btn btn-primary" id="<?php echo $classe;?>" onclick="insertReportNote(this.id)">Valider</button>
</div>
</div>
<div id="resultreportNote"></div> 
</div>
</div>  

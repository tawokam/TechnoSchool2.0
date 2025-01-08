<?php
require('connect.php');
$sanctioneleve = $_GET['sanctioneleve'];
if($sanctioneleve == 'L\'exclusion temporaire de la classe'){
    echo '<br><div class="col-md-12">
    <label for="nbrejoursanction" class="form-label">Nombre de jours de la sanction(huit jours maximum)</label>
    <input type="number" class="form-control" id="nbrejoursanction">
    </div>';
    echo '<br><div class="col-md-12">
    <label for="datedebutsanction" class="form-label">La sanction prend effet le</label>
    <input type="date" class="form-control" id="datedebutsanction">
    </div>';
}else if($sanctioneleve == 'L\'exclusion temporaire de l\'établissement'){
    echo '<br><div class="col-md-12">
    <label for="nbrejoursanction" class="form-label">Nombre de jours de la sanction(huit jours maximum)</label>
    <input type="number" class="form-control" id="nbrejoursanction">
    </div>';
    echo '<br><div class="col-md-12">
    <label for="datedebutsanction" class="form-label">La sanction prend effet le</label>
    <input type="date" class="form-control" id="datedebutsanction">
    </div>';
}
?>
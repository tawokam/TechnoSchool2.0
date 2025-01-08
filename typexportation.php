<?php
echo '<div class="alert alert-dark bg-secondary text-light" role="alert"  style="font-size:12px">
veuilez cliquez sur le type d\'emploi de temps que vous souhaitez exporter <i class="bi bi-box-arrow-down text-light">
</div><br>';
echo '<div class="alert alert-success bg-success text-light" onclick="classeexportemploitemps()" role="alert" style="font-size:16px;cursor:pointer;text-align:center">
<i class="bi bi-arrow-right text-light"> Exporter l\'emploi de temps d\'une classe 
</div>';
echo '<div class="alert alert-success bg-primary" role="alert" onclick="profexportemploitemps()" style="font-size:16px;cursor:pointer;text-align:center">
<i class="bi bi-arrow-right text-light"> Exporter l\'emploi de temps d\'un professeur 
</div>';

?>
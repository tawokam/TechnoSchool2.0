<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes classes</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/img/logo.jfif" rel="icon">
</head>
<body>
    <div style="color:#0d6efd;border-bottom:1px solid #0d6efd">
        <i class="bi bi-arrow-left-short" style="font-size:40px; margin-left:20px; vertical-align:middle;cursor:pointer" onclick="window.history.go(-1)"></i>&nbsp;&nbsp;  <strong style="font-size:20px;vertical-align:middle">Notes</strong> 
    </div>
    <?php
    $ident = $_GET['id'];
require('connect.php');
echo '<div class="alert alert-dark bg-secondary text-light" role="alert" style="font-size: 12px;">
Veuillez cliquer sur une classe pour obtenir la liste des élèves de cette classe afin de leur attribuer une note séquentielle.
</div>';
echo '<table class="table table-succes table-bordered table-striped table-hover" style="font-size:14px;text-align: center;margin-top:0%;">
<thead class="table-primary">
  <tr><th>N°</th><th>Section</th><th>Classe</th></tr>
  </thead>';
  $nbr = 1;
$se = "SELECT classe.id_classe,classe.id_section,classe.nom_classe,tabsection.id_section,tabsection.nom_section FROM classe inner join tabsection on classe.id_section=tabsection.id_section inner join programme on classe.id_classe=programme.id_classe WHERE programme.id_employer='$ident'" ;
if($sel = $connec -> query($se)){
    while($sele = $sel -> fetch()){
?>
        <tr id="<?php echo $sele['id_classe']; ?>" style="cursor: pointer;" onclick="listEleveNoteEspaceProf(this.id)"><td><?php echo $nbr;?></td><td><?php echo $sele['nom_classe'];?></td><td><?php echo $sele['nom_section'];?></td></tr>
<?php
$nbr++;
    }
}

?>
<script>
    function listEleveNoteEspaceProf(classe){
        id = localStorage.getItem('user');
        window.location.href='listEleveNoteEspaceProf.php?id='+id+'&classe='+classe;
    }
</script>
</body>
</html>
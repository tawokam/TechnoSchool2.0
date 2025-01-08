<div class="card" style="width:100%;">
<div class="card-body">

  <h5 class="card-title">Créer les types de livre</h5>
  <div class="alert alert-info bg-info text-light" role="alert" style="font-size: 12px;">
  Les types de livres permettent de regrouper les livres par catégorie, vous permettant ainsi de trouver facilement un livre selon son type.
</div>
  <form class="row g-3">
    <div class="col-md-12">
      <label for="nomtypelivre" class="form-label">Nom du type (exemple : litteraire, scientifique, ...)</label>
      <input type="text" class="form-control" id="nomtypelivre" >
</div>
<br/><div class="col-md-12" style="text-align: center;">
                    <button type="button" class="btn btn-primary" onclick="inserttyplivre()">Créer le type de livre</button>
                </div> <br/>
                <div id="resultinserttyplivre"></div> 
  </form></div></div>
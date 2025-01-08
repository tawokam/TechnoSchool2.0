
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer un jour de cours</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="" style="font-size:14px">
              Veuillez enregistrer tous les jours de cours (lundi, mardi, mercredi, etc.) dans l'ordre.  
              </div>
                <div class="col-md-12">
                  <label for="nomjourcour" class="form-label">Nom du jour(ex: lundi)</label>
                  <input type="text" class="form-control" id="nomjourcour" style="border:0.5px solid gray">
                </div>
              </form><br/>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewjour()">Enregistrer le jour</button>
                </div><br/>
                <div id="resultinsertjour">

                </div>

            </div>
          </div>

        </div>


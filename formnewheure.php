
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une nouvelle période de cours</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="" style="font-size:14px">
                  Veuillez enregistrer les périodes de cours (une période correspond à une heure) dans l'ordre croissant.
              </div>
                <div class="col-md-6">
                  <label for="heurdebutperiode" class="form-label">Heure de début de la période</label>
                  <input type="time" class="form-control" id="heurdebutperiode" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="heurfinperiode" class="form-label">Heure de fin de la période</label>
                  <input type="time" class="form-control" id="heurfinperiode" style="border:0.5px solid gray">
                </div>
                <div class="col-md-12">
                  <label for="typeperiode" class="form-label">Type de période</label>
                  <select id="typeperiode" class="form-select">
                    <option value="cours" selected>Cours</option>
                    <option value="pause">Pause</option>
                  </select>
                </div>
              </form><br/>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertperiode()">Enregistrer la période</button>
                </div><br/>
                <div id="resultinsertperiode">

                </div>

            </div>
          </div>

        </div>


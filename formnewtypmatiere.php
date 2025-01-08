
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer les types de matières</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="comptsession" style="font-size:14px">
                Les types de matières (scientifique, littéraire, etc.) seront rattachés aux différentes matières que vous créerez plus tard.
              </div>
                <div class="col-md-12">
                  <label for="nomtypmatiere" class="form-label">Nom du type de matière(ex: scientifique, litteraire, ...)</label>
                  <input type="text" class="form-control" id="nomtypmatiere" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewtypmatiere()">Enregistrer le type de matière</button>
                </div><br/>
                <div id="resultinserttypmatiere">

                </div>

            </div>
          </div>

        </div>


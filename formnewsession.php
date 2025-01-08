
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une nouvelle session</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="comptsession" style="font-size:14px">
                  La création de la session se fait chaque année et c'est la dernière session créée qui est prise par défaut lors de l'ouverture du logiciel.
              </div>
                <div class="col-md-12">
                  <label for="nomsession" class="form-label">Nom de la session( ex: 2022-2023)</label>
                  <input type="text" class="form-control" id="nomsession" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewsession()">Enregistrer la session</button>
                </div><br/>
                <div id="resultinsertsession">

                </div>

            </div>
          </div>

        </div>


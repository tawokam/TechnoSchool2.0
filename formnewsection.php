
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une nouvelle section</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="comptsession" style="font-size:14px">
              Quelles sont les différentes sections disponibles dans votre établissement scolaire (francophone, anglophone, technique, etc.)
              </div>
                <div class="col-md-12">
                  <label for="nomsection" class="form-label">Nom de la section( ex:Francophone)</label>
                  <input type="text" class="form-control" id="nomsection" style="border:0.5px solid gray">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewsection()">Enregistrer la section</button>
                </div><br/>
                <div id="resultinsertsection">

                </div>

            </div>
          </div>

        </div>



          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer un nouvel élève</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
              <div class="alert alert-info" role="alert" id="" style="font-size:14px">
              Veuillez renseigner les informations de base (nom, matricule, date d'entrée, etc.) concernant l'élève. Chaque élève ou parent d'élève complétera sa fiche d'information après connexion via l'application mobile TechnoSchool.
              </div>
                <div class="col-md-6">
                  <label for="nomcompleteleve" class="form-label">Nom de l'élève</label>
                  <input type="text" class="form-control" id="nomcompleteleve" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="nomcompleteleve" class="form-label">Prenom de l'élève</label>
                  <input type="text" class="form-control" id="prenomcompleteleve" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="matriculeleve" class="form-label">Matricule de l'élève</label>
                  <input type="text" class="form-control" id="matriculeleve">
                </div>
                <div class="col-md-6">
                  <label for="datenaisseleve" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="datenaisseleve">
                </div>
                <div class="col-md-6">
                  <label for="lieunaisseleve" class="form-label">Lieu de naissance</label>
                  <input type="text" class="form-control" id="lieunaisseleve">
                </div>
                <div class="col-md-6">
                  <label for="sexeleve" class="form-label">Sexe de l'élève</label>
                  <select id="sexeleve" class="form-select">
                    <option value="">Sélectionnez le sexe de l'élève</option>
                    <option value="maxulin">Maxulin</option>
                    <option value="feminin">Feminin</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="nationalite" class="form-label">Nationalité</label>
                  <input type="text" class="form-control" value="camerounais(e)" id="nationalite">
                </div>
                <div class="col-md-6">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" class="form-control"  id="adresse">
                </div>
                <div class="col-md-6">
                  <label for="maladie" class="form-label">Maladie particulière</label>
                  <input type="text" class="form-control"  id="maladie">
                </div>
                <div class="col-md-6">
                  <label for="apteEPS" class="form-label">Apte au cour d'EPS(Education Physique et Sportive ??</label>
                  <select id="apteEPS" class="form-select">
                    <option value="oui">OUI</option>
                    <option value="non">Non</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="autreinfo" class="form-label">Autres informations ??</label>
                  <input type="text" class="form-control"  id="autreinfo">
                </div>
                <div class="col-md-6">
                  <label for="photoeleve" class="form-label">Importer la photo de l'élève</label>
                  <input type="file" class="form-control"  id="photoeleve" accept="image/png, image/jpg, image/jpeg">
                </div>
                <div class="alert alert-info" role="alert" id="comptsession" style="font-size:14px">
                Informations supplémentaires concernant les parents et tuteur ou tutrice de l'élève
              </div>
              <div class="col-md-6">
                  <label for="nompere" class="form-label">Nom du père</label>
                  <input type="text" class="form-control"  id="nompere">
                </div>
                <div class="col-md-6">
                  <label for="telephonepere" class="form-label">Téléphone du père</label>
                  <input type="number" class="form-control"  id="telephonepere">
                </div>
                <div class="col-md-6">
                  <label for="nomere" class="form-label">Nom de la mère</label>
                  <input type="text" class="form-control"  id="nomere">
                </div>
                <div class="col-md-6">
                  <label for="telephonemere" class="form-label">Téléphone de la mère</label>
                  <input type="number" class="form-control"  id="telephonemere">
                </div>
                <div class="col-md-6">
                  <label for="nomtitteur" class="form-label">Nom du tuteur ou tutrice</label>
                  <input type="text" class="form-control"  id="nomtitteur">
                </div>
                <div class="col-md-6">
                  <label for="phonetitteur" class="form-label">Téléphone du tuteur ou tutrice</label>
                  <input type="number" class="form-control"  id="phonetitteur">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertneweleve()">Enregistrer le nouvel élève</button>
                </div><br/>
                <div id="resultinserteleve">

                </div>

            </div>
          </div>

        </div>


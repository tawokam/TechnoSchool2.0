
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer un nouvel employé</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomemployer" class="form-label">Nom complet de l'employer</label>
                  <input type="text" class="form-control" id="nomemployers" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="phone1employer" class="form-label">Téléphone 1</label>
                  <input type="number" class="form-control" id="phone1employer">
                </div>
                <div class="col-md-6">
                  <label for="phone2employer" class="form-label">Téléphone 2 <i class="bi bi-whatsapp text-success"></i></label>
                  <input type="number" class="form-control" id="phone2employer">
                </div>
                <div class="col-md-6">
                  <label for="sexeemployer" class="form-label">Sexe</label>
                  <select id="sexeemployer" class="form-select">
                    <option value="maxulin" selected>Maxulin</option>
                    <option value="feminin">Feminin</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="mailemployer" class="form-label">Adresse email</label>
                  <input type="mail" class="form-control" id="mailemployer">
                </div>
                <div class="col-md-6">
                  <label for="quartieremployer" class="form-label">Quartier de résidence.</label>
                  <input type="text" class="form-control" id="quartieremployer">
                </div>
                <div class="col-md-6">
                  <label for="fonctionemployer" class="form-label">Fonction</label>
                  <select id="fonctionemployer" class="form-select">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM fonction order by nom_fonction asc";
                    echo '<option value="">Selectionnez une fonction</option>';
                    if($sel = $connec->query($se)){
                        while($sele = $sel->fetch()){
                           echo '<option value="'.$sele['id_fonction'].'">'.$sele['nom_fonction'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="datenaissemployer" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="datenaissemployer">
                </div>
                <div class="col-md-6">
                  <label for="travaildepuisemployer" class="form-label">Travail ici depuis</label>
                  <select id="travaildepuisemployer" class="form-select">
                    <option value="" selected></option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="diplomemployer" class="form-label">Plus grand diplôme</label>
                  <select id="diplomemployer" class="form-select">
                    <option value="" selected>Sélectionnez un diplôme.</option>
                    <option value="BEPC" >BEPC</option>
                    <option value="CAP" >CAP</option>
                    <option value="PROBATOIRE">PROBATOIRE</option>
                    <option value="BACC">BACCALAUREAT</option>
                    <option value="BTS">BTS</option>
                    <option value="licence">LICENCE</option>
                    <option value="MASTER 2">MASTER 2</option>
                    <option value="DOCTORAT">DOCTORAT</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="specialitemployer" class="form-label">Diplôme en (ex: informatique)</label>
                  <input type="text" class="form-control" id="specialitemployer">
                </div>
                <div class="col-md-6">
                  <label for="cvemployer" class="form-label">Importer le CV de l'employer <i class="bi bi-filetype-pdf"></i></label>
                  <input type="file" class="form-control" id="cvemployer" accept="image/pdf, image/docx">
                </div>
                <div class="col-md-6">
                  <label for="salaireemployer" class="form-label">Salaire (Ne rien mettre s'il s'agit d'un enseignant vacataire)</i></label>
                  <input type="number" class="form-control" id="salaireemployer" >
                </div>

                <div class="alert alert-primary" role="alert">
                    Veuillez entrer ci-dessous le numéro de téléphone d'une personne qui sera contactée en cas d'urgence et le mot de passe provisoire de l'employé.
               </div>
                <div class="col-6">
                  <input type="number" class="form-control" id="numerourgence" placeholder="Numéro de téléphone d'urgence">
                </div>
                <div class="col-6">
                  <input type="text" class="form-control" id="mdpemployer" placeholder="mot de passe (L'employé pourra le changer plus tard.)">
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewemployer()">Enregistrer l'employer</button>
                </div><br/>
                <div id="resultinsertemployer">

                </div>

            </div>
          </div>

        </div>


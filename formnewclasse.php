
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une nouvelle classe</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomclasse" class="form-label">Nom de la classe</label>
                  <input type="text" class="form-control" id="nomclasse" style="border:0.5px solid gray">
                </div>
                <div class="col-md-6">
                  <label for="montscolarite" class="form-label">Montant de la scolarité</label>
                  <input type="number" class="form-control" id="montscolarite">
                </div>
                <div class="col-md-6">
                  <label for="montinscription" class="form-label">Montant de l'inscription</label>
                  <input type="number" class="form-control" id="montinscription">
                </div>
                <div class="col-md-12">
                  <label for="sectionclasse" class="form-label">Section</label>
                  <select id="sectionclasse" class="form-select">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM tabsection order by nom_section asc";
                    echo '<option value="">Selectionnez une section</option>';
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                           echo '<option value="'.$sele['id_section'].'">'.$sele['nom_section'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewclasse()">Enregistrer la classe</button>
                </div><br/>
                <div id="resultinsertclasse">

                </div>

            </div>
          </div>

        </div>


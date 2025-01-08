
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Enregistrer une nouvelle matière</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <label for="nomatiere" class="form-label">Nom de la matière(ex:informatique, anglais, ...)</label>
                  <input type="text" class="form-control" id="nomatiere" style="border:0.5px solid gray">
                </div>
                <div class="col-md-12">
                  <label for="typmatmatiere" class="form-label">Type de matière</label>
                  <select id="typmatmatiere" class="form-select">
                    <?php
                    require('connect.php');
                    $se = "SELECT * FROM typematiere order by nom_typmat asc";
                    echo '<option value="">Selectionnez un type de matière</option>';
                    if($sel = $connec -> query($se)){
                        while($sele = $sel -> fetch()){
                           echo '<option value="'.$sele['id_typmat'].'">'.$sele['nom_typmat'].'</option>';
                        }
                    }
                    ?>
                  </select>
                </div>
              </form><br>
                <div class="text-center">
                  <button class="btn btn-primary" onclick="insertnewmatiere()">Enregistrer la matière</button>
                </div><br/>
                <div id="resultinsertmatiere">

                </div>

            </div>
          </div>

        </div>


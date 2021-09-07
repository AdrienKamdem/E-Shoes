<?php
//require 'varSession.inc.php';

//print_r($sneakers["categorie"]);
//print_r($categories['sneakers']);
// print_r($categories[0]["produits"]);
?>
 <!-- ############### Menu verticale ######################### -->
 <div class="navV">
            <nav class="nav-menuV">
              <div class="div-menuV">
                <!-- CATEGORIES-->
                <div class="div-categories">
                  <ul class="ul-categories">

                    <div class="titreElement">
                      <span class="data-filtre">Categories</span>
                    </div>

                    <div class="elementCentreGauche" id="elementCentreGauche-categories">
                      <li>
                        <span>
                          <input type="radio" name="categories" class="icon-tic" id="tousproduits">
                        <!--  <label for="sneakers2"class="checkmark data-filtre"><a href="sneakers.php" class="lien-sneakers"></a></label>-->
                          <label for="tousproduits" class="data-filtre"><a href="index.php" class="lien-tousproduits" >Tous nos produits</a></label>
                        </span>
                      </li>

<?php 
// CONNEXION A LA BDD
$id_connexion=connexion_BDD($host, $user, $password,$db);   
        // Création et envoi de la requête
        $query = "SELECT * FROM `categories`";
        $produits =recupération_données($id_connexion,$query);
        foreach ($produits as $key => $value)
        {
          $idC= $produits[$key][0];
          $categorie= $produits[$key][1];
         // print_r($categorie);
         // echo '<br>';

          ?>
           <li>
                        <span>
                          <input type="radio" name="categories" class="icon-tic" id="<?= $categorie ?>">
                          <label for="<?= $categorie ?>" class="data-filtre"><a href="produits.php?categorie=<?= $categorie ?>" class="lien-<?= $categorie ?>"><?= $categorie ?></a></label>
                        </span>
                      </li>

          <?php
        }
?>
                     

                      <!--<li>
                        <span>
                          <input type="radio" name="categories" class="icon-tic" id="chaussureshabille">
                       
                          <label for="chaussureshabille" class="data-filtre"><a href="produits.php?categorie=Chaussures de Ville" class="lien-chaussureshabilles">Chaussures de Ville</a></label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="radio" name="categories" class="icon-tic" id="chaussuresdesport">
                       
                          <label for="chaussuresdesport" class="data-filtre"><a href="produits.php?categorie=Chaussures de Sport" class="lien-chaussuresdesport">Chaussures de Sport</a></label>
                        </span>
                      </li> -->
                    </div>
                  </ul>
                </div>
                <!-- Afficher/Masquer le Stock-->
                <div class="aff-stock titreElement" style="<?php if (!(isset($_SESSION['email'])) || $_SESSION['email'] !='admin.eshoes@eshoes.fr'){
                 echo 'display:none;';} ?>">
                    <label for="icon-tic-stock" class="deroulant">
                      <h6 id="aff-stock"class="data-filtre">Afficher le stock disponible </h6>
                    </label>
                    <input type="checkbox" name="chevron" class="icon-tic" id="icon-tic-stock" >
                    <label for="icon-tic-stock" class="checkmark" id="fake-check-stock"></label>
                </div>
                <!-- Div filtre selon le sexe-->
                <div class="div-sexe">
                  <ul class="ul-sexe">

                    <div class="titreElement">
                      <label for="chevron-input-sexe" class="deroulant">
                        <span class="data-filtre">Sexe</span>
                      </label>                      
                    </div>

                    <input type="checkbox" name="chevron" id="chevron-input-sexe">
                    <label for="chevron-input-sexe" class="chevron"></label>

                    <div class="elementCentreGauche">

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Homme">
                          <label for="Homme"class="checkmark data-filtre"></label>
                          <label for="Homme" class="data-filtre">Homme</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Femme">
                          <label for="Femme"class="checkmark data-filtre"></label>
                          <label for="Femme" class="data-filtre">Femme</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Mixte">
                          <label for="Mixte"class="checkmark data-filtre"></label>
                          <label for="Mixte" class="data-filtre">Mixte</label>
                        </span>
                      </li>

                    </div>

                  </ul>
                </div>
                <!-- Div filtre selon le sexe-->
                <div class="div-enfants">
                  <ul class="ul-enfants">

                    <div class="titreElement">
                      <label for="chevron-input-enfant" class="deroulant">
                        <span class="data-filtre">Enfant</span>
                      </label>
                    </div>

                    <input type="checkbox" name="chevron" id="chevron-input-enfant" >
                    <label for="chevron-input-enfant" class="chevron"></label>

                    <div class="elementCentreGauche">

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Fille">
                          <label for="Fille"class="checkmark data-filtre"></label>
                          <label for="Fille" class="data-filtre">Fille</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Garcon">
                          <label for="Garcon"class="checkmark data-filtre"></label>
                          <label for="Garcon" class="data-filtre">Garçon</label>
                        </span>
                      </li>

                    </div>

                  </ul>
                </div>
                <!-- Div filtre selon le sexe-->
                <div class="div-prix">
                  <ul class="ul-prix">

                    <div class="titreElement">
                      <label for="chevron-input-prix" class="deroulant">
                        <span class="data-filtre">Prix</span>
                      </label>                                         
                    </div>

                    <input type="checkbox" name="chevron" id="chevron-input-prix" >
                    <label for="chevron-input-prix" class="chevron"></label>

                    <div class="elementCentreGauche">
                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Moins50">
                          <label for="Moins50"class="checkmark data-filtre"></label>
                          <label for="Moins50" class="data-filtre">Moins de 50$</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Entre50et100">
                          <label for="Entre50et100"class="checkmark data-filtre"></label>
                          <label for="Entre50et100" class="data-filtre">Entre 50$ et 100$</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Entre100et150">
                          <label for="Entre100et150"class="checkmark data-filtre"></label>
                          <label for="Entre100et150" class="data-filtre">Entre 100$ et 150$</label>
                        </span>
                      </li>

                      <li>
                        <span>
                          <input type="checkbox" class="icon-tic" id="Plusde150">
                          <label for="Plusde150"class="checkmark data-filtre"></label>
                          <label for="Plusde150" class="data-filtre">Plus de 150$</label>
                        </span>
                      </li>

                    </div>

                  </ul>
                </div>

                
              </div>
            </nav>
          </div>
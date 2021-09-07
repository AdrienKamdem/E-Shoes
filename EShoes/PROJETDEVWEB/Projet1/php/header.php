<?php
ob_start();

//require 'php\varSession.inc.php';
//var_dump($categories);
?>
<!--CE DIV va permettre de faire du gris pour l'arriere plan quand la side barre sera activé-->
<div class="background-side-bar"></div>
    <!-- ############### Menu verticale 2 quand <750px pour faire apparaitre filtres ######################### -->
    <div class="navV2">
      <!-- Bouton pour fermer la nav2-->
      <nav class="container-btn-close-filtre">
        <button class="btn-close-filtre">
          <svg fill="#111" viewBox="0 0 24 24">
            <path d="M12 0C9.813 0 7.8.533 5.96 1.6A11.793 11.793 0 0 0 1.6 5.96C.533 7.8 0 9.813 0 12s.533 4.2 1.6 6.04a11.793 11.793 0 0 0 4.36 4.36C7.8 23.467 9.813 24 12 24s4.2-.533 6.04-1.6a11.793 11.793 0 0 0 4.36-4.36C23.467 16.2 24 14.187 24 12s-.533-4.2-1.6-6.04a11.793 11.793 0 0 0-4.36-4.36C16.2.533 14.187 0 12 0zm5.2 15.28l-1.92 1.92L12 13.84 8.72 17.2 6.8 15.28 10.16 12 6.8 8.72 8.72 6.8 12 10.08l3.28-3.28 1.92 1.92L13.92 12l3.28 3.28z"></path>
          </svg>
        </button>
      </nav>
      <!-- 2eme menu avec les filtres-->
      <nav class="nav-menuV2">
        <div class="div-menuV2">

          <div class="header-filtre titreElement">
            <h2 class="data-filtre">Filtrer</h2>
          </div>
              
          <div class="div-trierpar">
            <ul class="ul-trierpar">
              <div class="titreElement">
                <span class="data-filtre">Trier par</span>    
              </div>
              <div class="elementCentreGauche">
                <li>
                  <span>
                    <input type="radio" class="icon-tic" name="trierpar" id="lesplusrecents" checked>
                    <label for="lesplusrecents"class="checkmark data-filtre"></label>
                    <label for="lesplusrecents" class="data-filtre">Les plus Recents</label>
                  </span>
                </li>
                <li>
                  <span>
                    <input type="radio" class="icon-tic" name="trierpar" id="prixdecroissant">
                    <label for="prixdecroissant"class="checkmark data-filtre"></label>
                    <label for="prixdecroissant" class="data-filtre">Prix Décroissant</label>
                  </span>
                </li>
                <li>
                  <span>
                    <input type="radio" class="icon-tic" name="trierpar" id="prixcroissant">
                    <label for="prixcroissant"class="checkmark data-filtre"></label>
                    <label for="prixcroissant" class="data-filtre">Prix Croissant</label>
                  </span>
                </li>
              </div>
            </ul>
          </div>

          <div class="div-categories">
            <ul class="ul-categories">

              <div class="titreElement">
                <span class="data-filtre">Categories</span>   
              </div>

              <div class="elementCentreGauche">

                <li>
                  <span>
                    <input type="radio" name="categories" class="icon-tic" id="tousproduits2">
                  <!--  <label for="sneakers2"class="checkmark data-filtre"><a href="sneakers.php" class="lien-sneakers"></a></label>-->
                    <label for="tousproduits2" class="data-filtre"><a href="index.php" class="lien-tousproduits2">Tous nos produits</a></label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="radio" name="categories" class="icon-tic" id="sneakers2">
                    <!--<label for="sneakers2"class="checkmark data-filtre"><a href="sneakers.php" class="lien-sneakers2"></a></label> -->
                    <label for="sneakers2" class="data-filtre"><a href="produits.php?categorie=sneakers" class="lien-sneakers2">Sneakers</a></label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="radio" name="categories" class="icon-tic" id="chaussureshabille2">
                  <!-- <label for="chaussureshabille2"class="checkmark data-filtre"><a href="chaussurehabille.php" class="lien-chaussureshabilles2"></a></label>-->
                    <label for="chaussureshabille2" class="data-filtre"><a href="produits.php?categorie=Chaussures de Ville" class="lien-chaussureshabilles2">Chaussures de Ville</a></label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="radio" name="categories" class="icon-tic" id="chaussuresdesport2">
                  <!-- <label for="chaussuresdesport2"class="checkmark data-filtre"><a href="produits.php" class="lien-chaussuresdesport2"></a></label>-->
                    <label for="chaussuresdesport2" class="data-filtre"><a href="produits.php?categorie=sport" class="lien-chaussuresdesport2">Chaussures de Sport</a></label>
                  </span>
                </li>
              </div>
            </ul>
          </div>

          <div class="aff-stock titreElement" style="<?php if (!(isset($_SESSION['email'])) || $_SESSION['email'] !='admin.eshoes@eshoes.fr'){
                 echo 'display:none;';} ?>">
            <label for="icon-tic-stock2" class="deroulant">
              <h6 id="aff-stock2" class="data-filtre">Afficher le stock disponible </h6>
            </label>
            <input type="checkbox" name="chevron" class="icon-tic" id="icon-tic-stock2" >
            <label for="icon-tic-stock2" class="checkmark" id="fake-check-stock2"></label>
          </div>
          <!-- DIV FILTRE SELON LE SEXE-->
          <div class="div-sexe">
            <ul class="ul-sexe">
              <div class="titreElement">
                <span class="data-filtre">Sexe</span>
              </div>
              <div class="elementCentreGauche">

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Homme2">
                    <label for="Homme2"class="checkmark data-filtre"></label>
                    <label for="Homme2" class="data-filtre">Homme</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Femme2">
                    <label for="Femme2"class="checkmark data-filtre"></label>
                    <label for="Femme2" class="data-filtre">Femme</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Mixte2">
                    <label for="Mixte2"class="checkmark data-filtre"></label>
                    <label for="Mixte2" class="data-filtre">Mixte</label>
                  </span>
                </li>
              </div>
            </ul>
          </div>
          <!-- DIV FILTRE SELON ENFANTS-->
          <div class="div-enfants">
            <ul class="ul-enfants">

              <div class="titreElement">
                <span class="data-filtre">Enfant</span>
              </div>
              <div class="elementCentreGauche">

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Fille2">
                    <label for="Fille2"class="checkmark data-filtre"></label>
                    <label for="Fille2" class="data-filtre">Fille</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Garcon2">
                    <label for="Garcon2"class="checkmark data-filtre"></label>
                    <label for="Garcon2" class="data-filtre">Garçon</label>
                  </span>
                </li>

              </div>
            </ul>
          </div>
          <!-- DIV FILTRE SELON PRIX-->
          <div class="div-prix">
            <ul class="ul-prix">
              <div class="titreElement">
                <span class="data-filtre">Prix</span>                                  
              </div>
              <div class="elementCentreGauche">
                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Moins502">
                    <label for="Moins502"class="checkmark data-filtre"></label>
                    <label for="Moins502" class="data-filtre">Moins de 50$</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Entre50et1002">
                    <label for="Entre50et1002"class="checkmark data-filtre"></label>
                    <label for="Entre50et1002" class="data-filtre">Entre 50$ et 100$</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Entre100et1502">
                    <label for="Entre100et1502"class="checkmark data-filtre"></label>
                    <label for="Entre100et1502" class="data-filtre">Entre 100$ et 150$</label>
                  </span>
                </li>

                <li>
                  <span>
                    <input type="checkbox" class="icon-tic" id="Plusde1502">
                    <label for="Plusde1502"class="checkmark data-filtre"></label>
                    <label for="Plusde1502" class="data-filtre">Plus de 150$</label>
                  </span>
                </li>

              </div>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  <?php
  include 'php\connexion.php';
  ?>
  <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
  <header>
    <!-- TOP AVANT HEADER -->
    <div class="container-top">

      <div class="top-logo">
        <ul class="ul-logo">
          <li><img id="imglogo2" src="img\logo2.png" width="80px" height="30px" ></li>
          <li><img id="imglogo4" src="img\logo4.png" width="60px"height="30px" ></li>
        </ul>
      </div>

      <nav class="top-nav">
        <ul class="top-ul">
        <?php
            if (!isset($_SESSION['email'])) {
           
        ?>
          <li>
            <!--  C'est ici qu'on va cliquer pour afficher le formulaire de connexion => SI checked, afficher, sinon pas afficher -->
          <label for="show" class=" check-connexion show-btn">Connexion</label>
          </li>
          <li id="sep-top-connexion">|</li>
          <li><a href="inscription.php" id="lien-inscription">Inscription</a></li>

          <?php 
            }else{
              ?>
             
              <li>
            <label class=""> Bonjour <?php echo $_SESSION['prenom'] ?></label>
            </li>
            <li id="sep-top-connexion">|</li>
            <li><a href="deconnexion.php" id="lien-deco" class='btn-deco'>Déconnexion</a></li>
            <?php 
            }
          ?>
        </ul>
      </nav>
      
    </div>
    <!-- HEADER  -->
    <div class="container-header">
      <!-- Logo E SHOES  -->  
      <div class="container-eshoes">
        <a href="index.php"><img id="imgLogo" src="img\logo.png" width="120px" height="60px"></a>
      </div>
      <!-- menu horizontal   -->
      <nav class="nav-menuH">
        <ul class="ul-menuH">
          <li><span><a href="index.php">Accueil</a></span></li>

         <?php
         if (( !isset($_SESSION['email'])) || ($_SESSION['email']!="admin.eshoes@eshoes.fr") ) {
           ?>
            <li><span><a style="cursor:pointer;" onclick="alert('Vous n\'avez pas l\'autorisation pour accéder à cette page ');">Espace Admin</a></span></li>
            <?php
         } else
         {
           ?>
           <li><span><a style="cursor:pointer;" href="gestioncompte.php?admin=<?= $_SESSION['mdp'] ?>">Espace Admin</a></span></li>
           <?php
         }
         
         ?>
                
          <li><span><a href="contact.php">Contact</a></span></li>
        </ul>
      </nav>
      <!-- Barre de recherche  -->
      <div class="bar-recherche ">
        <div class="container-searchBar">
          <ul class="ul-searchBar">
            <li class="icon-loupe"><button><svg class="searchInputIcon" fill="#111" height="24px" width="24px" viewBox="0 0 24 24"><path d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.39zM11 18a7 7 0 1 1 7-7 7 7 0 0 1-7 7z"></path></svg></button></li>
            <li class="li-searchBar"><input type="text" name="recherche" placeholder="Rechercher"></li>
          </ul>
        </div>
      </div>
      <!-- Icones panier et favoris  -->
      <div class="container-icon">
        <ul class="ul-icon">

          <li id="li-contient-loupe">
            <span><a id="open-searchBar">
              <svg id="loupe" height="24px" width="24px" viewBox="0 0 24 24">
                <path d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.39zM11 18a7 7 0 1 1 7-7 7 7 0 0 1-7 7z">
                </path>
              </svg>
            </a></span>
          </li>
    <!-- LES FAVORIS -->
          <li>
            <span><a href="#">
              <svg class="svg" viewBox="0 0 20 20">
                  <path d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61">
                  </path>
              </svg>
            </a></span>
          </li>
            <!-- LE PANIER -->
          <li>
          <?php
          if (!isset($_SESSION['email'])) {
            ?>
             <span><a href="index.php"onclick="alert('Veuillez vous connecter pour acceder à un panier');">
            <?php
          }
          else {
            ?>
            <span><a href="panier.php">
            <?php
          }
          ?>
       
        
              <svg class="svg" viewBox="0 0 20 20">
                <path d="M17.638,6.181h-3.844C13.581,4.273,11.963,2.786,10,2.786c-1.962,0-3.581,1.487-3.793,3.395H2.362c-0.233,0-0.424,0.191-0.424,0.424v10.184c0,0.232,0.191,0.424,0.424,0.424h15.276c0.234,0,0.425-0.191,0.425-0.424V6.605C18.062,6.372,17.872,6.181,17.638,6.181 M13.395,9.151c0.234,0,0.425,0.191,0.425,0.424S13.629,10,13.395,10c-0.232,0-0.424-0.191-0.424-0.424S13.162,9.151,13.395,9.151 M10,3.635c1.493,0,2.729,1.109,2.936,2.546H7.064C7.271,4.744,8.506,3.635,10,3.635 M6.605,9.151c0.233,0,0.424,0.191,0.424,0.424S6.838,10,6.605,10c-0.233,0-0.424-0.191-0.424-0.424S6.372,9.151,6.605,9.151 M17.214,16.365H2.786V7.029h3.395v1.347C5.687,8.552,5.332,9.021,5.332,9.575c0,0.703,0.571,1.273,1.273,1.273c0.702,0,1.273-0.57,1.273-1.273c0-0.554-0.354-1.023-0.849-1.199V7.029h5.941v1.347c-0.495,0.176-0.849,0.645-0.849,1.199c0,0.703,0.57,1.273,1.272,1.273s1.273-0.57,1.273-1.273c0-0.554-0.354-1.023-0.849-1.199V7.029h3.395V16.365z">
                </path>
              </svg>
            </a></span>
          </li>

          <li class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </li>
          
        </ul>
      </div>

    </div>
    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

    
    <!-- BANDEAU FIL ACTU -->
    <div class="filActu">
      <span>COVID-19 : Informations sur les délais de livraison.
        <a href="#">Voir ici</a>
      </span> 
    </div>
  </header>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!--2eme BArre de recherche qui apparait en dessous de 650px-->
  <div class="bar-recherche2">

    <div class="container-searchBar2">
      <ul class="ul-searchBar2">
        <li class="icon-loupe2">
          <button><svg class="searchInputIcon2" fill="#111" height="24px" width="24px" viewBox="0 0 24 24">
            <path d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.39zM11 18a7 7 0 1 1 7-7 7 7 0 0 1-7 7z">
            </path>
          </svg></button>
        </li>
        <li class="li-searchBar2"><input type="text" name="recherche" placeholder="Rechercher"></li>
      </ul>
    </div>
    <!--  boutton apparait a  < 600px  -->
    <button type="submit" class="pre-close-search" >
      <span class="pre-grey-circle">
        <svg fill="#111" height="30px" width="30px" viewBox="0 0 24 24">
          <path d="M15.04 12L24 2.96 21.04 0 12 8.96 3.04 0 0 2.96 9.04 12 0 20.96 3.04 24 12 14.96 21.04 24 24 20.96z"></path>
        </svg>
      </span>
    </button>

  </div>
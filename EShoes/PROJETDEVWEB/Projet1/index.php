
<?php 
require 'php\varSession.inc.php';
$_SESSION['erreur_connexion']=0;
  // Récupération des paramètres de connexion
  include "bdd/bddData.php";
  include_once "bdd/bdd.php";

// CONNEXION A LA BDD
$id_connexion=connexion_BDD($host, $user, $password,$db);   
//include_once "sql/Eshoes_data.php"; Pour remplir la bdd avec les infos
//var_dump($_SESSION['email']);
//echo' categories = ';
//var_dump($_SESSION['categories']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> E-Shoes </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/projet1_2.css">
    <link rel="stylesheet" type="text/css" href="css/connexion1.css">
    <!--<link rel="stylesheet" type="text/css" href="css\inscription.css"> -->
    <!--  <link rel="stylesheet" type="text/css" href="css\contact.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css\gestioncompte.css"> -->
    <!-- POSSIBILITE DE CONFLIT  des css!  si probleme c’est ici-->
  </head>
<!-- BODY-->
<body>
<?php 

require 'php/header.php';
?>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!-----------------CONSTRUCTION DU container OU IL Y A LES PRODUITS------------------------------>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

  <!-- HEADER body-->
  <div class="grand-body">
    <div class="header-body">
        <div class="divHeader">
          <div>
            <h2>Tous nos produits</h2>
          </div>

          <div class="container-icon-filtre">
            <div class="icon-filtre"></div>
          </div>
        </div>    
    </div>
    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
    <!-- ############### Corp de la page ######################### -->
    <div class="contenuBody">

               
      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->  
      <?php
      include 'php/menuV.php';
      
      ?>  
      
      <!-- Container de tous nos produits -->
      <div class="container-produits">
      <div class="sous-produits">
        <?php

        $query = "SELECT * FROM produits";
        $produits =recupération_données($id_connexion,$query);
        foreach ($produits as $key => $value) {

       // echo '<br> Article '.$key;
       // print_r($produits[$key]);
       // echo '<br>';
       // var_dump($key) ;
        $id= $produits[$key][0];
       // echo $id;
        $img= $produits[$key][1];
        $nom= $produits[$key][2];
        $desc= $produits[$key][3];
        $prix= $produits[$key][4];
        $cat= $produits[$key][5];
        $stock= $produits[$key][6];
                  ?>
            <div class="produit" >
              <div class="divImage"id="img<?= $key ?>">
                <img class="img img<?= $key ?>"  src="<?= $img ?>">
              </div>

              <div class="spanDescription">
                <ul>
                  <li><span class="noirNom" id='add<?= $key ?>nom'><?= $nom ?> </span></li>
                  <li><span class="redDesc"><?= $desc ?> </span></li>
                  <li><span class="noirNom"><?= $cat ?> </span></li>
                  <li><span class="noirPrix">Prix:<?= $prix ?> $</span></li>
                  <li><span class="stock">Stock : &nbsp;<p class="valstockplus<?= $key ?> valstockmoins<?= $key ?>"><?= $stock ?></p></span></li>

                </ul>
                <div class="commander">
                    <button type="button" class="moins plus<?= $key ?>" id="moins<?= $key ?>" disabled>-</button>
                    <input type="text" value="0" name="quantite" id="quantite<?= $key;?>" class="quantite stkplus<?= $key ?> stkmoins<?= $key ?> add<?= $key ?>quantite"readonly>
                    <button  type="button"class="plus moins<?= $key ?>" id="plus<?= $key ?>">+</button>
                  </div>
                  <div class="ajouterPanier">
                    <?php if (!isset($_SESSION['email'])) {
                     ?>
                    <a href="index.php" onclick="alert('Veuillez vous connecter pour acceder à un panier');"><button class="btn-panier">Ajouter au panier</button></a>
                     <?php
                    } else { ?>
                   <a href="#" onclick=" this.href='panier.php?action=add&amp;quantite='+ document.querySelector('#quantite<?= $key; ?>').value +'&amp;idproduit=<?=$id?>'"><button class="btn-panier btn-add" id='add<?= $key ?>'>Ajouter au panier</button></a> 
                   <!-- <input type="submit" class="btn-panier" value="Ajouter au panier">-->
                   <?php } ?>
                  </div>
              </div>
            </div>
           
      <?php
      }
      ?>
          

        </div>
      </div>

    </div>
  </div>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
<?php
include 'php/footer.php';
// Libération de la ressource et déconnexion de la base de données
deconnexion_BDD($id_connexion);
?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/test_ajax2.js"></script>
  <script  type="text/javascript" src="js\index.js"></script>
  
  <script src="js\connexion.js"></script> 
</body>

</html>




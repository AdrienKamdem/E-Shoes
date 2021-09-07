<?php 
  //session_start();
  // Récupération des paramètres de connexion
  include "bdd/bddData.php";
  include_once "bdd/bdd.php";

// CONNEXION A LA BDD
$id_connexion=connexion_BDD($host, $user, $password,$db);   
if (!isset($_GET['admin'])) {
  header('location:page_error.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> E-Shoes </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\projet1.css">
    <link rel="stylesheet" type="text/css" href="css\connexion.css">
    <!--<link rel="stylesheet" type="text/css" href="css\inscription.css">-->
    <link rel="stylesheet" type="text/css" href="css\contact.css">
    <link rel="stylesheet" type="text/css" href="css\admin5.css">
    <!-- POSSIBILITE DE CONFLIT  des css!  si probleme c’est ici-->
  </head>
<!-- BODY-->
<body>
<?php 
include 'php\header.php';
?>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!-----------------CONSTRUCTION DU container OU IL Y A LES PRODUITS------------------------------>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

  <!-- HEADER body-->
  <div class="grand-body-admin">

    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
 
    <!-- ############### Corp de la page ######################### -->

    <div class="header-body-admin">
        <div class="divHeader-admin">
          <div>
            
            <h2><a href="gestioncompte.php">Espace Admin</a></h2>
            <ul class="membres-produits">
              <li><div><a href="gestioncompte.php?espace=produits&amp;admin=<?= $_SESSION['mdp'] ?>">Les produits</a></div></li>
              <li><div><a href="gestioncompte.php?espace=membres&amp;admin=<?= $_SESSION['mdp'] ?>">Les Membres</a></div></li>
            </ul>
          </div>

        </div>    
    </div>
    <?php
      //include 'php\menuV.php';
      ?> 
      
      <div class="Tableau-données">

        <table id='table_produits'>
        <?php 
      if( (isset($_GET['espace'])) &&($_GET['espace']=='produits') ){
        ?>
            <tr>

              <td>Aperçu</td>
              <td>Nom</td>
              <td>Description</td>
              <td>Prix</td>
              <td>Categorie</td>
              <td>Stock</td>
              <td>Action</td>

            </tr>
            <tr>

                <td><input type="text" name="Img" id="new_img" placeholder="source de votre image"></td>
                <td><input type="text" name="nom" id="new_nom" placeholder="nom du produit"></td>
                <td><input type="text" name="desc" id="new_desc" placeholder="Description( ex: chaussure Homme) "></td>
                <td><input type="number" name="prix" id="new_prix" placeholder="prix ( en $ )"></td>
                <td><input type="text" name="cat" id="new_cat" placeholder="Categorie"></td>
                <td><input type="number" name="stock" id="new_stock" placeholder="Stock disponible"></td>
                <td><a href="#" onclick=" this.href= 'traitement_admin.php?action=add_produit&amp;img='+ document.querySelector('#new_img').value+'&amp;nom='+ document.querySelector('#new_nom').value +'&amp;desc='+ document.querySelector('#new_desc').value +'&amp;prix='+ document.querySelector('#new_prix').value +'&amp;cat='+ document.querySelector('#new_cat').value +'&amp;stock='+ document.querySelector('#new_stock').value +''" class="modifier_données">Ajouter l'article</a></td>

               
                

            </tr>
            
    <?php

        $query = "SELECT * FROM produits";
        $produits =recupération_données($id_connexion,$query);
        foreach ($produits as $key => $value) {
          $idP=$produits[$key][0];
        $img= $produits[$key][1];
        $noirNom= $produits[$key][2];
        $desc= $produits[$key][3];
        $prix= $produits[$key][4];
        $cat= $produits[$key][5];
        $stock= $produits[$key][6];
        ?>

        <tr class="ligne">
        
          <td class="data"><img class="apercu" id="img<?= $key ?>" src="<?= $img ?>"></td>
          <td class="data"><input type="text" id="nom<?= $key ?>" value="<?= $noirNom ?>" ></td>
          <td class="data"><input type="text" id="desc<?= $key ?>" value="<?= $desc ?>" ></td>
          <td class="data"><input type="number" id="prix<?= $key ?>" value="<?= $prix ?>" ></td>
          <td class="data"><input type="text" id="cat<?= $key ?>" value="<?= $cat ?>" ></td>
          <td class="data"><input type="number" id="stock<?= $key ?>" value="<?= $stock ?>" ></td>
          <td class="data">
          <?php   
          // JE RECUPERE  LES VALEURS DES INPUTS
          


          ?>
          <ul>
          <li><a href="#" onclick=" this.href= 'traitement_admin.php?action=modif_produit&amp;idP=<?= $idP ?>&amp;nom='+ document.querySelector('#nom<?= $key; ?>').value +'&amp;desc='+ document.querySelector('#desc<?= $key; ?>').value +'&amp;prix='+ document.querySelector('#prix<?= $key; ?>').value +'&amp;cat='+ document.querySelector('#cat<?= $key; ?>').value +'&amp;stock='+ document.querySelector('#stock<?= $key; ?>').value +'&amp;'" class="modifier_données">Modifier l'article</a></li>
         
          <li><a href="traitement_admin.php?action=suppr_produit&amp;idP=<?= $idP ?>" class="supprimer_données">Supprimer l'article</a></li>

          </ul>
          
         
          </td>


        </tr>

      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->    

    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <?php
      }
      ?>
  
  <?php
      }elseif ( (isset($_GET['espace'])) &&($_GET['espace']=='membres') ) {
      
        ?>

            <tr id='table_membres'>

              <td>Nom</td>
              <td>Prénom</td>
              <td>Date de Naissance</td>
              <td>Code Postal</td>
              <td>Email</td>
              <td>Mot de passe</td>
              <td>Action</td>

            </tr>

    <?php

        $query = "SELECT * FROM clients";
        $clients =recupération_données($id_connexion,$query);
        foreach ($clients as $key => $value) {
        $idC= $clients[$key][0];
        $nom= $clients[$key][1];
        $prenom= $clients[$key][2];
        $ddn= $clients[$key][3];
        $adresse= $clients[$key][4];
        $ville= $clients[$key][5];
        $cp= $clients[$key][6];
        $mail= $clients[$key][7];
        $mdp= $clients[$key][8];
        ?>

        <tr class="ligne">
        

          <td class="data"><input class="apercu" id="nom<?= $key ?>" value="<?= $nom ?>" readonly></td>
          <td class="data"><input class="apercu" id="prenom<?= $key ?>" value="<?= $prenom ?>" value="<?= $prenom ?>" readonly></td>
          <td class="data"><input class="apercu" id="ddn<?= $key ?>" value="<?= $ddn ?>" value="<?= $ddn ?>" readonly></td>
          <td class="data"><input class="apercu" id="cp<?= $key ?>" value="<?= $cp ?>"  value="<?= $cp ?>" readonly></td>
          <td class="data"><input class="apercu" id="mail<?= $key ?>" value="<?= $mail ?>" value="<?= $mail ?>" readonly></td>
          <td class="data"><input class="apercu" id="mdp<?= $key ?>" value="<?= $mdp ?>" value="<?= $mdp ?>" readonly></td>

          <td class="data">  
          <ul>
            <li><a href="traitement_admin.php?action=suppr_client&amp;email=<?= $mail ?>" class="supprimer_données" onclick="alert('l\'utilisateur a bien été supprimé')">Supprimer l'utilisateur</a></li>
          </ul>         
          </td>


        </tr>

      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->    
      <?php
      }
      }
      else {
        ?>
        <div>Bienvenue sur l'espace Admin,<span class='pseudo-admin'><?= $_SESSION['prenom']; ?></span></div>
        <div>Que voulez-vous faire?</div>
        <div class="choix">
          <ul>
            
            <li class="li_choix"><a href="gestioncompte.php?espace=membres">Accéder aux membres</a></li>
            <li class="li_choix"><a href="gestioncompte.php?espace=produits">Accéder aux produits</a></li>
          </ul>
        </div>

        <?php
      }
      ?>

    <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

  </table>
  </div>
  </div>
 

  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <?php
include 'php\footer.php';
deconnexion_BDD($id_connexion);
?>

  <script src="js\inde.js"></script>
  <script src="js\connexion.js"></script>
</body>

</html>




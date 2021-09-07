<?php 
ob_start();
// Récupération des paramètres de connexion
include "bdd/bddData.php";
include "bdd/bdd.php";

// CONNEXION A LA BDD
  $id_connexion=connexion_BDD($host, $user, $password,$db);    
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
    <link rel="stylesheet" type="text/css" href="css\inscription.css">
    <!--<link rel="stylesheet" type="text/css" href="css\contact.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css\gestioncompte.css">-->
    <!-- POSSIBILITE DE CONFLIT  des css!  si probleme c’est ici-->
  </head>
<!-- BODY-->
<body>
<?php 
include 'php/header.php';
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
            <h2>Inscription</h2>
          </div>
          <div class="container-icon-filtre">
            <div class="icon-filtre"></div>
          </div>  
        </div>    
    </div>
    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
    <!-- ############### Corp de la page ######################### -->
    <div class="contenuBody">
    <?php 
include 'php\menuV.php';
?>
<?php

if (isset($_POST['inscription'])) 
{
  $validation_inscription=0;
  $validCP = '/^([0-9]{5})$/';// ou juste [0-9]{5}
  $validmail = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/';
  $contientMaj='/[A-Z]{1,}/';

  $contientMin='/[a-z]{1,}/';

  $contientChiffre='/[0-9]{1,}/';
  if (
     (!empty($_POST['nom']))&& (!empty($_POST['prenom'])) 
     && (!empty($_POST['ddn']))&& (!empty($_POST['ville']))
     && (!empty($_POST['adresse']))&& (!empty($_POST['CP']))
     && (!empty($_POST['email']))&& (!empty($_POST['mdp']))
     && (!empty($_POST['confirm-mdp']))
     ) 
     {
        if (   (preg_match($validCP,$_POST['CP']))&&
               (preg_match($validmail,$_POST['email'])) &&
                ((preg_match($contientChiffre,$_POST['mdp']))&&
                (preg_match($contientMin,$_POST['mdp']))&&
                (preg_match($contientMaj,$_POST['mdp']))&&
                (strlen($_POST['mdp'])>=4)&&
                ($_POST['confirm-mdp']==$_POST['mdp']))  ) 
        {
          
          $query='SELECT * FROM clients';
          if ( ! ($result = mysqli_query($id_connexion, $query))) {
            echo "Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
            et le message : " . mysqli_error($id_connexion) . "<br>";
           return false;
            } 
            else
            {
              echo 'heo';
              $validation_inscription = 1;
              while ( $row = mysqli_fetch_row($result)) 
              {
                echo '<br> BDD =>'.$row[7];
                echo '<br> email =>'.$_POST['email'];
                if ($row[7] == $_POST['email'] ) {
                  $erreur_mail  ='Email deja existant';
                  $validation_inscription = -1;
                  break;
                } else{
                  $validation_inscription = 1;
                }
              }
              if ($validation_inscription == 1) {
                
                //echo 'INSCRIPTION OK';
                    $nom =htmlspecialchars(strval($_POST['nom']));
                    $prenom =htmlspecialchars(strval($_POST['prenom']));
                    $ddn =htmlspecialchars(strval($_POST['ddn']));
                    $adresse =htmlspecialchars(strval($_POST['adresse']));
                    $ville =htmlspecialchars(strval($_POST['ville']));
                    $codePostal=intval($_POST['CP']);
                    $mail =htmlspecialchars(strval($_POST['email']));
                    $mdp =htmlspecialchars(strval($_POST['mdp']));
                    $_SESSION['nom']= $nom;
                    $_SESSION['prenom']= $prenom;
                    $_SESSION['ddn']= $ddn;
                    $_SESSION['adresse']= $adresse;
                    $_SESSION['ville']= $ville;
                    $_SESSION['codePostal']= $codePostal;
                    $_SESSION['email']= $mail;
                    $_SESSION['mdp']= $mdp;
                    $hash_mdp = password_hash($mdp,PASSWORD_DEFAULT);
                    creationPanier();
                $query = "INSERT INTO `clients`(`idcl`, `nom`, `prenom`, `ddn`, `adresse`, `ville`, `codePostal`, `mail`, `mdp`) 
                VALUES (`idcl`,'$nom','$prenom','$ddn' ,'$adresse','$ville','$codePostal', '$mail','$hash_mdp')";
                if ( ! ($result = mysqli_query($id_connexion, $query))) {
                  echo "<br>Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
                  et le message : " . mysqli_error($id_connexion) . "<br>";
                return false;
                  } 
                  else
                  {
                    // Libération de la ressource et déconnexion de la base de données
                    mysqli_free_result( $result );
                    header('location:index.php');
                  }
              }

            }
          
         
        }else
        {
          if (!preg_match($validCP,$_POST['CP']))  {
            $erreur_CP =" Veuillez entrer un code postal à 5 chiffres";
           }
           if (!preg_match($validmail,$_POST['email']))  {
            $erreur_mail =" Veuillez entrer un email de la forme test@test.te";
           }
          if ( (!preg_match($contientChiffre,$_POST['mdp'])) || (!preg_match($contientMaj,$_POST['mdp'])) || (!preg_match($contientMin,$_POST['mdp'])) || (strlen($_POST['mdp'])<4) )
          {
            $erreur_mdp =" Veuillez entrer un mot de passe contenant 1 majuscule, une minuscule, un chiffre et 4 caractères minimum";
          }
          if ($_POST['confirm-mdp'] !=$_POST['mdp'])
          {
            $erreur_mdp2 =" Les mots de passes ne correspondent pas";
          }
        }


        /* while (!feof($ouverture)) 
          {
            $ligne = fgets($ouverture);
            $nblignes++;
          }
          fputs($ouverture,"\n".$_POST['nom']."\n".$_POST['prenom']."\n".$_POST['email']."\n".$_POST['mdp']."\n".$separation);
          fclose($ouverture);

          header('Location:index.php');
          exit();
          */
      } 
      else
     {

        if (empty($_POST['nom'])) {
         $erreur_nom =" Veuillez remplir un Nom";
        }

        if (empty($_POST['prenom'])) {
          $erreur_prenom =" Veuillez remplir un Prénom";
         }
      
         if (empty($_POST['ddn'])) {
          $erreur_ddn =" Veuillez remplir une Date de Naissance";
         }

         if (empty($_POST['adresse'])) {
          $erreur_adresse =" Veuillez remplir une adresse";
         }

         if (empty($_POST['ville'])) {
          $erreur_ville =" Veuillez remplir une ville";
         }

         if (empty($_POST['CP']) ) {
          $erreur_CP =" Veuillez entrer un code postal à 5 chiffres";
         }

         if (empty($_POST['email']) ) {
          $erreur_mail ="Veuillez entrer un email";
         }

        if (empty($_POST['mdp'])) 
        {
          $erreur_mdp =" Veuillez entrer un mot de passe contenant 1 majuscule, une minuscule, un chiffre et 4 caractères minimum";
        }

        if (empty($_POST['confirm-mdp'])) 
        {
          $erreur_mdp2 =" Les mots de passes ne correspondent pas";
        }
     }
}


  ?> 
      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->    
      <div class="container-form">
        <div class="symbol-form"><img src="img\logo5.png"></div>
        <form action="" method="POST">
          <header>
            
            <div class="header-text">Devenez membre E Shoes</div>
            <div class="header-message">Créez votre compte E Shoes et obtenez un accès premium à tous les produits E Shoes</div>
          </header>
  
          <div class="component container-input">
            <input type="text" name="nom" placeholder="Nom" id="nom" class=" test input input1" value="<?php if (isset($_POST['nom'])) {
              echo $_POST['nom'];
            } ?>">
            <div class="error " id="errornom"><?php if(isset($erreur_nom)) {
                    echo $erreur_nom;} else { echo 'Veuillez entrer un Nom';} ?></div>
            <?php 
          /*  if (isset($erreur_nom)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_nom ?></div>
              <?php
            }*/
            ?>
          </div>
  
          <div class="component container-input">
            <input type="text" name="prenom" placeholder="Prénom" id="Prenom" class="test input input2"value="<?php if (isset($_POST['prenom'])) {
              echo $_POST['prenom'];
            } ?>">
            <?php 
          /*  if (isset($erreur_prenom)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_prenom ?></div>
              <?php
            }*/
            ?>          
            <div class="error" id="errorPrenom"><?php if(isset($erreur_prenom)) {
                    echo $erreur_prenom;} else { echo 'Veuillez enter un Prénom valide';} ?></div>
          </div>
  
          <div class="component container-input container-ddn">
            <input class=" test input-ddn input3"  type="text" name="ddn" placeholder="Date de Naissance" id="ddn" value="<?php if (isset($_POST['ddn'])) {
              echo $_POST['ddn'];
            } ?>">
            <?php 
            /*if (isset($erreur_ddn)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_ddn ?></div>
              <?php
            }*/
            ?>              
            <div class="error"id="errorddn"><?php if(isset($erreur_ddn)) {
                    echo $erreur_ddn;} else { echo 'Veuillez entrer une date de Naissance valide';} ?></div>
          </div>
  
          <div class="component container-input">
            <input type="text" name="adresse" placeholder="Adresse" id="adresse" class=" test input input4" value="<?php if (isset($_POST['adresse'])) {
              echo $_POST['adresse'];
            } ?>">
            <?php 
           /* if (isset($erreur_adresse)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_adresse ?></div>
              <?php
            }*/
            ?>  
            <div class="error" id="erroradresse"><?php if(isset($erreur_adresse)) {
                    echo $erreur_adresse;} else { echo 'Veuillez entrer une Adresse valide';} ?></div>
          </div>
  
          <div class="component container-input">
  
            <input type="text" name="ville" placeholder="Ville" id="ville" class=" test input input5" value="<?php if (isset($_POST['ville'])) {
              echo $_POST['ville'];
            } ?>">
            <?php 
           /* if (isset($erreur_ville)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_ville ?></div>
              <?php
            }*/
            ?>  
            <div class="error" id="errorville"><?php if(isset($erreur_ville)) {
                    echo $erreur_ville;} else { echo 'Veuillez entrer une Ville valide';} ?></div>
          </div>
  
          <div class="component container-input">
            
            <input type="number" name="CP" placeholder="Code Postal" id="CP" class="test input6" value="<?php if (isset($_POST['CP'])) {
              echo $_POST['CP'];
            } ?>">
            <?php 
           /* if (isset($erreur_CP)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_CP ?></div>
              <?php
            }*/
            ?> 
            <div class="error errorCP"id="errorCP"><?php if(isset($erreur_CP)) {
                    echo $erreur_CP;} else { echo 'Veuillez entrer un CP valide';} ?></div>
            <div class="suggestion suggestionCP">5 chiffres exactement</div>
          </div>
  
          <div class="component container-input">
            <input type="email" name="email" placeholder="Adresse mail" id="mail" class=" test input7" value="<?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } ?>">
            <?php 
           /* if (isset($erreur_mail)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_mail ?></div>
              <?php
            }*/
            ?>            
            <div class="error errorEmail"id="errormail"><?php if(isset($erreur_mail)) {
                    echo $erreur_mail;} else { echo 'Veuillez entrer une Adresse mail valide';} ?></div>
          </div>
  
          <div class="component container-input">
            
            <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" class="test input8" value="<?php if (isset($_POST['mdp'])) {
              echo $_POST['mdp'];
            } ?>">
            <?php 
            /*if (isset($erreur_mdp)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_mdp ?></div>
              <?php
            }*/
            ?> 
            <div class="error errormdp" id="errormdp"><?php if(isset($erreur_mdp)) {
                    echo $erreur_mdp;} else { echo 'Veuillez entrer un mot de passe valide';} ?></div>
            <div class=" suggestion suggestionMDP">
              <div class=" condition valid-longueur-mdp"> 4 caractères</div>
              <div class="condition valid-maj-mdp">1 majuscule</div>
              <div class=" condition valid-min-mdp">1 minuscule</div>
              <div class=" condition valid-chiffre-mdp">1 chiffre</div>
            </div>
          </div>
  
          <div class="component container-input">
            <input type="password" name="confirm-mdp" placeholder="Confirmation du Mot de passe" id="mdp2" class=" test input input9" value="<?php if (isset($_POST['confirm-mdp'])) {
              echo $_POST['confirm-mdp'];
            } ?>">
            <?php 
            /*if (isset($erreur_mdp2)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_mdp2 ?></div>
              <?php
            }*/
            ?>
            <div class="error"id="errormdp2"><?php if(isset($erreur_mdp2)) {
                    echo $erreur_mdp2;} else { echo 'Les mots de passes ne correspondent pas';} ?></div>
          </div>
  
          <div class="component container-input container-genre" >
            <input type="radio" name="genre" id="homme" checked>
            <label for="homme">Homme</label>
            <input type="radio" name="genre" id="femme">
            <label for="femme">Femme</label>
            <input type="radio" name="genre" id="autre">
            <label for="autre">Autre</label>
          </div>
  
         <div class="container-submit component">
          <input type="submit" name="inscription" value="Devenir Membre" id="registerBTN" >
         </div> 
  
         <div class="component " id="container-link-inscription">
          Déjà membre?<a id="link-inscription" href="connexion.php">Connectez-vous !</a>
         </div>
  
        </form>
      </div> 


    </div>
  </div>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <?php
include 'php\footer.php';
deconnexion_BDD($id_connexion);
?>


      
  <script src="js\inde.js"></script>
  <script src="js\connexion1.js"></script>
  <script src="js\inscription2.js"></script>
  
</body>

</html>




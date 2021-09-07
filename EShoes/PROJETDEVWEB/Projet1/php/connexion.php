 <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
 <?php
include_once 'traitement_panier.php';
if (isset($_POST['emailC']))
{
  $erreurConnexion =-1;
  $validmail = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/';
  if( (!empty($_POST['emailC'])) && (preg_match($validmail,$_POST['emailC'])) )
  {
    if  (!empty($_POST['mdpC'])) 
    {
      $query='SELECT * FROM clients';
      if ( ! ($result = mysqli_query($id_connexion, $query)))
       {
          echo "Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
          et le message : " . mysqli_error($id_connexion) . "<br>";
          return false;
        } 
        else
        {
          while ( $row = mysqli_fetch_row($result)) 
          {
            $nom = $row[1];
            $prenom =$row[2];
            $ddn =$row[3];
            $adresse =$row[4];
            $ville =$row[5];
            $codePostal =$row[6];
            $mail = $row[7];
            $mdp = $row[8];
            
            
            if ($mail ==$_POST['emailC']) 
            {
              //echo $mail.'<br>';
              //echo $mdp.'<br>';
              if (password_verify($_POST['mdpC'], $mdp)) {
                //echo 'connexion OK';
                $_SESSION['nom']= $nom;
                $_SESSION['prenom']= $prenom;
                $_SESSION['ddn']= $ddn;
                $_SESSION['adresse']= $adresse;
                $_SESSION['ville']= $ville;
                $_SESSION['codePostal']= $codePostal;
                $_SESSION['email']= $mail;
                $_SESSION['mdp']= $mdp;
                creationPanier();
               unset($_SESSION['erreur_connexion']) ;
              }
              else{
                $_SESSION['erreur_connexion']=1;
                $erreur_mdpC ='Mot de passe incorrect';
                echo $erreur_mdpC;
              }
             break;
            }
            else
            {
              $_SESSION['erreur_connexion']=1;
              $erreur_emailC= 'email inexistant';
              echo $erreur_emailC;
            }
          }
        }
    }
    else
    {
      $erreur_mdpC = "Veuillez entrer un mot de passe";
      $_SESSION['erreur_connexion']=1;
    }
  }
  else
  {
    $erreur_emailC = "Veuillez entrer un email de la forme test@teeest.tt";
    $erreur_mdpC = "Veuillez entrer un mot de passe";
    $_SESSION['erreur_connexion']=1;
  }

}   
?>
  <!-- Formulaire de connexion; doit s'afficher quand on clique sur connexion, et disparaitre quand on clique sur la croix -->
  <input type="checkbox" id="show" class="checkbox-show-connexion" <?php if (isset($_SESSION['erreur_connexion']) &&($_SESSION['erreur_connexion'] ==1)) {
    ?>
    checked
    <?php
  } ?>>
  <div class="pre-window is-active">
    <div class="window-connexion">

      <label for="show" class="close-connexionBTN"><svg fill="#111" height="20px" width="25px" viewBox="0 0 24 24"><path d="M15.04 12L24 2.96 21.04 0 12 8.96 3.04 0 0 2.96 9.04 12 0 20.96 3.04 24 12 14.96 21.04 24 24 20.96z"></path></svg></label>
      <div class="container-connexion">

        <header>
          <div class="symbol-connexion"><img src="img\logo5.png"></div>
          <div class="header-text">Votre Identifiant pour rejoindre E Shoes</div>
        </header>
        <form method="POST" action="index.php">
          <div id="erreur-validationC"class=" errorC component">
            <!--Adresse e-mail ou mot de passe introuvable -->
            <?php 
            if (isset($erreurConnexion) && ($erreurConnexion==1)) {
              //echo 'Adresse e-mail ou mot de passe introuvable';
            }
            ?>
          </div>

          <div class="component container-input">
            <input class="testC" id="mailC" type="mail" name="emailC" placeholder="Adresse mail" value="<?php if (isset($_POST['emailC'])) {
              echo $_POST['emailC'];
            } ?>">
           <?php 
            /*if (isset($erreur_emailC)) {
              ?>
           <!-- <div class="errorphp"><?php  echo $erreur_emailC ?></div> -->
              <?php
            } */
            ?>
            <div class="errorC erreurmailC"><?php if(isset($erreur_emailC)) {
                    echo $erreur_emailC;} else { echo 'Veuillez entrer une adresse e-mail valide';} ?></div>
          </div>

          <div class="component container-input">
            <input class="testC inputC" id="mdpC" type="password" name="mdpC" placeholder="Mot de passe">
            <?php 
            /* if (isset($erreur_mdpC)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_mdpC ?></div>
              <?php
            } */
            ?>
            <div class="errorC err erreurmdpC"><?php if(isset($erreur_mdpC)) {
                    echo $erreur_mdpC;} else { echo 'Veuillez entrer un mot de passe';} ?></div>
          </div>

          <div class="component container-mdp-oublie"><a href="#">Mot de passe oublié?</a></div>

          <div class="container-submit component">

          <input type="submit" name="connexion" value="CONNEXION" id="submitConnexion">
            
          </div> 

          <div class="component " id="container-link-inscription">
            Pas de compte E Shoes?
            <a id="link-inscription" href="inscription.php">Inscrivez-vous !</a>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php 
//session_start();
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../PHPMailer/src/Exception.php';
require '../../../PHPMailer/src/PHPMailer.php';
require '../../../PHPMailer/src/SMTP.php';
  // Récupération des paramètres de connexion
  include "bdd/bddData.php";
  include_once "bdd/bdd.php";

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
    <link rel="stylesheet" type="text/css" href="css\contact.css">
     <!--<link rel="stylesheet" type="text/css" href="css\gestioncompte.css"> -->
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
  <div class="grand-body">
    <div class="header-body">
        <div class="divHeader">
          <div>
            <h2>Contact</h2>
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


      if (isset($_POST['envoyer'])) 
    {
      $validmail = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/';
      if (
          (!empty($_POST['nom']))&& (!empty($_POST['prenom'])) 
          && (!empty($_POST['ddc'])) && (!empty($_POST['objet']))
          && (!empty($_POST['email']))&& (!empty($_POST['message']))
          ) 
         {
            if ( (preg_match($validmail,$_POST['email'])) )
            {
              $to = $_POST['email'];
              $objet = $_POST['objet'];
              $msg =$_POST['message'];
              function sendmail($to,$objet,$msg)
              {
                $mail = new PHPMailer(true);
                try {
                  $mail ->SMTPDebug = 0;
                  $mail ->isSMTP();
                  $mail->IsHTML(true);
                  $mail ->Host = 'smtp.gmail.com';
                  $mail ->SMTPAuth = true;
                  $mail ->Username = 'eshoes.infos@gmail.com';
                  $mail ->Password = "eshoes.eshoes";
                  $mail->SMTPSecure = 'ssl';//PHPMailer::ENCRYPTION_STARTTLS;//Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = 465;//TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                  //Recipients
                  $mail->setFrom('eshoes.infos@gmail.com', $to);
                //  $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
                  $mail->addAddress('eshoes.infos@gmail.com');               //Name is optional
                  $mail->addReplyTo($to, $to);
                //  $mail->addCC('cc@example.com');
                  //$mail->addBCC('bcc@example.com');

                  //Attachments
                //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                 // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = $objet;
                  $mail->Body    = $to.' vous contact :<br/>';
                  $mail->Body.= $msg;
                 // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                  $mail->send();
                echo '<script> alert("votre message a bien été envoyé")</script>';
                // header('Location:index.php');
                //exit();
                } catch (Exception $e) {
                  echo '<script> alert("Erreur lors de l\'envoi du mail")</script>';

                }
              }
              sendmail($to,$objet,$msg);
            }
          }
          else
          {
            if (empty($_POST['nom'])) {
              $erreur_nom = "Veuillez entrer un nom";
            }
            if (empty($_POST['prenom'])) {
              $erreur_prenom = "Veuillez entrer un prenom";
            }
            if (empty($_POST['ddc'])) {
              $erreur_ddc = "Veuillez entrer une date de contact";
            }
            if (empty($_POST['objet'])) {
              $erreur_objet = "Veuillez donner l'objet de ce mail";
            }
            if (empty($_POST['message'])) {
              $erreur_message = "Veuillez entrer un message valide";
            }
            if( (empty($_POST['email'])) || (!preg_match($validmail,$_POST['email'])) ) {
              $erreur_email = "Veuillez entrer un email de la forme test@teeest.tt";
            }
          }

    }


      ?>  
      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->    
      <div class="container-form">

        <header>
          <div class="symbol-form"><img src="img\logo5.png"></div>
          <div class="header-text">Nous contacter</div>
          <div class="header-message">Un problème? Besoin de renseignement? Contacter votre responsable E Shoes</div>
        </header>
  
        <form action="" method="POST">
  
          <div class="component container-input container-ddn">
            <input class="test input-ddc" type="text" name="ddc" placeholder="Date de contact" id="ddc" value=<?php if (isset($_POST['ddc'])) {
              echo $_POST['ddc'];
            } ?>>
            <?php 
            if (isset($erreur_ddc)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_ddc ?></div>
              <?php
            }
            ?>
            <div class="error erreurddc" id="errorddc">Veuilez entrer une Date de contact</div>
          </div>
  
          <div class="component container-input">
            <input class="input test"  type="text" name="nom" placeholder="Nom" id="nom" value=<?php if (isset($_POST['nom'])) {
              echo $_POST['nom'];
            } ?>>
            <?php 
            if (isset($erreur_nom)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_nom ?></div>
              <?php
            }
            ?>
            <div class="error erreurnom" id="errornom">Veuilez entrer un nom</div>
          </div>
  
          <div class="component container-input">
            <input class="input test" type="text" name="prenom" placeholder="Prénom" id="Prenom" value=<?php if (isset($_POST['prenom'])) {
              echo $_POST['prenom'];
            } ?>>
            <?php 
            if (isset($erreur_prenom)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_prenom ?></div>
              <?php
            }
            ?>
            <div class="error erreurprenom" id="errorPrenom">Veuilez entrer un prenom</div>
          </div> 
  
          <div class="component container-input container-genre">
            <input type="radio" name="genre" id="homme" checked>
            <label for="homme">Homme</label>
            <input type="radio" name="genre" id="femme">
            <label for="femme">Femme</label>
            <input type="radio" name="genre" id="autre">
            <label for="autre">Autre</label>
          </div>
  
          <div class="component container-input">
            <input class="test" type="mail" name="email" placeholder=" Votre adresse mail" id="mail" value=<?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } ?>>
            <?php 
            if (isset($erreur_email)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_email ?></div>
              <?php
            }
            ?>
            <div class="error errreurmail" id="errormail">Veuillez entrer une adresse mail valide</div>
          </div>
  
          <div class="component container-input">
            <input class="input test" type="text" name="objet" placeholder="objet" id="objet" value=<?php if (isset($_POST['objet'])) {
              echo $_POST['objet'];
            } ?>>
            <?php 
            if (isset($erreur_objet)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_objet ?></div>
              <?php
            }
            ?>
            <div class="error erreurobjet" id="errorobjet">Veuillez entrer un objet</div>
          </div>
  
          <div class="component ">
            <textarea class="input test" name="message" placeholder="Votre message" id="msg" value=<?php if (isset($_POST['message'])) {
              echo $_POST['message'];
            } ?>></textarea>
            <?php 
            if (isset($erreur_message)) {
              ?>
            <div class="errorphp"> <?php  echo $erreur_message ?></div>
              <?php
            }
            ?>
            <div class="error erreurmsg" id="errormsg">Veuillez entrer un message</div>
          </div>
  
  
         <div class="container-submit component">
          <input id="registerBTN" type="submit" name="envoyer" value="Envoyer">
          <div class="error msg-envoyer"></div>
         </div> 
  
          <div class="component " id="container-link-inscription">Pas de compte E Shoes?<a id="link-inscription" href="inscription.php">Inscrivez-vous !</a></div>
  
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

  <script src="js\inde"></script> 
  <script src="js\contact"></script> 
  <script src="js\connexion"></script>
</body>

</html>




<?php 
//session_start();
include 'traitement_panier.php';
//var_dump($_SESSION['panier']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> E-Shoes </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\commande1.css">
    <!-- POSSIBILITE DE CONFLIT  des css!  si probleme c’est ici-->
  </head>
<!-- BODY-->
<body>
<div class="header"> <h2>Bonjour <?= $_SESSION['prenom'] ?>, Merci d'avoir commandé chez Eshoes ! </h2></div>
<div class="commande">

    <div class="Recap_commande">
        <h4>Vos informations :  </h4>
    </div>
    <div class="Tableau-données">

        <table class="clients" >
            <tr class="header_tr">
        
                <td>Nom</td>
                <td>Prénom</td>
                <td>Date de Naissance</td>
                <td>Adresse de Livraison</td>
                <td>Code Postal</td>
                <td>Email</td>
            
            </tr>
            <tr>
                <td><?=$_SESSION['nom']?></td>
                <td><?=$_SESSION['prenom']?></td>
                <td><?=$_SESSION['ddn']?></td>
                <td><?=$_SESSION['adresse']?></td>
                <td><?=$_SESSION['codePostal']?></td>
                <td><?=$_SESSION['email']?></td>
            </tr>
        </table>
        <div></div>
    </div>
        <div class="Recap_commande">
            <h4>Récapitulatif de la commande :  </h4>
        </div>
        <div class="">
            <table class="articles" >


                <tr class="header_tr">
                    <td>Article</td>
                    <td>quantité</td>
                    <td>Prix</td>
                
                </tr>
                <?php
                sleep(2);
                    foreach ($_SESSION['panier']['articles'] as $key => $value) { ?>

                    <tr>
                        <td><?= $_SESSION['panier']['articles'][$key]['noirNom']; ?></td>
                        <td><?= $_SESSION['panier']['articles'][$key]['quantite']; ?></td>
                        <td><?= $_SESSION['panier']['articles'][$key]['quantite']*$_SESSION['panier']['articles'][$key]['noirPrix']; ?> $</td>
                    </tr>
                    
                <?php } ?>
            </table>
    </div>
</div>
<div class="Recap_commande">
            <h4>Prix total de la commande : <?= $_GET['total'];?>$ </h4> 
</div>
<a href="vider_panier.php?action=annuler"> Annuler </a>
<a href="vider_panier.php?action=valider"> Valider </a>

</body>
</html>
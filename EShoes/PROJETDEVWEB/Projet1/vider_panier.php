<?php 
include 'traitement_panier.php';
switch ($_GET['action']) {
    case 'annuler':
        header('Location:panier.php');
        break;
    case 'valider':
        sleep(1);
        echo "<script> alert('Merci d'avoir commandé chez Eshoes ! Un récapitulatif de transaction vous sera envoyé par mail') </script>";
        sleep(2);
        unset($_SESSION['panier']);
        creationPanier();
        header('location:index.php');
        break;
    
    default:
        header('Location:page_error.php');
        break;
}

?>
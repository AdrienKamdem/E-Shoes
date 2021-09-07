<?php
sleep(1);
session_start();
    include "bdd/bddData.php";
    include_once "bdd/bdd.php";                                        
    // CONNEXION A LA BDD
    $id_connexion=connexion_BDD($host, $user, $password,$db);
    switch ($_POST['action']) {
        case 'modif':
            $nom=$_POST['nom'];
            $modif=$_POST['modif'];

            var_dump($nom);
            $query="SELECT stock FROM produits WHERE noirNom='$nom' ";
            $result = mysqli_query($id_connexion, $query);
            $row = mysqli_fetch_row($result);
            $stock = intval($row[0]);
            
            $stock2 = $stock - $modif;
            var_dump($stock2);
            $query= "UPDATE `produits` SET `stock`='$stock2' WHERE noirNom='$nom'";
            $result = mysqli_query($id_connexion, $query);
            die('stock FINAL'.$stock2.' select = '.var_dump($row));
            break;
        case 'suppr':
            $nom=$_POST['nom']; 
            $modif=$_POST['modif'];
            $quantite= $_POST['quantite'] - $modif;
            //die('nom = '.$nom.' modif = '.$modif.' quantite = '.$quantite);
            $query="SELECT stock FROM produits WHERE noirNom='$nom' ";
            $result = mysqli_query($id_connexion, $query);
            $row = mysqli_fetch_row($result);
            $stock = intval($row[0]);
            $stock2 = $stock + $quantite;
            var_dump($stock2);
            //die('Stock FInal = '.$stock2);
            $query= "UPDATE `produits` SET `stock`='$stock2' WHERE noirNom='$nom'";
            $result = mysqli_query($id_connexion, $query);
            

            break;
        case 'add':
            $nom=$_POST['nom']; 
            $quantite= $_POST['quantite'];
            $query="SELECT stock FROM produits WHERE noirNom='$nom' ";
            $result = mysqli_query($id_connexion, $query);
            $row = mysqli_fetch_row($result);
            $stock = intval($row[0]);
            $stock2 = $stock - $quantite;
            var_dump($stock2);
            
            $query= "UPDATE `produits` SET `stock`='$stock2' WHERE noirNom='$nom'";
            $result = mysqli_query($id_connexion, $query);
           // die('nom = '.$nom.' quantite = '.$quantite.' stock final = '.$stock2);
            break;
        case 'deco':
            //$idP= $_SESSION['panier']['articles'][0]['idP'];
            
            for ($i=0; $i < count($_SESSION['panier']['articles']) ; $i++) 
             {
                 $idP= $_SESSION['panier']['articles'][$i]['idP'];
                 $quantite = $_SESSION['panier']['articles'][$i]['quantite'];
                 $query = "SELECT stock FROM produits WHERE idP=$idP";
                 $result = mysqli_query($id_connexion, $query);
                 $row = mysqli_fetch_row($result);
                 $stock = intval($row[0]);
                 $stock2 = $stock + $quantite;
                 $query= "UPDATE `produits` SET `stock`='$stock2' WHERE idP='$idP'";
                 $result = mysqli_query($id_connexion, $query);
             }
             die('stock final '.$stock2.' stock precedent '.$stock.'  quantite '.$quantite);
        default:

            break;
    }
   
?>
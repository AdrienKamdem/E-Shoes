<?php

function modifier_produit($id_connexion,$idP,$nom,$desc,$prix,$categorie,$stock)
{ if ($stock == 0) {
    supprimer_produit($id_connexion,$idP);
} else {
    // ON selectionne l'ancienne categorie du produit
    $query = "SELECT categorie FROM `produits` WHERE idP='$idP'";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_row($result);
    $ancienne_cat = strval($row[0]);
    if ($ancienne_cat == $categorie) { // on n'a pas changé la catégorie
        //ON MODIFIE uniquement L'ARTICLE
        $query= "UPDATE `produits` SET `noirNom`='$nom',`redDesc`='$desc',
        `noirPrix`='$prix',`categorie`='$categorie',`stock`='$stock' WHERE idP='$idP'";
        $result = mysqli_query($id_connexion, $query);
    } 
    else { // si la catégorie a changé et qu'elle est nouvelle dans la liste

        //ON MODIFIE  L'ARTICLE
        $query= "UPDATE `produits` SET `noirNom`='$nom',`redDesc`='$desc',
        `noirPrix`='$prix',`categorie`='$categorie',`stock`='$stock' WHERE idP='$idP'";
        $result = mysqli_query($id_connexion, $query);
         // On compte le nb d'article correspond à la categorie
        $query = "SELECT COUNT(*) FROM `produits` WHERE `categorie`='$categorie'";
        $result = mysqli_query($id_connexion, $query);
        $row= mysqli_fetch_row($result);

        $nb_article = intval($row[0]);// On compte le nb d'article qui corresponde a la categorie
        echo'<br>nb article de categorie '.$categorie.' = ' .$nb_article;
        echo'<br>';
        if ($nb_article == 1)
        {
        // si on a 1 seul article de cette categorie, on crée la catégorie

            $query = "INSERT INTO `categories`(`idC`, `nom`) VALUES (`idC`,'$categorie')";
            $result = mysqli_query($id_connexion, $query);
            echo '<br>On créé la categorie '.$categorie;
        }

        // DANS UN AUTRE TEMPS, SI  l'ancienne catégorie ne contient plus d'articles,
        // on supprime cette ancienne catégorie
        // ON compte le nb d'article de la catégorie qui correspond à notre produit
        $query = "SELECT COUNT(*) FROM `produits` WHERE `categorie`='$ancienne_cat'";
        $result = mysqli_query($id_connexion, $query);
        $row= mysqli_fetch_row($result);
        $nb_article = intval($row[0]);
        echo'<br>nb article de lancienne cat = ' .$nb_article;
        echo'<br>';
        if ($nb_article == 0) {
            echo '<br>Il n\'y a plus d\'article de cette catégorie, je la supprime';
        // si on a plus d'article de cette categorie, on supprime une categorie
            $query = "DELETE FROM `categories` WHERE `nom`='$ancienne_cat'";
            $result = mysqli_query($id_connexion, $query);
        } else {
            echo'<br> Il reste des articles';
        }
    }
  
}
    
 
}
function supprimer_produit($id_connexion,$idP)
{
    echo '<br> Idp = ' .$idP;echo'<br>';
    // ON compte le nb d'article de la catégorie qui correspond à notre produit
    $query = "SELECT COUNT(*) FROM `produits` WHERE `categorie`=(SELECT `categorie` FROM `produits` WHERE `idP` = '$idP')";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_row($result);
    $nb_article = intval($row[0])-1;// -1 car on supprime apres avoir compté
    echo'<br>nb article = ' .$nb_article;
    echo'<br>';
    if ($nb_article == 0) {
        echo 'Il n\'y a plus d\'article de cette catégorie, je la supprime';
       // si on a plus d'article de cette categorie, on supprime une categorie
        $query = "DELETE FROM `categories` WHERE `nom`=(SELECT `categorie` FROM `produits` WHERE `idP` = $idP)";
        $result = mysqli_query($id_connexion, $query);
    }

    $query= "DELETE FROM `produits` WHERE `idP` = $idP ";
    $result = mysqli_query($id_connexion, $query);
}


function supprimer_client($id_connexion,$mail)
{
    $query= "DELETE FROM `clients` WHERE mail = '$mail' ";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_assoc($result);
}



function add_produit($id_connexion,$img,$nom,$desc,$prix,$categorie,$stock)
{
    $query = "SELECT COUNT(*) FROM `produits` WHERE `categorie`='$categorie'";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_row($result);

    $nb_article = intval($row[0]);// On compte le nb d'article qui corresponde a la categorie
    echo'<br>nb article de categorie'.$categorie.' = ' .$nb_article;
    echo'<br>';
    if ($nb_article == 0)
    {
       // si on a pas  d'article de cette categorie, on crée une categorie une categorie

        $query = "INSERT INTO `categories`(`idC`, `nom`) VALUES (`idC`,'$categorie')";
        $result = mysqli_query($id_connexion, $query);
        echo 'On créé la categorie '.$categorie;
    }


    //  ON INSERT DANS LA BDD
    $query="INSERT INTO `produits`(`idP`, `img`, `noirNom`, `redDesc`, `noirPrix`, `categorie`, `stock`)
    VALUES (`idP`,'$img','$nom','$desc',$prix,'$categorie',$stock)";
    $result = mysqli_query($id_connexion, $query);
    echo ' on a ajouté '.$nom;

}
///////////////////////////////////////////////////////////////////////
//////// TEST SUR LES PARAMETRES /////////////////////////////////////
///////////////////////////////////////////////////////////////////////
function testIdProduits($id_connexion,$idP)
{
    echo' TEST IDproduit <br>';
    echo 'idP = '.$idP;
    $query = "SELECT idP FROM `produits` WHERE idP = $idP ";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_row($result);
    var_dump($row);
   // $nb_article = intval($row[0]);
   // echo'<br>nb article  avec IDP = '.$idP.' est de ' .$nb_article;
   // echo'<br>';
    if ($row== NULL) {
        echo'Erreur id';
        return false;
    }else {
        echo 'On a trouvé lid';
        return true;
    }
}
function testMailClients($id_connexion,$mail)
{
    echo' TEST  mail <br>';
    echo 'mail = '.$mail;
    $query = "SELECT mail FROM `clients` WHERE mail = '$mail' ";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_row($result);
    var_dump($row);
    echo'<br>';
    if ($row== NULL) {
        echo'Erreur mail';
        return false;
    }else {
        echo 'On a trouvé le mail';
        return true;
    }
}


///////////////////////////////////////////////////////////////////////
//////// TRAITEMENT ////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
include "bdd/bddData.php";
include_once "bdd/bdd.php";  


// CONNEXION A LA BDD
$id_connexion=connexion_BDD($host, $user, $password,$db);
echo ' JE VEUX FAIRE '.$_GET['action'];
switch ($_GET['action']) {
    case 'modif_produit':
       echo'<br>'. $idP= intval($_GET['idP']);
       echo'<br>'. $nom = strtolower(strval($_GET['nom']));
       echo'<br>'. $desc = strtolower(strval($_GET['desc']));
       echo'<br>'. $prix = intval($_GET['prix']);
       echo'<br>'. $cat = strtolower(strval($_GET['cat']));
       echo'<br>'. $stock = intval($_GET['stock']);
       echo'<br>-------------------------<br>';
       if (testIdProduits($id_connexion,$idP)) {
        modifier_produit($id_connexion,$idP,$nom,$desc,$prix,$cat,$stock);
        //header('location:gestioncompte.php');
       }else {
           //header('location:page_error.php');
       }
        
        
        break;
    case 'suppr_produit':
        $idP = intval($_GET['idP']);
        if (testIdProduits($id_connexion,$idP)) {
            supprimer_produit($id_connexion,$idP);
            //header('location:gestioncompte.php');
           }else {
               //header('location:page_error.php');
           }
        
        //header('location:gestioncompte.php');
        break;
    case 'suppr_client':
        $mail = strtolower(htmlspecialchars(strval($_GET['email'])));
        if (testMailClients($id_connexion,$mail)) {
            supprimer_client($id_connexion,$mail);
        //header('location:gestioncompte.php');
        }else {
           //header('location:page_error.php');
        }
        
        break;
    case 'add_produit':
        echo'<br>'. $img = strtolower(htmlspecialchars(strval($_GET['img'])));
        echo'<br>'. $nom = strtolower(strval($_GET['nom']));
        echo'<br>'. $desc = strtolower(strval($_GET['desc']));
        echo'<br>'. $prix = intval($_GET['prix']);
        echo'<br>'. $cat =strtolower(strval( $_GET['cat']));
        echo'<br>'. $stock = intval($_GET['stock']);
        echo'<br>-------------------------<br>';
        add_produit($id_connexion,$img,$nom,$desc,$prix,$cat,$stock);
        //header('location:gestioncompte.php');
        break;
    default:
        //header('location:page_error.php');
        break;
}

//
//
?>
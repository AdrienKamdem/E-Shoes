<?php
session_start();
function creationPanier(){
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier']=array();

        $_SESSION['panier']['articles']=array();
    }
    return true;
}
function ajouter($id_connexion,$id,$quantite)
{
    //echo 'id = '.$id;
    $query="SELECT * FROM `produits` WHERE idP=$id";
    $result = mysqli_query($id_connexion, $query);
    $row= mysqli_fetch_assoc($result);
     //echo 'Pour '.$row['noirNom'].' il reste '.$row['stock'].'<br>';

     if ( creationPanier() ) {
         //  echo'tu veux ajouter';
           // ajouter au panier
            $nb_articles= count($_SESSION['panier']['articles']);
        //   echo 'nb articles = '.$nb_articles;
           if ($quantite>0){
   
               for ($i=0; $i <$nb_articles ; $i++) { 
                   $positionProduit = array_search($row['noirNom'], $_SESSION['panier']['articles'][$i]);
                   if ($positionProduit =='noirNom') {
                       $positionProduit = $i;
                       $trouve = $positionProduit;
                       break;
                   }
               }
               
              
       
               if (!isset($trouve)) {
                  // echo' jai pas trouver';
                  $_SESSION['panier']['articles'][$nb_articles] = $row;

                   $_SESSION['panier']['articles'][$nb_articles]['quantite'] = $quantite; 
               } else {

                   $stock = $row['stock'];
                   $quantiteTot = $quantite +$_SESSION['panier']['articles'][$trouve]['quantite'];
                   if ($quantiteTot >= $stock) {
                       $_SESSION['panier']['articles'][$trouve]['quantite'] = $stock;
                   }else {
                       $_SESSION['panier']['articles'][$trouve]['quantite']+=$quantite;
                   }
               }
       
             
           }
            // Libération de la ressource et déconnexion de la base de données
            mysqli_free_result( $result );
           header("location:".$_SERVER["HTTP_REFERER"]);
       }


     
}
    

function SupprimerPanier($idchaussure)
{
    if (creationPanier()) {
    // trouver position du porduit a retirer
   // print_r( $_SESSION['panier']['articles'][$idchaussure]);
    $produit_suppr=array();
    $produit_suppr = $_SESSION['panier']['articles'][$idchaussure];
    //echo '<br/>.Produit a suppr = ';var_dump($produit_suppr);
    unset($_SESSION['panier']['articles'][array_search($produit_suppr, $_SESSION['panier']['articles'])]);
    //echo '<br/>On a supprimer lelement <br/> Nouveau panier: ';

  //  print_r($_SESSION['panier']);
    sort($_SESSION['panier']['articles']);
   // echo '<br/>On trie :<br/> Nouveau panier: ';

  //  print_r($_SESSION['panier']);
    // copier le panier dans un tmp et supprimer

   header("Location:panier.php");
    }
}

function modifierQ($idchaussure,$quantite)
{
    if (creationPanier()) {
    $_SESSION['panier']['articles'][$idchaussure]['quantite'] = $quantite;
    header("Location:panier.php");
    }
}

// FONCTION POUR TESTER LES GET 

function testQ($quantite)
{
    $validQ = intval($quantite);
    if ($validQ <0){
        return false;
    }
    else {
        return true;
    }
}

function testIdCategories($idchaussure)
{
    $j=0;
    // Création et envoi de la requête
   // $query = "SELECT * FROM produits";
    if ( ! ($result = mysqli_query($id_connexion, $query))) {
      echo "Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
      et le message : " . mysqli_error($id_connexion) . "<br>";
     return false;
  } 
  else
    {
        while ( $row = mysqli_fetch_row($result)) 
        {
            $j++;
        }
            // Libération de la ressource et déconnexion de la base de données
    mysqli_free_result( $result );
        $validId =intval($idchaussure);
        if( ($validId<0)||($validId> $j))
        {
            return false;
        }
        else {
            return true;
        }
    }
}
function testIdPanier($idchaussure)
{
    $validId =intval($idchaussure);
    if( ($validId<0)||($validId> count($_SESSION['panier']['articles'])) )
    {
        return false;
    }
    else {
        return true;
    }

}

    //echo'<br/> Votre panier: <br/>';
   // print_r($_SESSION['panier']);
   // echo'<br/>length = '.count($_SESSION['panier']['articles']).'<br/>';

?>

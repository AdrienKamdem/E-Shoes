<?php
////////////////////////////////////////////////////
// FONCTION CONNEXION A LA BDD ////
///////////////////////////////////////////////////
function connexion_BDD($host, $user, $password,$db)
{
    // Connexion à mysql
    if ( ! ($id_connexion = mysqli_connect($host, $user, $password)) )
    {
        echo "La connexion a renvoyé une erreur de code " . mysqli_errno($id_connexion). " avec le \
                message : " . mysqli_error($id_connexion) . "<br>";
    return false;
    }
    else 
    {
        // Connexion à la base
		if ( ! mysqli_select_db( $id_connexion, $db)) 
        {
          echo "La connexion à la base a renvoyé une erreur de code " . mysqli_errno($id_connexion). " \
                avec le message : " . mysqli_error($id_connexion) . "<br>";
                return false;
        }
        else 
        {
            return $id_connexion;
        }
    }

}
////////////////////////////////////////////////////
// FONCTION DECONNEXION A LA BDD ////
///////////////////////////////////////////////////
function deconnexion_BDD($id_connexion)	
{
    //$id_connexion = mysqli_connect($host, $user, $password);
                    if (!mysqli_close($id_connexion)) 
                    {
                        echo "La deconnexion de la base a renvoyé une erreur de code " . mysqli_errno($id_connexion). " \
                        avec le message : " . mysqli_error($id_connexion) . "<br>";
                        return false;
                    }
                    else 
                    {
                        return true;
                    }


}
////////////////////////////////////////////////////
// RECUPERATION PAGE DACCUEIL 15 PRODUITS ////
///////////////////////////////////////////////////
function recupération_données($id_connexion,$query)
{
    $j=0;
    // Création et envoi de la requête
   // $query = "SELECT * FROM produits";
    if ( ! ($result = mysqli_query($id_connexion, $query))) {
      echo "Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
      et le message : " . mysqli_error($id_connexion) . "<br>";
                  // Libération de la ressource et déconnexion de la base de données
                  mysqli_free_result( $result );
     return false;
  } 
  else
  {
    $tableau = array();
    while ( $row = mysqli_fetch_row($result)) 
    {
        $tableau[$j]=$row;
        $j++;
    }
    // Libération de la ressource et déconnexion de la base de données
    mysqli_free_result( $result );
   // var_dump($categories);
    return $tableau;
  }
}
?>

          

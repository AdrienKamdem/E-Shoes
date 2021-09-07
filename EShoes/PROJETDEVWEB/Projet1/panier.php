<?php  
include_once 'traitement_panier.php';
include "bdd/bddData.php";
include_once "bdd/bdd.php";                                        
// CONNEXION A LA BDD
$id_connexion=connexion_BDD($host, $user, $password,$db);
$erreur = false;
if (isset($_GET['action'])) {
//echo $_GET['action'];

$action = $_GET['action'];
if($action != null)
{
   if(!in_array($action,array('add', 'remove', 'modifier')))
    {$erreur=true;}
    else {
        switch ($action)
        {
            case 'add':
                if (isset($_GET['quantite'])&&(isset($_GET['idproduit'])) )
                {
                   
                
                    $quantite = $_GET['quantite'];
                   // $cle = $_GET['cle'];
                    $idchaussure = $_GET['idproduit'];
                    echo $idchaussure;
                    //test($id_connexion,$idchaussure+1,$quantite);
                    if (testQ($quantite))
                    {
                        //echo $_GET['action'];
                       // echo 'quantite'.$quantite.'<br/>';
                       // echo 'cle:'.$cle.'<br/>';
                       // echo 'idchaussure :'.$idchaussure.'<br/>';
                    
                       // echo'<br/> Notre Article : <br/>';
                       // print_r($_SESSION['categories'][$cle][$idchaussure]);
                      //  echo'<br/>length = '.count($_SESSION['panier']['articles']).'<br/>';
                        //function ajouter 
                        ajouter($id_connexion,$idchaussure,$quantite); 
                    }
                    else {
                        $erreur=true;
                    }
                }else {
                    $erreur=true;
                }
            break;

            case'remove':
                if (isset($_GET['idproduit']))
                {
                    $idchaussure = $_GET['idproduit'];
                    if (testIdPanier($idchaussure))
                    {
                    SupprimerPanier($idchaussure);
                    }
                    else {
                        $erreur=true;
                    }
                } else {
                    $erreur=true;
                }
                break;
            case'modifier':
               // echo'tu veux modifier';
                if (isset($_GET['quantite'])&&(isset($_GET['idproduit'])) )
                {
                    $idchaussure = $_GET['idproduit'];
                    $quantite = $_GET['quantite'];

                    
                    if ((testQ($quantite))&&(testIdPanier($idchaussure)))
                    {
                       // echo $_GET['action'].'<br/>';

                      //  echo 'idchaussure :'.$idchaussure.'<br/>';
                            
                      //  echo 'quantite : '.$quantite.'<br/>';
                        if ($quantite==0) {
                            // si quantiet = 0 alors on retire
                            SupprimerPanier($idchaussure);

                        }else {
                            //function modifierQ
                        modifierQ($idchaussure,$quantite);
                        }
                        
                    }else {
                        $erreur=true;
                    }
                }
                else {
                    $erreur=true;
                }
                break;
            default:
            header('Location:page_error.php');
                break;

        }
    }
}else {
    $erreur=true;
}

if ($erreur) {
   // echo'<script>alert(\'Action impossible \')';
    header('Location:page_error.php');
}
}


?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> E-Shoes </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/projet1_2.css">
    <link rel="stylesheet" type="text/css" href="css/connexion.css">
    <link rel="stylesheet" type="text/css" href="css/panier2.css">
    <!--<link rel="stylesheet" type="text/css" href="css\inscription.css"> -->
  <!--  <link rel="stylesheet" type="text/css" href="css\contact.css"> -->
   <!-- <link rel="stylesheet" type="text/css" href="css\gestioncompte.css"> -->
    <!-- POSSIBILITE DE CONFLIT  des css!  si probleme c’est ici-->
  </head>
  <!-- BODY-->
<body>
<?php 
require 'php/header.php';

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
            
                <h2 style='text-align:center;'>Votre panier</h2>
                <h3 style='padding-top:15px;'>Montant total : <?php $total = 0;
                for ($i=0; $i <count($_SESSION['panier']['articles']); $i++) { 
                    $total +=$_SESSION['panier']['articles'][$i]['quantite'] *$_SESSION['panier']['articles'][$i]['noirPrix'];
                } 
                echo $total;?>$</h3>
                <?php if (count($_SESSION['panier']['articles']) >0) {
                    # code...
                ?>
                <div class='passer_commande' style='text-align:center; padding-top:15px;'> 
                    <a href='commande.php?total=<?= $total; ?>' style='font-weight:bold;'> Commander </a>
                </div>
                    

                    <?php 
                        }  
                    ?>
            </div>

            <div class="container-icon-filtre">
                <div class="icon-filtre"></div>
            </div>
            </div>    
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <!-- ############### Corp de la page ######################### -->
        <div class="contenuBody">

                
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->  
        <?php
        include 'php/menuV.php';
        ?>  
    
                    <?php
                    if (isset($_SESSION['email'])) 
                    {
                        
                    
                        if (count($_SESSION['panier']['articles'])==0) {
                            ?>
                                        <!-- Container de tous nos produits -->
                            <div  class="container-produits">
                                <div style="text-align:center; display=flex; justify-content:center; align-items:center;" class="sous-produits">
                                    <div >Votre panier est vide</div>
                            <?php
                        } else 
                        {
                            ?>
                        <div  class="container-produits">
                            <div  class="sous-produits">
                            <?php
                        
                            for ($i=0; $i < count($_SESSION['panier']['articles']) ; $i++) 
                            { 
                                    // print_r($_SESSION['categories'][$cle][$i]);
                                    // $chaussure = $_SESSION['categories'][$cle][$i];
                                    // print_r ($chaussure);echo'</br>';
                                ?>
                                <div class="produit">
                                    <div class="divImage"id="img<?php echo $i ?>">
                                        <img class="img img<?php echo $i ?>"  src="<?php print_r($_SESSION['panier']['articles'][$i]['img'])?>">
                                    </div>

                                    <div class="spanDescription">
                                        <ul>
                                        <li><span class="noirNom  modif<?= $i+1?>_nom" id='suppr<?= $i+1?>_nom'><?php print_r($_SESSION['panier']['articles'][$i]['noirNom']); ?> </span></li>
                                        <li><span class="redDesc"><?php print_r($_SESSION['panier']['articles'][$i]['redDesc'])?> </span></li>
                                        <li><span class="noirNom"><?php print_r($_SESSION['panier']['articles'][$i]['categorie'])?> </span></li>
                                        <li><span class="noirPrix">Prix unitaire :<?php print_r($_SESSION['panier']['articles'][$i]['noirPrix'])?> $</span></li>
                                        <li><span class="stock">Stock disponible:&nbsp;<p class="valstockplus<?php echo $i+1 ?> valstockmoins<?php echo $i+1 ?>"><?php print_r($_SESSION['panier']['articles'][$i]['stock']); ?></p></span></li>
                                        <li><span class="noirNom noirQuantite">Quantité:&nbsp;</span></li>
                                        </ul>
                                        <?php
                                        // recupérer le stock disponible pour l'afficher
                                            $nom = $_SESSION['panier']['articles'][$i]['noirNom'];
                                            $query="SELECT stock FROM produits WHERE noirNom='$nom'";

                                            if ( ! ($result = mysqli_query($id_connexion, $query))) {
                                                echo "Echec de la requête avec le code d’erreur " . mysqli_errno($id_connexion). " \
                                                et le message : " . mysqli_error($id_connexion) . "<br>";
                                               return false;
                                            } else
                                            {
                                                $row= mysqli_fetch_assoc($result);
                                                //echo 'Stock dispo = ';
                                                //print_r($row['stock']) ;
                                            }
                                           
                                        ?>
                                        
                                        <div class="noirNom commander">
                                            <button type="button" class="moins plus<?php echo $i+1 ?>" id="moins<?php echo $i+1 ?>" >-</button>
                                            <input type="text" value="<?php print_r($_SESSION['panier']['articles'][$i]['quantite'])?>" name="quantite" id="quantite<?php echo $i+1;?>" class="quantite stkplus<?php echo $i+1 ?> stkmoins<?php echo $i+1 ?> suppr<?= $i+1 ?>_quantite"readonly>
                                            <button  type="button"class="plus moins<?php echo $i+1 ?>" id="plus<?php echo $i+1 ?>" <?php if($_SESSION['panier']['articles'][$i]['quantite'] >=$row['stock']){
                                                echo'disabled';}?>>+</button>
                                        </div>
                                        <div> Prix total : <?= $_SESSION['panier']['articles'][$i]['quantite'] * $_SESSION['panier']['articles'][$i]['noirPrix'] ?> $ </div>


                                        <div class="ajouterPanier">
                                        <a href="#" onclick=" this.href='panier.php?action=modifier&amp;quantite='+ document.querySelector('#quantite<?php echo $i+1; ?>').value +'&amp;idproduit=<?php echo $i;?>'"><button class="btn-panier btn-modif" id="modif<?= $i+1 ?>">Modifier</button></a> 
                                        <br/>
                                        <a href="#" onclick=" this.href='panier.php?action=remove&amp;idproduit=<?php echo $i;?>'"><button class="btn-panier btn-suppr" id='suppr<?= $i+1 ?>'>Supprimer</button></a> 
                                        <!-- <input type="submit" class="btn-panier" value="Ajouter au panier">-->
                                        </div>
                                    </div>

                                </div>
                                <?php
                            }
                        }
                    }else
                    {
                        header('Location:index.php');
                    }
                            ?>
            
                </div>
        </div>
        </div>
    </div>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
    <style>

    </style>
    <?php
        
    /* echo'<br/> Votre panier : <br/>';//print_r($_SESSION['panier']);
        echo'votre panier contient '.count($_SESSION['panier']['articles']).' articles<br/> <br/>';
        for ($i=0; $i < count($_SESSION['panier']['articles']) ; $i++) {   
            ?>
            <div>img <?php print_r($_SESSION['panier']['articles'][$i]['img'])?></div>
            <div>noirNom : <?php print_r($_SESSION['panier']['articles'][$i]['noirNom'])?></div>
            <div>redDesc : <?php print_r($_SESSION['panier']['articles'][$i]['redDesc'])?></div>
            <div>noirPrix : <?php print_r($_SESSION['panier']['articles'][$i]['noirPrix'])?></div>
            <div>quantite : <?php print_r($_SESSION['panier']['articles'][$i]['quantite'])?></div>
            <div> <a href="traitement_panier.php?action=supprimer">Retirer du panier</a></div>
            <?php
            echo '<br/>';
        }*/
    ?>
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <?php
include 'php/footer.php';
deconnexion_BDD($id_connexion);
?>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script type="text/javascript" src="js/test_ajax2.js"></script>
  <script  type="text/javascript" src="js\index.js"></script>
  
  <script src="js\connexion.js"></script>
</body>

</html>
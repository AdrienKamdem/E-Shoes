<?php

// requete pour remplir table des categories
$i=0;
foreach ($_SESSION['categories'] as $cle=>$valeur) {
$i++;
$cle = strtolower(htmlspecialchars(strval($cle)));
echo'categorie= '.$cle;
$requete = "INSERT INTO `categories`(`idC`, `nom`) VALUES  (`idC`,'$cle')";
$result = mysqli_query($id_connexion, $requete);
}
$j=0;

// requete pour remplir table des produits
foreach ($_SESSION['categories'] as $cle=>$valeur) 
{
for ($i=0; $i <count($_SESSION['categories'][$cle]); $i++)
    { 

        $img = strtolower(htmlspecialchars(strval($_SESSION['categories'][$cle][$i]['img'])));
        $nom = strtolower(htmlspecialchars(strval($_SESSION['categories'][$cle][$i]['noirNom'])));
        $desc = strtolower(htmlspecialchars(strval($_SESSION['categories'][$cle][$i]['redDesc'])));
        $prix = intval($_SESSION['categories'][$cle][$i]['noirPrix']);
        $categorie = strtolower(htmlspecialchars(strval($cle)));
        $stock = intval($_SESSION['categories'][$cle][$i]['stock']);

        $j++;
        $requete = "INSERT INTO `produits`(`idP`, `img`, `noirNom`, `redDesc`, `noirPrix`, `categorie`, `stock`) 
        VALUES (`idP`,'$img','$nom','$desc',$prix,'$categorie',$stock)";
        $result = mysqli_query($id_connexion, $requete);
    }
}

?>
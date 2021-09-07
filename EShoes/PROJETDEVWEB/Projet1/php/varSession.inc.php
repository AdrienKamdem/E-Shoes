<?php
include_once 'traitement_panier.php';
// Transfert des données vers un fichier JSON

//$categories_json = json_encode($categories);
//$fpc = file_put_contents("categories.json",$categories_json);
$categories_json = file_get_contents("php/categories.json");
$_SESSION['categories'] = json_decode($categories_json,true);

//$_SESSION['categories'] = $categories;
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% //
//                tableau de sneakers
// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% //
/*
$sneakers = [

    [
        "img"=>'img/asiscsventure7.png',
        "noirNom"=>'Asics Venture 7',
        "redDesc"=>'Chaussure Homme',
        "noirPrix"=>'70',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],

    [
        "img"=>'img/fila.png',
        "noirNom"=>'Fila',
        "redDesc"=>'Chaussure Fille',
        "noirPrix"=>'120',
        "stock"=>'4',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/coqsportif.png',
        "noirNom"=>'Coq sportif',
        "redDesc"=>'Chaussure Mixte',
        "noirPrix"=>'90',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/hummel.png',
        "noirNom"=>'Hummel Firtt',
        "redDesc"=>'Chaussure garçon',
        "noirPrix"=>'60',
        "stock"=>'1',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/nikezephyr.png',
        "noirNom"=>'Air max Zephyr',
        "redDesc"=>'Chaussure Homme',
        "noirPrix"=>'180',
        "stock"=>'3',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ]
];
$chaussuresHabille = [
    [
        "img"=>'img/pumalakers.png',
        "noirNom"=>'Puma X Lakers',
        "redDesc"=>'Chaussure Fille',
        "noirPrix"=>'140',
        "stock"=>'1',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/hummel.png',
        "noirNom"=>'Hummel Firtt',
        "redDesc"=>'Chaussure garçon',
        "noirPrix"=>'60',
        "stock"=>'1',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/coqsportif.png',
        "noirNom"=>'Coq sportif',
        "redDesc"=>'Chaussure Mixte',
        "noirPrix"=>'90',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/vans59.png',
        "noirNom"=>'Vans 59',
        "redDesc"=>'Chaussure Femme',
        "noirPrix"=>'130',
        "stock"=>'3',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/asiscsventure7.png',
        "noirNom"=>'Asics Venture 7',
        "redDesc"=>'Chaussure Homme',
        "noirPrix"=>'70',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ]

];

$chaussuresSport = [
    [
        "img"=>'img/hummel.png',
        "noirNom"=>'hummel',
        "redDesc"=>'Chaussure Femme',
        "noirPrix"=>'10',
        "stock"=>'5',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/pumafutureride.png',
        "noirNom"=>'Puma Future Ride',
        "redDesc"=>'Chaussure Homme',
        "noirPrix"=>'50',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/coqsportif.png',
        "noirNom"=>'coq',
        "redDesc"=>'Chaussure garcon',
        "noirPrix"=>'120',
        "stock"=>'4',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/newbalance.png',
        "noirNom"=>'New balance',
        "redDesc"=>'Chaussure Mixte',
        "noirPrix"=>'89',
        "stock"=>'2',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
    [
        "img"=>'img/fila.png',
        "noirNom"=>'Fila',
        "redDesc"=>'Chaussure Fille',
        "noirPrix"=>'120',
        "stock"=>'3',
        "moins"=>'-',
        "plus"=>'+',
        "btn-panier"=>'Ajouter au panier'
    ],
];

$categories=[
    'Sneakers'=>$sneakers,
    'Chaussures Habillé'=>$chaussuresHabille,
    'Chaussures de Sport'=>$chaussuresSport
];
*/

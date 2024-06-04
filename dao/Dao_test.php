<?php

// http://localhost/avis_verifies/dao/Dao_test.php
declare( strict_types = 1 );

require_once( '../models/Fournisseur.php' );
require_once( '../models/Bareme.php' );
require_once( '../models/Client.php' );
require_once( '../models/Prestation.php' );

require_once( 'Fournisseur_dao.php' );
require_once( 'Bareme_dao.php' );
require_once( 'Client_dao.php' );
require_once( 'Prestation_dao.php' );

require_once( 'Connexion.php' );

$cnx = new Connexion();

$pdo = $cnx->getConnexion( '../conf/avis.ini' );

echo '<hr>test insert Fournisseur<hr>';

try {

    $fournisseur = new Fournisseur( 0,'test' );

    $dao = new FournisseurDAO( $pdo );

    $affected = $dao->insert( $fournisseur );

    echo $affected;
} catch ( PDOException $exc ) {
    echo $exc->getMessage();
}

echo '<hr>test insert Bareme<hr>';

try {

    $bareme = new Bareme( 0, 4, 'tres bien' );

    $dao = new BaremeDAO( $pdo );

    $affected = $dao->insert( $bareme );

    echo $affected;
} catch ( PDOException $exc ) {
    echo $exc->getMessage();
}

echo '<hr>test insert Client<hr>';

try {

    $client = new Client( 0, 'Martin-test');

    $dao = new ClientDAO( $pdo );

    $affected = $dao->insert( $client );

    echo $affected;
} catch ( PDOException $exc ) {
    echo $exc->getMessage();
}

echo '<hr>test insert Prestation<hr>';

try {

    $presta = new Prestation(0, 39, 168, 176, "peinture" );

    $dao = new PrestationDAO( $pdo );

    $affected = $dao->insert( $presta );

    echo $affected;
} catch ( PDOException $exc ) {
    echo $exc->getMessage();
}

echo '<hr>test delete Client<hr>';

try {

    $client = new Client(134);

    $dao = new ClientDAO( $pdo );

    $affected = $dao->delete( $client );

    echo $affected;
} catch ( PDOException $exc ) {
    echo $exc->getMessage();
}


echo '<hr>test récupèration des ID<hr>';

try {

    $fournisseur = new Fournisseur(0,"M-dev.com");

    $dao = new FournisseurDAO( $pdo );

    $result = $dao->selectId( $fournisseur );

    if ( $result ) {
        echo "L'id du fournisseur est : ".$result;
    } else {
        echo 'Aucun résultat trouvé.';
    }
} catch ( PDOException $exc ) {
    $exc->getMessage();
}

echo '<br>';

// try {

//     $bareme = new Bareme(0,4,"sdf");

//     $dao = new BaremeDAO( $pdo );

//     $result = $dao->selectId( $bareme );

//     if ( $result ) {
//         echo "L'id du bareme est : ".$result;
//     } else {
//         echo 'Aucun résultat trouvé.';
//     }
// } catch ( PDOException $exc ) {
//     $exc->getMessage();
// }

// echo '<br>';

// try {

//     $client = new Client(0,"Pierre");

//     $dao = new ClientDAO( $pdo );

//     $result = $dao->selectId( $client );

//     if ( $result ) {
//         echo "L'id du client est : ".$result;
//     } else {
//         echo 'Aucun résultat trouvé.';
//     }
// } catch ( PDOException $exc ) {
//     $exc->getMessage();
// }
?>
<?php

// http://localhost/avis_verifies/controller/avis_verifies_ctrl.php

// SELECT note
// FROM bareme JOIN prestation
// ON bareme.id_bareme = prestation.id_bareme
// JOIN fournisseur
// ON prestation.id_fournisseur = fournisseur.id_fournisseur
// WHERE fournisseur.nom_fournisseur = 'M-dev.com'

// Enabling strict typing for better code reliability.
declare( strict_types = 1 );

// Including necessary PHP files for models and DAOs.
require_once( '../models/Fournisseur.php' );
require_once( '../models/Bareme.php' );
require_once( '../models/Client.php' );
require_once( '../models/Prestation.php' );
require_once( '../dao/Fournisseur_dao.php' );
require_once( '../dao/Bareme_dao.php' );
require_once( '../dao/Client_dao.php' );
require_once( '../dao/Prestation_dao.php' );
require_once( '../dao/Connexion.php' );

// Creating a database connection.
$cnx = new Connexion();
$pdo = $cnx->getConnexion( '../conf/avis.ini' );

// Retrieving data from the form submission.
$nom_fournisseur = filter_input( INPUT_POST, 'fournisseur' );
$note = filter_input( INPUT_POST, 'bareme' );
$libelle_note = filter_input( INPUT_POST, 'texte' );
$nom_client = filter_input( INPUT_POST, 'client' );
$presta = filter_input( INPUT_POST, 'prestation' );

// Getting the current date and time.
$date_depot = date( 'Y-m-d' );

// Counter for handling errors.
$ko = 0;

// Regular expressions for input validation.
$ctrl_name = "/^[a-zA-ZÀ-ÿ'-]{2,49}$/";
$ctrl_domaine = "/^((?!-)[A-Za-z0-9-]{1,63}(?<!-)\.)+[A-Za-z]{2,6}$/";

// Checking if any of the required fields are empty.
if ( empty( $nom_fournisseur ) || empty( $note ) || empty( $libelle_note ) || empty( $nom_client ) || empty( $presta ) ) {
    header( 'Location: ../views/avis_verifies_error_saisie.php' );
    exit();
} elseif ( !preg_match( $ctrl_name, $nom_client ) ) {
    // If the client name format is not valid, display an error message.
    header( 'Location: ../views/avis_verifies_error_nom.php' );
    exit();
} elseif ( !preg_match( $ctrl_domaine, $nom_fournisseur ) ) {
    // If the domain name format is not valid, display an error message.
    header( 'Location: ../views/avis_verifies_error_domaine.php' );
    exit();
} else {
    try {
        // Checking if the supplier exists in the database.
        $fournisseurDAO = new FournisseurDAO( $pdo );
        $fournisseurExiste = $fournisseurDAO->existe( $nom_fournisseur );

        if ( !$fournisseurExiste ) {
            // If the supplier does not exist, display an error message.
            header( 'Location: ../views/avis_verifies_error_domaine_inconnu.php' );
            exit();
        }
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Retrieving the ID of the rating for further processing.
    try {
        $id_fournisseur = new Fournisseur( 0, $nom_fournisseur );
        $dao = new FournisseurDAO( $pdo );
        $result_idFournisseur = $dao->selectId( $id_fournisseur );
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Inserting rating-related data into the database.
    try {
        $bareme = new Bareme( 0, intval( $note ), $libelle_note );
        $dao = new BaremeDAO( $pdo );
        $affected = $dao->insert( $bareme );
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Retrieving the ID of the rating for further processing.
    try {
        $id_bareme = new Bareme( 0, intval( $note ), $libelle_note );
        $dao = new BaremeDAO( $pdo );
        $result_idBareme = $dao->selectId( $id_bareme );
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Inserting client-related data into the database.
    try {
        $client = new Client( 0, $nom_client, $date_depot );
        $dao = new ClientDAO( $pdo );
        $affected = $dao->insert( $client );
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Retrieving the ID of the client for further processing.
    try {
        $id_client = new Client( 0, $nom_client );
        $dao = new ClientDAO( $pdo );
        $result_idClient = $dao->selectId( $id_client );
    } catch ( PDOException $exc ) {
        // Handling database errors.
        $exc->getMessage();
        $ko++;
    }

    // Creating an instance of the PrestationDAO object to interact with the database
    $prestationDAO = new PrestationDAO( $pdo );

    // Checking if an existing review already exists for the given supplier and client
    if ( $prestationDAO->avisExisteDeja( $result_idFournisseur, $result_idClient ) ) {
        // If a review already exists, redirect to the error page
        header( 'Location: ../views/avis_verifies_error.php' );
        exit();
    } else {
        // If no review exists, proceed with inserting the new review into the database
        try {
            // Creating a new Prestation object with the provided details
            $prestation = new Prestation( 0, $result_idFournisseur, $result_idBareme, $result_idClient, $presta );

            // Creating an instance of PrestationDAO to perform the insertion
            $dao = new PrestationDAO( $pdo );

            // Inserting the new review into the database
            $affected = $dao->insert( $prestation );

            // If insertion is successful, redirect to the success page
            if ( $affected ) {
                header( 'Location: ../views/avis_verifies_success.php' );
                exit();
            }
        } catch ( PDOException $exc ) {
            // If an exception occurs during insertion, handle the exception
            $exc->getMessage();
            $ko++;
        }
    }

    // Redirecting to the error page if any errors occurred during the process.
    if ( $ko != 0 ) {
        header( 'Location: ../views/error.php' );
    }
}
?>
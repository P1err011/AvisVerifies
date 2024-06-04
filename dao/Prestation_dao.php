<?php

// Declare strict typing
declare( strict_types = 1 );

// Include the Prestation class
require_once( '../models/Prestation.php' );

// Define the PrestationDAO class

class PrestationDAO
 {
    // Private property to hold the PDO instance
    private PDO $pdo;

    // Constructor to initialize the PDO instance

    public function __construct( PDO $pdo )
 {
        $this->pdo = $pdo;
    }

    // Method to insert a Prestation object into the database

    public function insert( Prestation $prestation ): int
 {
        // Initialize affected rows variable
        $affected = 0;
        try {
            // Prepare SQL statement for insertion
            $sql = 'INSERT INTO prestation(id_fournisseur, id_bareme, id_client, libelle_prestation) VALUES(?,?,?,?)';

            // Prepare and execute the SQL statement
            $cmd = $this->pdo->prepare( $sql );
            $cmd->bindValue( 1, $prestation->getIdFournisseur() );
            $cmd->bindValue( 2, $prestation->getIdBareme() );
            $cmd->bindValue( 3, $prestation->getIdClient() );
            $cmd->bindValue( 4, $prestation->getLibellePrestation() );

            $cmd->execute();

            // Get the number of affected rows
            $affected = $cmd->rowCount();
        } catch ( PDOException $exc ) {
            // If an exception occurs, set affected rows to -1
            echo $exc->getMessage();
            $affected = -1;
        }
        // Return the number of affected rows
        return $affected;
    }

    public function avisExisteDeja( $id_fournisseur, $id_client ) {
        try {
            // Prepare the SQL query to select reviews based on supplier and client IDs.
            $query = 'SELECT * FROM prestation WHERE id_fournisseur = :id_fournisseur AND id_client = :id_client';
            $stmt = $this->pdo->prepare( $query );

            // Bind parameters and execute the query.
            $stmt->execute( array( ':id_fournisseur' => $id_fournisseur, ':id_client' => $id_client ) );

            // Return true if the number of rows returned by the query is greater than 0, indicating that a review already exists.
            return $stmt->rowCount() > 0;
        } catch ( PDOException $exc ) {
            // Handle errors here, and return false to indicate that the existence check failed.
            return false;
        }
    }
}

?>

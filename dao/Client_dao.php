<?php
// Ensure strict typing
declare( strict_types = 1 );

// Include the Client model class
require_once( '../models/Client.php' );

// Define the ClientDAO class

class ClientDAO
 {
    // Private property to hold the PDO instance
    private PDO $pdo;

    // Constructor method to initialize the PDO instance

    public function __construct( PDO $pdo )
 {
        $this->pdo = $pdo;
    }

    // Method to insert a new Client object into the database

    public function insert( Client $client ): int
 {
        $affected = 0;
        try {
            // Prepare the SQL query
            $sql = 'INSERT INTO client(nom_client, date_avis) VALUES(?, ?)';
            $cmd = $this->pdo->prepare( $sql );

            // Bind the values from the Client object to the prepared statement
            $cmd->bindValue( 1, $client->getNomClient() );
            $cmd->bindValue( 2, $client->getDateAvis() );

            // Execute the prepared statement
            $cmd->execute();

            // Get the number of affected rows
            $affected = $cmd->rowCount();
        } catch ( PDOException $exc ) {
            // Handle any PDO exceptions
            echo $exc->getMessage();
            $affected = -1;
        }
        return $affected;
    }

    public function delete( Client $client ): int
 {
        $affected = 0;
        try {
            // Prepare the SQL query
            $sql = 'DELETE FROM client WHERE id_client = ?';
            $cmd = $this->pdo->prepare( $sql );

            // Bind the values from the Client object to the prepared statement
            $cmd->bindValue( 1, $client->getIdClient() );

            // Execute the prepared statement
            $cmd->execute();

            // Get the number of affected rows
            $affected = $cmd->rowCount();
        } catch ( PDOException $exc ) {
            // Handle any PDO exceptions
            echo $exc->getMessage();
            $affected = -1;
        }
        return $affected;
    }

    // Method to select the ID of a Client object from the database

    public function selectId( Client $client ): int
 {
        $result = 0;
        try {
            // Prepare the SQL query
            $sql = 'SELECT id_client FROM client WHERE nom_client = (?)';
            $cmd = $this->pdo->prepare( $sql );

            // Bind the values from the Client object to the prepared statement
            $cmd->bindValue( 1, $client->getNomClient() );

            // Execute the prepared statement
            $cmd->execute();

            // Fetch the result
            $result = $cmd->fetch( PDO::FETCH_COLUMN );
        } catch ( PDOException $exc ) {
            // Handle any PDO exceptions
            $exc->getMessage();
            $result = -1;
        }
        return $result;
    }
}
?>

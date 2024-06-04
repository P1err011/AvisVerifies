<?php

// Declare strict typing
declare(strict_types=1);

// Include the Fournisseur class
require_once('../models/Fournisseur.php');

// Define the FournisseurDAO class
class FournisseurDAO
{
    // Private property to hold the PDO instance
    private PDO $pdo;

    // Constructor to initialize the PDO instance
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Method to insert a Fournisseur object into the database
    public function insert(Fournisseur $fournisseur): int
    {
        // Initialize affected rows variable
        $affected = 0;
        try {
            // Prepare SQL statement for insertion
            $sql = 'INSERT INTO fournisseur(nom_fournisseur) VALUES(?) ';

            // Prepare and execute the SQL statement
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $fournisseur->getNomFournisseur());
            $cmd->execute();

            // Get the number of affected rows
            $affected = $cmd->rowCount();
        } catch (PDOException $exc) {
            // If an exception occurs, set affected rows to -1
            $exc->getMessage();
            $affected = -1;
        }
        // Return the number of affected rows
        return $affected;
    }

    // Method to select the ID of a Fournisseur from the database
    public function selectId(Fournisseur $fournisseur): int
    {
        // Initialize result variable
        $result = 0;
        try {
            // Prepare SQL statement for selection
            $sql = 'SELECT id_fournisseur FROM fournisseur WHERE nom_fournisseur = (?)';

            // Prepare and execute the SQL statement
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $fournisseur->getNomFournisseur());
            $cmd->execute();

            // Fetch the result
            $result = $cmd->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException $exc) {
            // If an exception occurs, set result to -1
            $exc->getMessage();
            $result = -1;
        }
        // Return the result
        return $result;
    }

    // Method to check if a Fournisseur exists in the database
    public function existe(string $nom_fournisseur): bool
    {
        // Prepare SQL query to count occurrences of the Fournisseur
        $query = 'SELECT COUNT(*) FROM fournisseur WHERE nom_fournisseur = :nom_fournisseur';

        // Prepare and execute the SQL query
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nom_fournisseur', $nom_fournisseur, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the count of occurrences
        $count = $stmt->fetchColumn();

        // Return true if count is greater than 0, else return false
        return $count > 0;
    }
}

?>

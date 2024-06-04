<?php
// Ensure strict typing
declare(strict_types=1);

// Include the Bareme model class
require_once('../models/Bareme.php');

// Define the BaremeDAO class
class BaremeDAO
{
    // Private property to hold the PDO instance
    private PDO $pdo;

    // Constructor method to initialize the PDO instance
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Method to insert a new Bareme object into the database
    public function insert(Bareme $bareme): int
    {
        $affected = 0;
        try {
            // Prepare the SQL query
            $sql = 'INSERT INTO bareme(note, texte_avis) VALUES(?, ?)';
            $cmd = $this->pdo->prepare($sql);

            // Bind the values from the Bareme object to the prepared statement
            $cmd->bindValue(1, $bareme->getNoteBareme());
            $cmd->bindValue(2, $bareme->gettexteAvis());

            // Execute the prepared statement
            $cmd->execute();

            // Get the number of affected rows
            $affected = $cmd->rowCount();
        } catch (PDOException $exc) {
            // Handle any PDO exceptions
            $exc->getMessage();
            $affected = -1;
        }
        return $affected;
    }

    // Method to select the ID of a Bareme object from the database
    public function selectId(Bareme $bareme): int
    {
        $result = 0;
        try {
            // Prepare the SQL query
            $sql = 'SELECT id_bareme FROM bareme WHERE texte_avis = (?) and note = (?)';
            $cmd = $this->pdo->prepare($sql);

            // Bind the values from the Bareme object to the prepared statement
            $cmd->bindValue(1, $bareme->gettexteAvis());
            $cmd->bindValue(2, $bareme->getNoteBareme());

            // Execute the prepared statement
            $cmd->execute();

            // Fetch the result
            $result = $cmd->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException $exc) {
            // Handle any PDO exceptions
            $exc->getMessage();
            $result = -1;
        }
        return $result;
    }
}
?>

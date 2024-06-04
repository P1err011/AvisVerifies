<?php

// Define the Connexion class
class Connexion
{
    // Method to establish a PDO connection using the provided INI file path
    public function getConnexion(string $chemin_de_connexion_a_fichier_ini): PDO
    {
        // Parse the properties from the INI file
        $tProprietes = parse_ini_file($chemin_de_connexion_a_fichier_ini);

        // Extract properties from the parsed INI file
        $protocole = $tProprietes['protocole'];
        $serveur = $tProprietes['serveur'];
        $port = $tProprietes['port'];
        $ut = $tProprietes['ut'];
        $mdp = $tProprietes['mdp'];
        $bd = $tProprietes['bd'];

        // Initialize PDO instance
        $pdo = null;
        try {
            // Attempt to create a new PDO connection
            $pdo = new PDO("$protocole:host=$serveur;port=$port;dbname=$bd;", $ut, $mdp);

            // Set PDO attributes
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Set character encoding to UTF-8
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $ex) {
            // If connection fails, redirect to error page and exit
            header('Location: ../views/error.php');
            exit();
        }

        // Return the PDO instance
        return $pdo;
    }
}

?>

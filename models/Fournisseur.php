<?php

// Defining a PHP class named Fournisseur
class Fournisseur
{
    // Private properties to store the ID and name of the provider
    private int $idFournisseur;
    private string $nomFournisseur;

    // Constructor method to initialize the object with provided values
    public function __construct(int $idFournisseur, string $nomFournisseur)
    {
        $this->idFournisseur = $idFournisseur;
        $this->nomFournisseur = $nomFournisseur;
    }

    // Setter method for setting the ID of the provider
    public function setIdFournisseur(int $idFournisseur): void
    {
        $this->idFournisseur = $idFournisseur;
    }

    // Getter method for getting the ID of the provider
    public function getIdFournisseur()
    {
        return $this->idFournisseur;
    }

    // Setter method for setting the name of the provider
    public function setNomFournisseur(string $nomFournisseur): void
    {
        $this->nomFournisseur = $nomFournisseur;
    }

    // Getter method for getting the name of the provider
    public function getNomFournisseur()
    {
        return $this->nomFournisseur;
    }
}

?>

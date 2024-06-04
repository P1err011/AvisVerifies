<?php

// Defining a PHP class named Prestation
class Prestation
{
    // Private properties to store the ID of the service, provider, rating scale, client, and service label
    private int $idPrestation;
    private int $idFournisseur;
    private int $idBareme;
    private int $idClient;
    private string $libellePrestation;

    // Constructor method to initialize the object with provided values
    public function __construct(int $idPrestation = 0, int $idFournisseur = 0, int $idBareme = 0, int $idClient = 0, string $libellePrestation = '')
    {
        $this->idPrestation = $idPrestation;
        $this->idFournisseur = $idFournisseur;
        $this->idBareme = $idBareme;
        $this->idClient = $idClient;
        $this->libellePrestation = $libellePrestation;
    }

    // Setter method for setting the ID of the service
    public function setIdPrestation(int $idPrestation): void
    {
        $this->idPrestation = $idPrestation;
    }

    // Getter method for getting the ID of the service
    public function getIdPrestation()
    {
        return $this->idPrestation;
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

    // Setter method for setting the ID of the rating scale
    public function setIdBareme(int $idBareme): void
    {
        $this->idBareme = $idBareme;
    }

    // Getter method for getting the ID of the rating scale
    public function getIdBareme()
    {
        return $this->idBareme;
    }

    // Setter method for setting the ID of the client
    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    // Getter method for getting the ID of the client
    public function getIdClient()
    {
        return $this->idClient;
    }

    // Setter method for setting the label of the service
    public function setLibellePrestation(string $libellePrestation): void
    {
        $this->libellePrestation = $libellePrestation;
    }

    // Getter method for getting the label of the service
    public function getLibellePrestation()
    {
        return $this->libellePrestation;
    }
}

?>

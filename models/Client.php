<?php

// Defining a PHP class named Client
class Client
{
    // Private properties to store the ID, name, and date of the client's review
    private int $idClient;
    private string $nomClient;
    private string $dateAvis;

    // Constructor method to initialize the object with default or provided values
    public function __construct(int $idClient = 0, string $nomClient = '', string $dateAvis = '')
    {
        $this->idClient = $idClient;
        $this->nomClient = $nomClient;
        $this->dateAvis = $dateAvis;
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

    // Setter method for setting the name of the client
    public function setNomClient(string $nomClient): void
    {
        $this->nomClient = $nomClient;
    }

    // Getter method for getting the name of the client
    public function getNomClient()
    {
        return $this->nomClient;
    }

    // Setter method for setting the review date of the client
    public function setdateAvis(string $dateAvis): void
    {
        $this->dateAvis = $dateAvis;
    }

    // Getter method for getting the review date of the client
    public function getdateAvis()
    {
        return $this->dateAvis;
    }
}

?>

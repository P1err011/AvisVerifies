<?php

// Defining a PHP class named Bareme
class Bareme
{
    // Private properties to store the ID, note, and label of the rating
    private int $idBareme;
    private int $noteBareme;
    private string $texteAvis;

    // Constructor method to initialize the object with default or provided values
    public function __construct(int $idBareme = 0, int $noteBareme = 0, string $texteAvis = '')
    {
        $this->idBareme = $idBareme;
        $this->noteBareme = $noteBareme;
        $this->texteAvis = $texteAvis;
    }

    // Setter method for setting the ID of the rating
    public function setIdBareme(int $idBareme): void
    {
        $this->idBareme = $idBareme;
    }

    // Getter method for getting the ID of the rating
    public function getIdBareme()
    {
        return $this->idBareme;
    }

    // Setter method for setting the note of the rating
    public function setNoteBareme(int $noteBareme): void
    {
        $this->noteBareme = $noteBareme;
    }

    // Getter method for getting the note of the rating
    public function getNoteBareme()
    {
        return $this->noteBareme;
    }

    // Setter method for setting the label of the rating
    public function settexteAvis(string $texteAvis): void
    {
        $this->texteAvis = $texteAvis;
    }

    // Getter method for getting the label of the rating
    public function gettexteAvis()
    {
        return $this->texteAvis;
    }
}

?>

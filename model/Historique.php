<?php

class Historique {
    private $id;
    private $actionType;
    private $tableConcernee;
    private $idLigneModifiee;
    private $dateAction;

    // Constructeur
    public function __construct($id, $actionType, $tableConcernee, $idLigneModifiee, $dateAction) {
        $this->id = $id;
        $this->actionType = $actionType;
        $this->tableConcernee = $tableConcernee;
        $this->idLigneModifiee = $idLigneModifiee;
        $this->dateAction = $dateAction;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getActionType() {
        return $this->actionType;
    }

    public function getTableConcernee() {
        return $this->tableConcernee;
    }

    public function getIdLigneModifiee() {
        return $this->idLigneModifiee;
    }

    public function getDateAction() {
        return $this->dateAction;
    }
}

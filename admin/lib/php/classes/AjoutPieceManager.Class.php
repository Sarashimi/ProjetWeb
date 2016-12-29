<?php

class AjoutPieceManager extends AjoutPiece {

    private $_db;
    private $_IdFabricant  = array();
    private $_IdCategorie = array();
    private $_Categorie = array();
    private $_Fabricant = array();
    private $_IdMachine = array();
    private $_Machine = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    //Renvoie les id des categories
    public function getCategId() {
        try {

            $query = "SELECT idcat FROM categorie";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdCategorie[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdCategorie;
    }

    public function getCateg() {
        try {

            $query = "SELECT genre FROM categorie";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Categorie[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Categorie;
    }

    public function getFabId() {
        try {

            $query = "SELECT idfab FROM fabricant";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdFabricant[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdFabricant;
    }

    public function getFabricant() {
        try {

            $query = "SELECT nomfab FROM fabricant";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Fabricant[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Fabricant;
    }

    public function getMachineId() {
        try {

            $query = "SELECT idmachine FROM machine";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_IdMachine[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_IdMachine;
    }

    public function getMachine() {
        try {

            $query = "SELECT nommachine FROM machine";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_Machine[] = new ajoutpiece($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_Machine;
    }

    public function addpiece(array $data) {

        //var_dump($data);
        $query = "select addpiece(:Titre_piece, :Prix_piece, :Categorie_piece, :Fabricant_piece, :Machine_piece) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $data['Titre_piece'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['Prix_piece'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['Categorie_piece'], PDO::PARAM_INT);
            $statement->bindValue(4, $data['Fabricant_piece'], PDO::PARAM_INT);
            $statement->bindValue(5, $data['Machine_piece'], PDO::PARAM_INT);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            print "Echec de l'insertion : " . $e;
            $retour = 0;
            return $retour;
        }
    }

}
?>


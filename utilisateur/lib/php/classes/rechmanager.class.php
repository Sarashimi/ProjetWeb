<?php

class catManager extends cat {

    private $_db;
    private $_accueilArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getpieceall($titre, $cat, $fab) {
        try {
            $query = "SELECT * FROM piececat where titre={$titre} and cat={$cat} and fab={$fab}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getpiecetc($titre, $cat) {
        try {
            $query = "SELECT * FROM piececat where titre={$titre} and cat={$cat}";

            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getpiecetd($titre, $fab) {
        try {
            $query = "SELECT * FROM piececat where titre={$titre} and fab={$fab}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getpiececd($cat, $fab) {
        try {
            $query = "SELECT * FROM piececat where cat={$cat} and fab={$fab}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getpiecet($titre) {
        try {
            $query = "SELECT * FROM piececat where titre={$titre}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getfabc($cat) {
        try {
            $query = "SELECT * FROM piececat where cat={$cat}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

    public function getpieced($fab) {
        try {
            $query = "SELECT * FROM piececat where fab={$fab}";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_accueilArray[] = new cat($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_accueilArray;
    }

}

?>

<?php

class AjoutFabManager extends AjoutFab {
    private $_db;
    private $_contactArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addFab(array $data) {
        //var_dump($data);
        $query="select add_fab(:Nom_fab,:Pays_fab) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);		
            $statement->bindValue(1, $data['Nom_fab'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['Pays_fab'], PDO::PARAM_STR);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } 
        catch(PDOException $e) {
            print "Echec de l'insertion : ".$e;
            $retour=0;
            return $retour;
        }   
    }
    
    private function checkEmpty($data) {
        
        return true;
    }
    
}

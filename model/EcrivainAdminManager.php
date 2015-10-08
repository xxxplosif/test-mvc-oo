<?php

class EcrivainManager {
    // attr
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }
    
    // meth
    public function recupTous(){
        $query = $this->db->query("SELECT * FROM ecrivain ORDER BY id");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function recupUn($int){
        $int = (int) $int;
        $query = $this->db->query("SELECT * FROM ecrivain WHERE id = $int");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function recupUnRandom(){
        $query = $this->db->query("SELECT * FROM ecrivain ORDER BY RAND() LIMIT 1");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function recupJointure($int){
        $int = (int) $int;
        $this->db->exec("SET SESSION group_concat_max_len = 1000000;");
        $query = $this->db->query("
        SELECT e.*,
            GROUP_CONCAT(l.id SEPARATOR '||') AS ids,
			GROUP_CONCAT(l.letitre SEPARATOR '||') AS titres,
			GROUP_CONCAT(l.ladescription SEPARATOR '||') AS descriptions
            FROM ecrivain e
            INNER JOIN livre l
            ON l.ecrivain_id = e.id
            WHERE e.id = $int 
			GROUP BY e.id;
        ");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}

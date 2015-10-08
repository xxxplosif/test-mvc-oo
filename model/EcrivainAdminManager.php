<?php

class EcrivainAdminManager extends EcrivainManager {

    // meth
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

    public function insertWriter($lenom, $labio, $siecle){
        return $this->db->exec("
            INSERT INTO ecrivain
            VALUES (NULL, '$lenom', '$labio', $siecle)
            ");
    }

}

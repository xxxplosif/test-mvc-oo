<?php

class LivreAdminManager extends LivreManager {
    // meth
    public function insertBook($letitre, $ladescription, $lasortie, $lecrivain){
        return $this->db->exec("
            INSERT INTO livre
            VALUES (NULL, '$letitre', '$ladescription', '$lasortie', $lecrivain)
            ");
    }
}


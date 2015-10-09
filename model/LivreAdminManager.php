<?php

class LivreAdminManager extends LivreManager {
    // meth
    public function insertBook($letitre, $ladescription, $lasortie, $lecrivain){
        return $this->db->exec("
            INSERT INTO livre
            VALUES (NULL, '$letitre', '$ladescription', '$lasortie', $lecrivain)
            ");
    }

    public function deleteBook($int){
        return $this->db->exec("
            DELETE FROM livre
            WHERE id = $int
            ");
    }

    public function updateBook($letitre, $ladescription, $lasortie, $lecrivain, $id){
        return $this->db->exec("
            UPDATE livre SET
            letitre = '$letitre',
            ladescription = '$ladescription',
            lasortie = '$lasortie',
            ecrivain_id = $lecrivain
            WHERE id = $id
            ");
    }
}


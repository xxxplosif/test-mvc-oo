<?php

class Ecrivain {
    // attr
    private $id;
    private $lenom;
    private $labio;
    private $sciecle_id;

    public function __construct(array $valeurs){
        $this->trouveSetter($valeurs);
    }

    // meth

    private function trouveSetter($param) {
        foreach ($param as $clef => $valeur) {
            $nom = 'set' . ucfirst($clef);
            if (method_exists($this, $nom)) {
                $this->$nom($valeur);
            }
        }
    }

    // getters and setters

    // -- id
    public function getId(){
        return $this->id;
    }

    public function setId($int){
        $int = (int) $int;
        $this->id = $int;
    }

    // -- lenom
    public function getLenom(){
        return $this->lenom;
    }

    public function setLenom($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->lenom = $string;
    }

    // -- letexte
    public function getLetexte(){
        return $this->letexte;
    }

    public function setLetexte($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->letexte = $string;
    }

    // -- sciecle_id
    public function getSciecle_id(){
        return $this->sciecle_id;
    }

    public function setSciecle_id($int){
        $int = (int) $int;
        $this->sciecle_id = $int;
    }
}

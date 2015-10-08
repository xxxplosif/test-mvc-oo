<?php
// Contrôleur de l'affichage hors connexion

// dependencies
require 'model/MaPDOClass.php';
require 'model/Periode.php';
require 'model/Livre.php';
require 'model/Ecrivain.php';
require 'model/PeriodeManager.php';
require 'model/LivreManager.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';
require 'model/LivreAdminManager.php';

// treat add writer and add book

if(isset($_POST['submitajouterecrivain'])){
    $lenom = htmlentities(strip_tags($_POST['lenom']),ENT_QUOTES, "UTF-8");
    $labio = htmlentities(strip_tags($_POST['labio']),ENT_QUOTES, "UTF-8");
    $siecle = (int) htmlentities(strip_tags($_POST['siecle']),ENT_QUOTES, "UTF-8");

    // traitement ajout écrivain
    $ecrivain_a_m = new EcrivainAdminManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $ecrivain_a_m->insertWriter($lenom,$labio,$siecle);

}elseif(isset($_POST['submitajouterlivre'])){
    $letitre = htmlentities(strip_tags($_POST['letitre']),ENT_QUOTES, "UTF-8");
    $ladescription = htmlentities(strip_tags($_POST['ladescription']),ENT_QUOTES, "UTF-8");
    $lasortie = htmlentities(strip_tags($_POST['lasortie']),ENT_QUOTES, "UTF-8");
    $lecrivain = (int) htmlentities(strip_tags($_POST['lecrivain']),ENT_QUOTES, "UTF-8");

    // traitement ajout livres
    $livre_a_m = new LivreAdminManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $livre_a_m->insertBook($letitre, $ladescription, $lasortie, $lecrivain);
}

// to show form select fields

$periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
$siecles = $periode_m->recupTous();

$ecrivain_m = new EcrivainManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
$ecrivains = $ecrivain_m->recupTous();

include 'view/admin.php';
?>


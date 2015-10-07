<?php

/* 
 * Contrôleur frontal
 */

// Lancement de session
session_start();


// dépendances
require 'config/config.php';

/*
 *  routage vers contrôleurs
 */

// si on essaye de se connecter ou de se déconnecter
if(isset($_GET['connect'])||isset($_GET['deconnect'])){
    require 'controller/ConnectController.php';
}

// si on est connecté comme admin
if(isset($_SESSION['idsession'])){
    require 'controller/AdminController.php';
}

// sinon (on est un simple visiteur du site)
 else {
    require 'controller/UserController.php';
}

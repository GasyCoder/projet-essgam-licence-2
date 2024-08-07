<?php

require 'config/database.php';
require 'app/models/Membre.php';
require 'app/models/Livre.php';
require 'app/models/Emprunt.php';
require 'app/controllers/MembreController.php';
require 'app/controllers/LivreController.php';
require 'app/controllers/EmpruntController.php';

$controller = $_GET['controller'] ?? 'membre';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'membre':
        $controller = new MembreController();
        break;
    case 'livre':
        $controller = new LivreController();
        break;
    case 'emprunt':
        $controller = new EmpruntController();
        break;
    default:
        $controller = new MembreController();
        break;
}

$controller->{$action}($_GET['id'] ?? null);

?>

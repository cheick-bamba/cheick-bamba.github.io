<?php
// Inclure le chargeur automatique de Composer
require_once 'vendor/autoload.php';

// Utilisation de la classe Dotenv
use Dotenv\Dotenv;

// Initialisation de l'environnement
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Appel de l'API Udemy pour tester
require_once 'config/db.php';
require_once 'api/udemy.php';

$udemy = new Udemy();
$courses = $udemy->getFreeCourses();

header('Content-Type: application/json');
echo json_encode($courses);

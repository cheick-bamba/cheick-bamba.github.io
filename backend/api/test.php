<?php
require_once '../config/db.php';
require_once 'udemy.php';

$udemy = new Udemy();
$courses = $udemy->getFreeCourses();

echo json_encode($courses);

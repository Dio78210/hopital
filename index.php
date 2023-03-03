<?php
session_start();
// echo $_SESSION["username"];

define("TITLE","Accueil");


//controller
require_once(__DIR__."/controllers/employeeController.php");

$employeeController = new EmployeeController;
//permet de verifier si l'employé est bien connecté et de le rediriger vers la page connexion
$employeeController->verifyLogin();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/index.php");
include(__DIR__."/assets/inc/footer.php");


?>



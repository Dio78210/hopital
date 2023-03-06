<?php
session_start();
// echo $_SESSION["username"];

define("TITLE","Creer un patient");


//controller
require_once(__DIR__."/controllers/PatientController.php");

$patientController = new PatientController;
$messages = $patientController->ajoutPatient();

include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/ajoutPatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
<?php
session_start();

define("TITLE","Liste des patients");


//controller
require_once(__DIR__."/controllers/PatientController.php");

require_once(__DIR__."/controllers/employeeController.php");

$patientController = new PatientController;
$employeeController = new EmployeeController;
$employeeController->verifyLogin();

$patients = $patientController->readAllListePatients();
// $patientController = new PatientController;
// $messages = $patientController->ajoutPatient();

include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/listePatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
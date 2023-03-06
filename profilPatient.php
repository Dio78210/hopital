<?php
session_start();

define("TITLE","informations des patients");


//controller
require_once(__DIR__."/controllers/PatientController.php");

require_once(__DIR__."/controllers/employeeController.php");

$patientController = new PatientController;
$employeeController = new EmployeeController;
$employeeController->verifyLogin();

$messages = $patientController->modifierPatient();
$patients = $patientController->readOnePatient();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/profilPatient.php");
include(__DIR__."/views/modifierPatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
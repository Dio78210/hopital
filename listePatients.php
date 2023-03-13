<?php
session_start();

define("TITLE","Liste des patients");


//controller
require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$patients = $patientController->readAllListePatients();


require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/listePatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
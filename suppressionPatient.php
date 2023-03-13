<?php
session_start();

define("TITLE","Supprimer un rendez-vous");


//controller
require_once(__DIR__."/controllers/employeeController.php");
$employeeController = new EmployeeController;
$employeeController->verifyLogin();



require_once(__DIR__."/controllers/PatientController.php");
$patientController = new PatientController;
$patientController->deletePatient();


include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/suppressionPatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
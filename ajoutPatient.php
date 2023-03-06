<?php
session_start();

define("TITLE","Creer un patient");


//controller
require_once(__DIR__."/controllers/PatientController.php");
require_once(__DIR__."/controllers/employeeController.php");


$employeeController = new EmployeeController;
$patientController = new PatientController;

$messages = $patientController->ajoutPatient();
$employeeController->verifyLogin();

include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/ajoutPatient.php");
include(__DIR__."/assets/inc/footer.php");


?>
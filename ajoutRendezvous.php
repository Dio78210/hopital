<?php
session_start();

define("TITLE","Creer un rendez-vous");


//controller
require_once(__DIR__."/controllers/PatientController.php");
require_once(__DIR__."/controllers/AppointmentController.php");
require_once(__DIR__."/controllers/employeeController.php");


$employeeController = new EmployeeController;
$patientController = new PatientController;
$appointmentController = new AppointmentController;


$messages = $appointmentController->appointment();
$patients = $patientController->readAllListePatients();
$employeeController->verifyLogin();

// var_dump($patients);
var_dump($_POST);

include(__DIR__."/assets/inc/header.php");
include(__DIR__."/views/ajoutRendezvous.php");
include(__DIR__."/assets/inc/footer.php");


?>